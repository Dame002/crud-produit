<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification de Boutique</title>
    <!-- Lien vers Bootstrap 4.5 CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
            height: 100vh;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 50px auto;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="text-center mb-4">Modifier la Boutique</h2>
        <form method="POST" action="{{ route('boutique.update', $boutique) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom de la boutique</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $boutique->nom }}" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $boutique->adresse }}" required>
            </div>
            <div class="form-group">
                <label for="email">Adresse Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $boutique->email }}" required>
            </div>
            <div class="form-group">
                <label for="tel">Téléphone</label>
                <input type="text" class="form-control" id="tel" name="tel" value="{{ $boutique->tel }}" required>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-dark">Modifier</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS + jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
