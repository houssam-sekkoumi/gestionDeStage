<?php

namespace App\Http\Controllers;

use App\Models\etudiant;
use App\Models\prof;
use Illuminate\Http\Request;

class adminController
{

    public function profetadmin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $prof = prof::where('email', $request->email)->first();

        if ($request->email == 'houssamsekkoumi@gmail.com' && $request->password == 'houssam!123456') {
            $nbrEtudiants = etudiant::all()->count();
            $nbrProfs = prof::all()->count();
            return view('admin', compact('nbrEtudiants', 'nbrProfs'));

        }

        if (!$prof) {
            return back()->withErrors([
                'error' => 'Email ou mot de passe incorrect.',
            ]);
        }  elseif ($request->password == $prof->password){
            return view('profProfil', ['prof' => $prof]);

        }  else{
            return back()->withErrors([
                'error' => ' Email ou Password incorrect.',
            ]);
        }







    }

    public function getallEtudiants(Request $request)
    {
        $query = Etudiant::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->search . '%')
                    ->orWhere('prenom', 'like', '%' . $request->search . '%')
                    ->orWhere('matricule', 'like', '%' . $request->search . '%')
                    ->orWhere('id', 'like', '%' . $request->search . '%')
                    ->orWhere('groupe', 'like', '%' . $request->search . '%')
                    ->orWhere('classe', 'like', '%' . $request->search . '%');
            });
        }

        $listEtudiants = $query->paginate(10);

        return view('adminShowAllEtudient', compact('listEtudiants'));
    }

    public function getallProfs(Request $request)
    {
        $query = prof::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->search . '%')
                    ->orWhere('prenom', 'like', '%' . $request->search . '%')
                    ->orWhere('matricule', 'like', '%' . $request->search . '%')
                    ->orWhere('id', 'like', '%' . $request->search . '%');

            });
        }

        $listProfs = $query->paginate(10);

        return view('adminShowAllProf', compact('listProfs'));

    }
    public function getAffecationPage()
    {
        $listetudiants = Etudiant::all();
        $listprofs = Prof::all();

        return view('affecationPage', compact('listetudiants', 'listprofs'));
    }


}
