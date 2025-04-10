<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout de Produit</title>
</head>
<body>
 <h2>Ajouter un produit</h2>
 <form method="POST" action="{{ route('produits.store') }}" >
    @csrf
    Libellè: <input type="text" name="libelle" ><br>
    Prix: <input type="number" name="prix" ><br>
    <button type="submit">Enregistrer</button>

 </form>
</body>
</html>
