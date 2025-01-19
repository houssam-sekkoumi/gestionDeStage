<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier Étudiant</title>
    <style>
        :root {
            --primary-color: #16a34a;
            --primary-hover: #15803d;
            --background: #f3f4f6;
            --card-bg: #ffffff;
            --text-primary: #1f2937;
            --border-color: #e5e7eb;
        }

        body {
            background-color: var(--background);
            color: var(--text-primary);
            font-family: 'Segoe UI', system-ui, sans-serif;
            line-height: 1.5;
            padding: 2rem;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: var(--card-bg);
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: var(--primary-color);
            font-size: 1.875rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-label {
            font-weight: 500;
        }

        .form-control {
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(22, 163, 74, 0.2);
        }

        .btn {
            background-color: var(--primary-color);
            color: white;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Modifier Étudiant</h1>
    <form action="{{ route('etudiant.edit', $selectedEtudiant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{$selectedEtudiant->nom}}" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{$selectedEtudiant->prenom}}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$selectedEtudiant->email}}" required>
        </div>
        <div class="mb-3">
            <label for="matricule" class="form-label">Matricule</label>
            <input type="text" class="form-control" id="matricule" name="matricule" value="{{$selectedEtudiant->matricule}}" required>
        </div>
        <div class="mb-3">
            <label for="filière" class="form-label">Filière</label>
            <input type="text" class="form-control" id="filière" name="filière" value="{{$selectedEtudiant->filière}}" required>
        </div>
        <div class="mb-3">
            <label for="classe" class="form-label">Classe</label>
            <input type="text" class="form-control" id="classe" name="classe" value="{{$selectedEtudiant->classe}}" required>
        </div>
        <div class="mb-3">
            <label for="groupe" class="form-label">Groupe</label>
            <input type="text" class="form-control" id="groupe" name="groupe" value="{{$selectedEtudiant->groupe}}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" value="{{$selectedEtudiant->password}}" required>
        </div>
        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn">
                <i class="fas fa-save"></i> Modifier
            </button>
        </div>
    </form>
</div>
</body>
</html>
