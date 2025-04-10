<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification de Produit</title>
</head>
<body>
<h2>Modifier le produit</h2>
<form method="POST" action="{{ route('produit.update', $produit) }}" >
    @csrf
    @method('PUT')
    Libellè: <input type="text" name="libelle" value="{{ $produit->libelle }}"><br>
    Prix: <input type="number" name="prix" value="{{ $produit->prix }}"><br>
    <button type="submit">Modifier</button>
</form>
</body>
</html>
