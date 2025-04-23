<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Affiche la liste des messages de contact.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    /**
     * Affiche le formulaire de contact.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Enregistre un nouveau message de contact.
     */
    public function store(Request $request)
    {
        $request->validate([
           'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
        'status' => 'required|in:Nouveau,En cours,Resolu',
        ]);

        Contact::create($request->all());
        return redirect()->route('contact.index')->with('success', 'Message envoyé avec succès.');
    }

    /**
     * Affiche un message spécifique.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.show', compact('contact'));
    }

    /**
     * Affiche le formulaire d’édition d’un message (rarement utile mais bon…).
     */
    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.edit', compact('contact'));
    }

    /**
     * Met à jour un message (pas classique pour un formulaire de contact, mais au cas où…).
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
        'status' => 'required|in:Nouveau,En cours,Resolu',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contact.index')->with('success', 'Message mis à jour.');
    }

    /**
     * Supprime un message.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contact.index')->with('success', 'Message supprimé.');
    }
}
