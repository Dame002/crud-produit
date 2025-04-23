<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Contact</title>
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
            max-width: 700px;
            margin: 50px auto;
        }
        h2 {
            margin-bottom: 20px;
        }
        .badge {
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Détails des informations de {{ $contact->full_name }}</h2>
        <hr>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Téléphone:</strong> {{ $contact->phone }}</p>
        <p><strong>Sujet:</strong> {{ $contact->subject }}</p>
        <p><strong>Message:</strong> {{ $contact->message }}</p>
        <p><strong>Statut:</strong>
            @if($contact->status == 'Nouveau')
                <span class="badge badge-primary">Nouveau</span>
            @elseif($contact->status == 'En cours')
                <span class="badge badge-warning">En cours</span>
            @elseif($contact->status == 'Resolu')
                <span class="badge badge-success">Résolu</span>
            @endif
        </p>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
