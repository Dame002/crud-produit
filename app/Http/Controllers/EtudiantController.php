<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Affiche la liste des étudiants.
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiants.index', compact('etudiants'));
    }

    /**
     * Affiche le formulaire de création d’un étudiant.
     */
    public function create()
    {
        return view('etudiants.create');
    }

    /**
     * Enregistre un nouvel étudiant dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:etudiants,email',
            'telephone' => 'required|string|max:20',
            'id_card' => 'required|string|unique:etudiants,id_card',
            'filiere' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:500',
        ]);

        Etudiant::create($request->all());
        return redirect()->route('etudiant.index');
    }

    /**
     * Affiche le formulaire d’édition d’un étudiant.
     */
    public function edit(string $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.edit', compact('etudiant'));
    }

    /**
     * Met à jour un étudiant existant.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:etudiants,email,' . $etudiant->id,
            'telephone' => 'required|string|max:20',
            'id_card' => 'required|string|unique:etudiants,id_card,' . $etudiant->id,
            'filiere' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:500',
        ]);

        $etudiant->update($request->all());
        return redirect()->route('etudiant.index');
    }

    /**
     * Supprime un étudiant de la base.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiant.index');
    }

    /**
     * Optionnel : Affiche les détails d’un étudiant (pas encore utilisé ici).
     */
    public function show(string $id)
    {
        //
    }
}
