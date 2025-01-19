<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Affectation des Étudiants</title>
    <style>
        :root {
            --primary-color: #27640a;
            --primary-hover: #16a34a;
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

        .page {
            max-width: 1200px;
            margin: 0 auto;
            display: none;
        }

        .page.active {
            display: block;
        }

        .header-section {
            background-color: var(--card-bg);
            padding: 1.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        h1 {
            font-size: 1.875rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0 auto;
            display: inline-block;
            position: relative;
            padding-bottom: 0.5rem;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 3px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        /* Style amélioré pour le select */
        select {
            appearance: none;
            background-color: white;
            border: 2px solid var(--border-color);
            padding: 0.5rem 2.5rem 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: var(--text-primary);
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1rem;
            min-width: 250px; /* Largeur augmentée */
            width: 100%; /* Prend toute la largeur disponible */
            max-width: 300px; /* Limite la largeur maximale */
            transition: all 0.2s ease;
        }

        select:hover {
            border-color: var(--primary-color);
        }

        select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(39, 100, 10, 0.1);
        }

        /* Style pour l'option placeholder */
        select option[value=""] {
            color: var(--text-secondary);
        }

        /* Reste des styles inchangés */
        .search-form {
            display: flex;
            gap: 0.5rem;
        }

        table {
            width: 100%;
            background-color: var(--card-bg);
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            padding: 1rem;
        }

        td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: rgba(22, 163, 74, 0.05);
        }

        @media (max-width: 768px) {
            .header-section {
                flex-direction: column;
                align-items: stretch;
            }

            .search-form {
                flex-direction: column;
            }

            table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
<div id="students" class="page active">
    <div class="header-section">
        <h1>Affectations des Étudiants</h1>
    </div>
    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Matricule</th>
            <th>Filière</th>
            <th>Affectation</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($listetudiants) && $listetudiants->isNotEmpty())
            @foreach($listetudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->matricule }}</td>
                    <td>{{ $etudiant->filière }}</td>
                    <td class="actions">
                        <select>
                            <option value="" selected disabled>Sélectionner un professeur</option>
                            @foreach($listprofs as $prof)
                                <option value="{{ $prof->id }}">{{ $prof->nom }} {{ $prof->prenom }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9" style="text-align: center; padding: 2rem;">Aucun étudiant trouvé</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
</body>
</html>
