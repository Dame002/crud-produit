<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Affiche la liste des documents avec pagination.
     */
    public function index()
    {
        $documents = Document::latest()->paginate(10);
        return view('document.index', compact('documents'));
    }

    /**
     * Affiche le formulaire de création d’un document.
     */
    public function create()
    {
        return view('document.create');
    }

    /**
     * Enregistre un nouveau document.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file'  => 'required|mimes:pdf|max:10240',      // max 10 Mo
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // max 2 Mo
        ]);

        // Stockage des fichiers
        $filePath  = $request->file('file')->store('documents');
        $imagePath = null;
        if ($request->hasFile('image')) {
            $stored = $request->file('image')->store('public/images');
            $imagePath = str_replace('public/', '', $stored);
        }

        // Création du Document
        Document::create([
            'title'      => $request->title,
            'file_path'  => $filePath,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('document.index')
                         ->with('success', 'Document ajouté avec succès.');
    }

    /**
     * Affiche le détail d’un document (optionnel).
     */
    public function show(Document $document)
    {
        return view('document.show', compact('document'));
    }

    /**
     * Affiche le formulaire d’édition d’un document.
     */
    public function edit(Document $document)
    {
        return view('document.edit', compact('document'));
    }

    /**
     * Met à jour un document existant.
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file'  => 'nullable|mimes:pdf|max:10240',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Mise à jour du titre
        $document->title = $request->title;

        // Remplacement du PDF si nécessaire
        if ($request->hasFile('file')) {
            Storage::delete($document->file_path);
            $document->file_path = $request->file('file')->store('documents');
        }

        // Remplacement de l’image si nécessaire
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $document->image_path);
            $stored = $request->file('image')->store('public/images');
            $document->image_path = str_replace('public/', '', $stored);
        }

        $document->save();

        return redirect()->route('document.index')
                         ->with('success', 'Document mis à jour avec succès.');
    }

    /**
     * Supprime un document et ses fichiers.
     */
    public function destroy(Document $document)
    {
        // Suppression des fichiers
        Storage::delete($document->file_path);
        if ($document->image_path) {
            Storage::delete('public/' . $document->image_path);
        }

        $document->delete();

        return redirect()->route('document.index')
                         ->with('success', 'Document supprimé.');
    }
}
