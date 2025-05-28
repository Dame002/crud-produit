@extends('layouts.app')

@section('title', 'Liste des Clients')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-users me-2"></i>Liste des Clients
        </h6>
        <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-1"></i> Ajouter un client
        </a>
    </div>
    <div class="card-body">
        @if($clients->isEmpty())
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i> Aucun client enregistré pour le moment.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->nom }}</td>
                            <td>{{ $client->prenom }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('clients.factures', $client->id) }}" 
                                       class="btn btn-sm btn-primary"
                                       title="Voir les factures">
                                        <i class="fas fa-file-invoice me-1"></i> Factures
                                    </a>
                                    <a href="{{ route('clients.show', $client->id) }}" 
                                       class="btn btn-sm btn-info"
                                       title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('clients.edit', $client->id) }}" 
                                       class="btn btn-sm btn-warning"
                                       title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')"
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
            
            {{-- Pagination personnalisée --}}
            <div class="mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{-- Premier --}}
                        <li class="page-item {{ $clients->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $clients->url(1) }}" aria-label="Premier">
                                <span aria-hidden="true">&laquo;&laquo;</span>
                            </a>
                        </li>
                        
                        {{-- Précédent --}}
                        <li class="page-item {{ $clients->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $clients->previousPageUrl() }}" aria-label="Précédent">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        {{-- Pages --}}
                        @foreach(range(1, $clients->lastPage()) as $page)
                            <li class="page-item {{ $clients->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link" href="{{ $clients->url($page) }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        {{-- Suivant --}}
                        <li class="page-item {{ !$clients->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $clients->nextPageUrl() }}" aria-label="Suivant">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        
                        {{-- Dernier --}}
                        <li class="page-item {{ !$clients->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $clients->url($clients->lastPage()) }}" aria-label="Dernier">
                                <span aria-hidden="true">&raquo;&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        @endif
    </div>
</div>

<style>
    .pagination .page-item.active .page-link {
        background-color: #4e73df;
        border-color: #4e73df;
        color: white;
    }
    .pagination .page-link {
        color: #4e73df;
        margin: 0 3px;
        border-radius: 4px;
    }
    .pagination .page-item.disabled .page-link {
        color: #6c757d;
    }
    .pagination .page-link:hover {
        background-color: #e9ecef;
    }
</style>
@endsection