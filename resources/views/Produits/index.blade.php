<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listes des Produits</title>
    <!-- Lien vers Bootstrap 4.5 CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Arrière-plan global */
        body {
            background-color: #f4f7fc;
            height: 100vh;
        }
        /* Conteneur du tableau et du lien */
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            max-width: 900px;
        }
        /* Espacement entre le titre et le tableau */
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Liste des Produits</h2>
        <a href="{{ route('produit.create') }}" class="btn btn-primary mb-3 d-block mx-a">Ajouter un produit</a>
        
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Libellé</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                <tr>
                    <td>{{ $produit->libelle }}</td>
                    <td>{{ $produit->prix }}</td>
                    <td>
                        <a href="{{ route('produit.edit', $produit) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('produit.destroy', $produit) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Lien vers Bootstrap 4.5 JS et son CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
