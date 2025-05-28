<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture #{{ $facture->num_facture }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        .header { text-align: center; margin-bottom: 20px; }
        .info { display: flex; justify-content: space-between; margin-bottom: 30px; }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
        .table th { background-color: #f2f2f2; }
        .text-right { text-align: right; }
        .total { font-weight: bold; font-size: 1.1em; }
        @media print {
            .no-print { display: none; }
            body { padding: 0; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Facture #{{ $facture->num_facture }}</h1>
        <p>Date: {{ \Carbon\Carbon::parse($facture->date)->format('d/m/Y') }}</p>
    </div>

    <div class="info">
        <div>
            <h3>Fournisseur</h3>
            <p>Votre Société</p>
            <p>Adresse</p>
            <p>Téléphone</p>
            <p>Email</p>
        </div>
        <div>
            <h3>Client</h3>
            <p>{{ $facture->client->nom }} {{ $facture->client->prenom }}</p>
            <p>{{ $facture->client->adresse }}</p>
            <p>{{ $facture->client->telephone }}</p>
            <p>{{ $facture->client->email }}</p>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Description</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facture->lignes as $ligne)
            <tr>
                <td>{{ $ligne->description }}</td>
                <td>{{ $ligne->quantite }}</td>
                <td>{{ number_format($ligne->prix_unitaire, 2, ',', ' ') }} €</td>
                <td>{{ number_format($ligne->quantite * $ligne->prix_unitaire, 2, ',', ' ') }} €</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-right">
        <p class="total">Total: {{ number_format($facture->total, 2, ',', ' ') }} €</p>
    </div>

    <div class="no-print" style="margin-top: 20px; text-align: center;">
        <button onclick="window.print()" style="padding: 10px 20px; background: #4CAF50; color: white; border: none; cursor: pointer;">
            Imprimer
        </button>
        <button onclick="window.close()" style="padding: 10px 20px; background: #f44336; color: white; border: none; cursor: pointer;">
            Fermer
        </button>
    </div>
</body>
</html>
