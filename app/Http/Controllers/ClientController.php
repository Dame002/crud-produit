<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(10);
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255'
        ]);

        Client::create($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Client ajouté avec succès.');
    }

    public function show(string $id)
    {
        $client = Client::with('factures')->findOrFail($id);
        return view('clients.show', compact('client'));
    }

    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255'
        ]);

        $client->update($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Client modifié avec succès.');
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client supprimé avec succès.');
    }

    public function factures($clientId)
{
    $client = Client::with('factures')->findOrFail($clientId);
    return view('clients.factures', compact('client'));
}


}