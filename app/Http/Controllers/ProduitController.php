<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'prix' => 'required|numeric',
        ]);
        Produit::create($request->all());
        return redirect()->route('produit.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Produit $produit)
    {
        $request->validate([
            'libelle' => 'required',
            'prix' => 'required|numeric',
        ]);
    $produit->update($request->all());
        return redirect()->route('produit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produit.index');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit=Produit::find($id);
        return view('produits.edit', compact('produit'));
    }

}
