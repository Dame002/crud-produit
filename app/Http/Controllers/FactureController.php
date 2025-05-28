<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Client;
use App\Models\Produit;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function index()
    {
        $factures = Facture::with('client')->paginate(10);
        return view('factures.index', compact('factures'));
    }

    public function create()
    {
        $clients = Client::all();
        $produits = Produit::all();
        return view('factures.create', compact('clients', 'produits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'num_facture' => 'required|unique:factures,num_facture',
            'client_id' => 'required|exists:clients,id',
            'produits' => 'required|array',
            'produits.*.id' => 'required|exists:produits,id',
            'produits.*.qte' => 'required|integer|min:1'
        ]);

        $facture = Facture::create($request->only(['date', 'num_facture', 'client_id']));

        foreach ($request->produits as $produit) {
            $facture->products()->attach($produit['id'], ['qte' => $produit['qte']]);
        }

        return redirect()->route('factures.index')
            ->with('success', 'Facture créée avec succès.');
    }

    public function show(string $id)
    {
        $facture = Facture::with(['client', 'products'])->findOrFail($id);
        return view('factures.show', compact('facture'));
    }

    public function edit(string $id)
    {
        $facture = Facture::with('products')->findOrFail($id);
        $clients = Client::all();
        $produits = Produit::all();
        return view('factures.edit', compact('facture', 'clients', 'produits'));
    }

    public function update(Request $request, string $id)
    {
        $facture = Facture::findOrFail($id);

        $request->validate([
            'date' => 'required|date',
            'num_facture' => 'required|unique:factures,num_facture,'.$facture->id,
            'client_id' => 'required|exists:clients,id',
            'produits' => 'required|array',
            'produits.*.id' => 'required|exists:produits,id',
            'produits.*.qte' => 'required|integer|min:1'
        ]);

        $facture->update($request->only(['date', 'num_facture', 'client_id']));

        $facture->products()->detach();
        foreach ($request->produits as $produit) {
            $facture->products()->attach($produit['id'], ['qte' => $produit['qte']]);
        }

        return redirect()->route('factures.index')
            ->with('success', 'Facture mise à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $facture = Facture::findOrFail($id);
        $facture->products()->detach();
        $facture->delete();

        return redirect()->route('factures.index')
            ->with('success', 'Facture supprimée avec succès.');
    }
    public function print(Facture $facture)
{
    $facture->load('client', 'lignes'); // Charge les relations si nécessaire

    return view('factures.print', compact('facture'));
}
}

