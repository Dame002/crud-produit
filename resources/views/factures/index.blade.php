@extends('layouts.facture')

@section('title', 'Liste des Factures')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-file-invoice me-2"></i>Liste des Factures
            </h6>
            <a href="{{ route('factures.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> Nouvelle Facture
            </a>
        </div>
        <div class="card-body">
            @if ($factures->isEmpty())
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i> Aucune facture enregistrée pour le moment.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th>N° Facture</th>
                                <th>Date</th>
                                <th>Client</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($factures as $facture)
                                <tr>
                                    <td>#{{ $facture->num_facture }}</td>
                                    <td>{{ \Carbon\Carbon::parse($facture->date)->format('d/m/Y') }}</td>

                                    <td>{{ $facture->client->nom }} {{ $facture->client->prenom }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('factures.print', $facture->id) }}"
                                                class="btn btn-sm btn-secondary" title="Imprimer" target="_blank">
                                                <i class="fas fa-print"></i>
                                            </a>
                                            <a href="{{ route('factures.show', $facture->id) }}" class="btn btn-sm btn-info"
                                                title="Voir détails">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('factures.edit', $facture->id) }}"
                                                class="btn btn-sm btn-warning" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('factures.destroy', $facture->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette facture ?')"
                                                    title="Supprimer">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 d-flex justify-content-center">
                    {{ $factures->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
