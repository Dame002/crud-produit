<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Boutiques</title>
    <!-- Lien vers Bootstrap 4.5 CDN -->
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
            max-width: 900px;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Liste des Boutiques</h2>
        <a href="{{ route('boutique.create') }}" class="btn btn-success mb-3 d-block mx-auto" style="width: fit-content;">Ajouter une boutique</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($boutiques as $boutique)
                <tr>
                    <td>{{ $boutique->nom }}</td>
                    <td>{{ $boutique->adresse }}</td>
                    <td>{{ $boutique->email }}</td>
                    <td>{{ $boutique->tel }}</td>
                    <td>
                        <a href="{{ route('boutique.edit', $boutique) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('boutique.destroy', $boutique) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tu veux vraiment supprimer cette boutique ?')">Supprimer</button>
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
