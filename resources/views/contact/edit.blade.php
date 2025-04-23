<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de Contact</title>
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
        <h2 class="text-center mb-4">Modifier un Contact</h2>
        <form method="POST" action="{{ route('contact.update', $contact->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="full_name">Nom complet</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $contact->full_name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $contact->phone }}" required>
            </div>

            <div class="form-group">
                <label for="subject">Sujet</label>
                <input type="text" class="form-control" id="subject" name="subject" value="{{ $contact->subject }}" required>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required>{{ $contact->message }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Statut</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Nouveau" {{ $contact->status == 'Nouveau' ? 'selected' : '' }}>Nouveau</option>
                    <option value="En cours" {{ $contact->status == 'En cours' ? 'selected' : '' }}>En cours</option>
                    <option value="Resolu" {{ $contact->status == 'Resolu' ? 'selected' : '' }}>Résolu</option>
                </select>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-warning">Modifier</button>
            </div>
        </form>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
