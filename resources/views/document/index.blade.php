<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Documents</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
        }
        .img-thumbnail {
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Liste des Documents</h2>
            <a href="{{ route('document.create') }}" class="btn btn-danger">+ Ajouter</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Titre</th>
                    <th>Fichier</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($documents as $doc)
                    <tr>
                        <td>{{ $doc->title }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $doc->file_path) }}"
                               class="btn btn-sm btn-primary" target="_blank">
                                Voir
                            </a>
                        </td>
                        <td>
                            @if($doc->image_path)
                                <img src="{{ asset('storage/' . $doc->image_path) }}"
                                     width="60" class="img-thumbnail">
                            @else
                                <span class="text-muted">Aucune</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('document.edit', $doc->id) }}"
                               class="btn btn-sm btn-warning">
                                Modifier
                            </a>
                            <form action="{{ route('document.destroy', $doc->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Confirmer la suppression ?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Aucun document trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $documents->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
