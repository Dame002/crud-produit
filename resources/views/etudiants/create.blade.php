<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'Étudiant</title>
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
            max-width: 600px;
            margin: 50px auto;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="text-center mb-4">Ajouter un Étudiant</h2>
        <form method="POST" action="{{ route('etudiant.store') }}">
            @csrf

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" required>
            </div>

            <div class="form-group">
                <label for="id_card">ID Card</label>
                <input type="text" class="form-control" id="id_card" name="id_card" required>
            </div>

            <div class="form-group">
                <label for="filiere">Filière</label>
                <select class="form-control" id="filiere" name="filiere" required>
                    <option value="">-- Sélectionnez une filière --</option>
                    <option value="DI">Dèveloppement informatique</option>
                    <option value="DM">Dèveloppement multimedia</option>
                    <option value="Inf">Infographie</option>
                    <option value="GE">Gestion des entreprises</option>
                    <option value="CI">Commerce internationale</option>
                </select>
            </div>

            <div class="form-group">
                <label for="adresse">Adresse</label>
                <textarea class="form-control" id="adresse" name="adresse" rows="3" required></textarea>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-danger">Enregistrer</button>
            </div>
        </form>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
