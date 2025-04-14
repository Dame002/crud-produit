<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            max-width: 1000px;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Liste des Étudiants</h2>
        <a href="{{ route('etudiant.create') }}" class="btn btn-danger mb-3 d-block mx-auto" style="width: fit-content;">Ajouter un étudiant</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>ID Card</th>
                    <th>Filière</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->email }}</td>
                    <td>{{ $etudiant->telephone }}</td>
                    <td>{{ $etudiant->id_card }}</td>
                    <td>{{ $etudiant->filiere }}</td>
                    <td>{{ $etudiant->adresse }}</td>
                    <td>
                        <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('etudiant.destroy', $etudiant->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet étudiant ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- JS Bootstrap + jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
