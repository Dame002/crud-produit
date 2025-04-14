<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Affiche la liste de tous les livres.
     */
    public function index()
    {
        $livres = Livre::all();
        return view('livres.index', compact('livres'));
    }

    /**
     * Affiche le formulaire de création d’un nouveau livre.
     */
    public function create()
    {
        return view('livres.create');
    }

    /**
     * Enregistre un nouveau livre dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'auteur' => 'required',
            'prix' => 'required|numeric',
        ]);

        Livre::create($request->all());

        return redirect()->route('livre.index');
    }

    /**
     * Affiche le formulaire d'édition d’un livre.
     */
    public function edit(string $id)
    {
        $livre = Livre::find($id);
        return view('livres.edit', compact('livre'));
    }

    /**
     * Met à jour un livre existant.
     */
    public function update(Request $request, Livre $livre)
    {
        $request->validate([
            'titre' => 'required',
            'auteur' => 'required',
            'prix' => 'required|numeric',
        ]);

        $livre->update($request->all());

        return redirect()->route('livre.index');
    }

    /**
     * Supprime un livre de la base de données.
     */
    public function destroy(Livre $livre)
    {
        $livre->delete();

        return redirect()->route('livre.index');
    }

    /**
     * Affiche un livre spécifique (optionnel).
     */
    public function show(string $id)
    {
        // À implémenter si besoin
    }
}
