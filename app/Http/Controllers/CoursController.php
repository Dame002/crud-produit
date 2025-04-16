<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Affiche la liste des cours.
     */
    public function index()
    {
        $cours = Cours::all();
        return view('cours.index', compact('cours'));
    }

    /**
     * Affiche le formulaire de création d’un cours.
     */
    public function create()
    {
        return view('cours.create');
    }

    /**
     * Enregistre un nouveau cours.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        Cours::create($request->all());
        return redirect()->route('cours.index');
    }

    /**
     * Met à jour un cours existant.
     */
    public function update(Request $request, Cours $cour)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        $cour->update($request->all());
        return redirect()->route('cours.index');
    }

    /**
     * Supprime un cours.
     */
    public function destroy(Cours $cour)
    {
        $cour->delete();
        return redirect()->route('cours.index');
    }

    /**
     * Affiche les détails d’un cours (si nécessaire).
     */
    public function show(string $id)
    {
        // Tu peux remplir si tu veux afficher le détail d’un cours
    }

    /**
     * Affiche le formulaire d’édition d’un cours.
     */
    public function edit(string $id)
    {
        $cour = Cours::find($id);
        return view('cours.edit', compact('cour'));
    }
}
