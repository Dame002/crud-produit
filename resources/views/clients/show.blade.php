@extends('layouts.app')

@section('title', 'Détails du Client')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user-circle me-2"></i>Détails du Client
                </h6>
                <div>
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit me-1"></i> Modifier
                    </a>
                    <a href="{{ route('clients.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Retour
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="p-3 border rounded bg-light">
                            <h5 class="font-weight-bold text-primary mb-3">
                                <i class="fas fa-id-card me-2"></i>Informations Personnelles
                            </h5>
                            <div class="mb-3">
                                <p class="mb-1"><strong><i class="fas fa-user me-2"></i>Nom Complet</strong></p>
                                <p class="text-muted">{{ $client->nom }} {{ $client->prenom }}</p>
                            </div>
                            <div class="mb-3">
                                <p class="mb-1"><strong><i class="fas fa-envelope me-2"></i>Email</strong></p>
                                <p class="text-muted">{{ $client->email ?? 'Non renseigné' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 border rounded bg-light">
                            <h5 class="font-weight-bold text-primary mb-3">
                                <i class="fas fa-chart-line me-2"></i>Statistiques
                            </h5>
                            <div class="mb-3">
                                <p class="mb-1"><strong><i class="fas fa-file-invoice me-2"></i>Nombre de Factures</strong></p>
                                <p class="text-muted">{{ $client->factures->count() }}</p>
                            </div>
                            <div>
                                <p class="mb-1"><strong><i class="fas fa-coins me-2"></i>Total Facturé</strong></p>
                                <p class="text-muted">
                                    {{ number_format($client->factures->sum('prix'), 2, ',', ' ') }} €
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <h5 class="font-weight-bold text-primary mb-3">
                        <i class="fas fa-file-invoice me-2"></i>Historique des Factures
                    </h5>
                    
                    @if($client->factures->count())
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="bg-light">
                                    <tr>
                                        <th>N° Facture</th>
                                        <th>Date</th>
                                        <th class="text-end">Montant</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($client->factures as $facture)
                                    <tr>
                                        <td>#{{ $facture->num_facture }}</td>
                                        <td>{{ \Carbon\Carbon::parse($facture->date)->format('d/m/Y') }}</td>
                                        <td class="text-end">{{ number_format($facture->montant, 2, ',', ' ') }} €</td>
                                        <td class="text-center">
                                            <a href="{{ route('factures.show', $facture->id) }}" 
                                               class="btn btn-sm btn-primary"
                                               title="Voir détails">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('factures.edit', $facture->id) }}" 
                                               class="btn btn-sm btn-warning"
                                               title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i> Aucune facture trouvée pour ce client.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection