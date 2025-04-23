<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Contacts</title>
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
            max-width: 1000px;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Liste des Contacts</h2>

        <a href="{{ route('contact.create') }}" class="btn btn-warning mb-3 d-block mx-auto" style="width: fit-content;">Nouvelle demande</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Nom complet</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Sujet</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->full_name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td>
                        @if($contact->status == 'Nouveau')
                            <span class="badge badge-primary">Nouveau</span>
                        @elseif($contact->status == 'En cours')
                            <span class="badge badge-warning">En cours</span>
                        @elseif($contact->status == 'Resolu')
                            <span class="badge badge-success">Résolu</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-success btn-sm">voir</a>
                        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce contact ?')">Supprimer</button>
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
