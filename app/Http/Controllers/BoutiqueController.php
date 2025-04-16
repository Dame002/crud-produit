<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boutiques = Boutique::all();
        return view('boutique.index', compact('boutiques'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('boutique.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string',
            'email' => 'required|email',
            'tel' => 'required|string',
        ]);

        Boutique::create($request->all());
        return redirect()->route('boutique.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $boutique = Boutique::findOrFail($id);
        return view('boutique.show', compact('boutique'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $boutique = Boutique::findOrFail($id);
        return view('boutique.edit', compact('boutique'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string',
            'email' => 'required|email',
            'tel' => 'required|string',
        ]);

        $boutique = Boutique::findOrFail($id);
        $boutique->update($request->all());

        return redirect()->route('boutique.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $boutique = Boutique::findOrFail($id);
        $boutique->delete();

        return redirect()->route('boutique.index');
    }
}
