@extends('layouts.facture')

@section('title', 'Créer une Facture')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-file-invoice me-2"></i>Nouvelle Facture
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('factures.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="num_facture" class="form-label">N° Facture <span class="text-danger">*</span></label>
                            <input type="text"
                                   class="form-control @error('num_facture') is-invalid @enderror"
                                   id="num_facture"
                                   name="num_facture"
                                   value="{{ old('num_facture') }}"
                                   required>
                            @error('num_facture')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                            <input type="date"
                                   class="form-control @error('date') is-invalid @enderror"
                                   id="date"
                                   name="date"
                                   value="{{ old('date', now()->format('Y-m-d')) }}"
                                   required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="client_id" class="form-label">Client <span class="text-danger">*</span></label>
                            <select class="form-select @error('client_id') is-invalid @enderror"
                                    id="client_id"
                                    name="client_id"
                                    required>
                                <option value="">Sélectionner un client</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                        {{ $client->nom }} {{ $client->prenom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h5 class="mb-3">Produits</h5>
                        <div id="produits-container">
                            <div class="row produit-item mb-3">
                                <div class="col-md-6">
                                    <select class="form-select produit-select" name="produits[0][id]" required>
                                        <option value="">Sélectionner un produit</option>
                                        @foreach($produits as $produit)
                                            <option value="{{ $produit->id }}">{{ $produit->nom }} ({{ $produit->prix }} €)</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" name="produits[0][qte]" placeholder="Quantité" min="1" value="1" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger btn-sm remove-produit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-produit" class="btn btn-sm btn-secondary mt-2">
                            <i class="fas fa-plus me-1"></i> Ajouter un produit
                        </button>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('factures.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Annuler
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Ajouter un produit
    document.getElementById('add-produit').addEventListener('click', function() {
        const container = document.getElementById('produits-container');
        const index = document.querySelectorAll('.produit-item').length;
        const newItem = document.createElement('div');
        newItem.className = 'row produit-item mb-3';
        newItem.innerHTML = `
            <div class="col-md-6">
                <select class="form-select produit-select" name="produits[${index}][id]" required>
                    <option value="">Sélectionner un produit</option>
                    @foreach($produits as $produit)
                        <option value="{{ $produit->id }}">{{ $produit->nom }} ({{ $produit->prix }} €)</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="number" class="form-control" name="produits[${index}][qte]" placeholder="Quantité" min="1" value="1" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm remove-produit">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(newItem);
    });

    // Supprimer un produit
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-produit')) {
            e.target.closest('.produit-item').remove();
        }
    });
});
</script>
@endsection