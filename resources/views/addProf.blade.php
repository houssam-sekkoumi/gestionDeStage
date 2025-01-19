<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Ajouter Professeur</title>
    <style>
        :root {
            --primary-color: #16a34a;
            --primary-hover: #15803d;
            --danger-color: #dc2626;
            --danger-hover: #b91c1c;
            --background: #f3f4f6;
            --card-bg: #ffffff;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --border-color: #e5e7eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            background-color: var(--background);
            color: var(--text-primary);
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

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: var(--text-primary);
            transition: all 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(22, 163, 74, 0.1);
        }

        .form-control::placeholder {
            color: var(--text-secondary);
        }

        .btn {
            background-color: var(--primary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            .container {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Ajouter un Professeur</h1>
    <form action="{{ route('prof.ajouter') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="matricule" class="form-label">Matricule</label>
            <input type="text" class="form-control" id="matricule" name="matricule" required>
        </div>
        <div class="form-group">
            <label for="filière" class="form-label">Filière</label>
            <input type="text" class="form-control" id="filière" name="filière" required>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="button-container">
            <button type="submit" class="btn">
                <i class="fas fa-save"></i>
                Enregistrer
            </button>
        </div>
    </form>
</div>
</body>
</html>
