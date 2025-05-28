<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin: 50px auto;
        }
        .img-thumbnail {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="text-center mb-4">Modifier le Document</h2>
        <form method="POST"
              action="{{ route('documents.update', $document->id) }}"
              enctype="multipart/form-data"
              class="needs-validation"
              novalidate>
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text"
                       class="form-control @error('title') is-invalid @enderror"
                       id="title"
                       name="title"
                       value="{{ old('title', $document->title) }}"
                       required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="file">Changer le PDF (optionnel)</label>
                <input type="file"
                       class="form-control @error('file') is-invalid @enderror"
                       id="file"
                       name="file"
                       accept="application/pdf">
                <small class="form-text text-muted">
                    Fichier actuel :
                    <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">Voir</a>
                </small>
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Changer l’image (optionnel)</label>
                <input type="file"
                       class="form-control @error('image') is-invalid @enderror"
                       id="image"
                       name="image"
                       accept="image/*">
                @if($document->image_path)
                    <small class="form-text text-muted">Image actuelle :</small><br>
                    <img src="{{ asset('storage/' . $document->image_path) }}"
                         width="80" class="img-thumbnail">
                @endif
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
