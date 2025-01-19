<?php

namespace App\Http\Controllers;

use App\Models\etudiant;
use App\Models\prof;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    public function index()
    {
        return view('profLogin');
    }

    public function showAddPage()
    {
        return view('addProf');
    }

    public function ajouter(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:profs,email',
            'matricule' => 'required|string|max:255',
            'filière' => 'required|string|max:255',
            'password' => 'required|string|min:8'
        ]);

        $prof = new prof();
        $prof::create($data);
        return redirect(route('prof.getall'));
    }

    public function delete($id)
    {
        $prof = prof::find($id);
        $prof->delete();
        return redirect()->route('prof.getall');
    }

    public function showProfUpdatePage(Request $request)
    {
        $idProf = $request->id;
        $selectedProf = prof::find($idProf);
        return view("updateProf", compact("selectedProf"));
    }

    public function edit(Request $request, $id)
    {
        $prof = prof::find($id);
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:profs,email',
            'matricule' => 'required|string|max:255',
            'filière' => 'required|string|max:255',
            'password' => 'required|string|min:8'
        ]);

        $prof->update($request->only('nom', 'prenom', 'email', 'matricule', 'filière', 'password'));
        return redirect(route('prof.getall'));

    }

}
