@extends('layouts.facture')

@section('title', 'Factures du Client')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-file-invoice me-2"></i>Factures de {{ $client->nom }} {{ $client->prenom }}
        </h6>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left me-1"></i> Retour
        </a>
    </div>
    <div class="card-body">
        @if($client->factures->isEmpty())
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i> Ce client n'a aucune facture.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th>N° Facture</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($client->factures as $facture)
                        <tr>
                            <td>#{{ $facture->num_facture }}</td>
                            <td>{{ \Carbon\Carbon::parse($facture->date)->format('d/m/Y') }}</td>


                            <td>
                                {{ number_format($facture->products->sum(function($product) {
                                    return $product->pivot->qte * $product->prix;
                                }), 2, ',', ' ') }} €
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('factures.show', $facture->id) }}" 
                                       class="btn btn-sm btn-info"
                                       title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('factures.edit', $facture->id) }}" 
                                       class="btn btn-sm btn-warning"
                                       title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection