<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listes des Produits</title>
</head>
<body>
<h2>Listes des produits</h2>
<a href="{{ route('produits.create') }}">Ajouter un produit</a>
<table>
    <tr>
        <th>Libelle</th>
        <th>Prix</th>
        <th>Actions</th>
    </tr>
    @foreach ($produits as $produit)
    <tr>
        <td>{{ $produit->libelle }}</td>
        <td>{{ $produit->prix }}</td>
        <td>
            <a href="{{ route('produits.edit', $produit) }}">Modifier</a>
            <form action="{{ route('produits.destroy', $produit) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>