@extends('layouts.facture')

@section('title', 'Détails de la Facture')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-file-invoice me-2"></i>Facture #{{ $facture->num_facture }}
                </h6>
                <div>
                    <a href="{{ route('factures.edit', $facture->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit me-1"></i> Modifier
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5>Informations du client</h5>
                        <p>
                            <strong>{{ $facture->client->nom }} {{ $facture->client->prenom }}</strong><br>
                        </p>
                    </div>
                    <div class="col-md-6 text-end">
                        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($facture->date)->format('d/m/Y') }}</p>

                        <p><strong>N° Facture:</strong> {{ $facture->num_facture }}</p>
                    </div>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th>Produit</th>
                                <th class="text-end">Prix unitaire</th>
                                <th class="text-end">Quantité</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($facture->products as $produit)
                            <tr>
                                <td>{{ $produit->nom }}</td>
                                <td class="text-end">{{ number_format($produit->pivot->qte, 2, ',', ' ') }} €</td>
                                <td class="text-end">{{ $produit->pivot->qte }}</td>
                                <td class="text-end">{{ number_format($produit->prix * $produit->pivot->qte, 2, ',', ' ') }} €</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Total HT</th>
                                <th class="text-end">{{ number_format($facture->products->sum(function($produit) {
                                    return $produit->prix * $produit->pivot->qte;
                                }), 2, ',', ' ') }} €</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('factures.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Retour
                    </a>
                    <div>
                        <a href="{{ route('factures.edit', $facture->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i> Modifier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection