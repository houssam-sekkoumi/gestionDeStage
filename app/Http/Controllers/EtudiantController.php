<?php

namespace App\Http\Controllers;
use App\Models\etudiant;
use App\Models\prof;
use App\Models\rapport;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index(){
        return view('etudientLogin');
    }

    public function showAddPage()
    {
        return view('addEtudient');
    }
    public function ajouter(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:etudiants,email',
            'matricule' => 'required|string|max:255',
            'filière' => 'required|string|max:255',
            'classe' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'groupe' => 'required|string|max:255',
        ]);


        etudiant::create($data);
        return redirect(route('etudiant.getall'));
    }
    public function  showEtudiantUpdatePage(Request $request)
    {
        $idEtudiant = $request->id;
        $selectedEtudiant = etudiant::find( $idEtudiant);
        return view("updateEtudiant", compact("selectedEtudiant"));
    }

    public function edit(Request $request,$id){
        $etudiant= etudiant::find($id);
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:etudiants,email',
            'matricule' => 'required|string|max:255',
            'filière' => 'required|string|max:255',
            'classe' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'groupe' => 'required|string|max:255',
        ]);

        $etudiant->update($request->only('nom', 'prenom', 'email','matricule','filière','classe','password','groupe'));
        return redirect(route('etudiant.getall'));

    }

    public function delete($id){
        $etudient = etudiant::find($id);
        $etudient->delete();
        return redirect()->route('etudiant.getall');
    }


    public function etudiantLogin(Request $request)
    {
        // Validation des entrées
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $etudient = etudiant::where('email', $request->email)->first();

        if (!$etudient) {
            return back()->withErrors([
                'error' => 'Email ou mot de passe incorrect.',
            ]);
        }


        if ($request->password == $etudient->password) {
            return view('etudiantProfil', ['etudient' => $etudient]);
        } else {
            return back()->withErrors([
                'error' => 'Email ou mot de passe incorrect.',
            ]);
        }
    }

    public function upload(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $path = $request->file('file')->store('rapports', 'public');

        $rapport = new Rapport();
        $rapport->titre = $request->file('file')->getClientOriginalName();
        $rapport->path = $path;
        $rapport->etudiant_id = $id;
        $rapport->save();

        return redirect(route("etudiant.auth"))->with('success', 'Votre rapport a été déposé avec succès !');
    }





}
