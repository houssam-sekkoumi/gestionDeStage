<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Gestion des Professeurs</title>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .search-form {
            display: flex;
            gap: 0.5rem;
        }

        input[type="text"] {
            padding: 0.5rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            outline: none;
            font-size: 0.875rem;
            transition: border-color 0.2s;
        }

        input[type="text"]:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(22, 163, 74, 0.1);
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

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            padding: 0.5rem 1rem;
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

        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
        }

        .btn-danger:hover {
            background-color: var(--danger-hover);
            transform: translateY(-1px);
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-icon {
            padding: 0.5rem;
            border-radius: 0.375rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
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
        <h1>Gestion des Professeurs</h1>
        <form method="GET" action="{{ route('prof.getall') }}" class="search-form">
            <input type="text" name="search" placeholder="Rechercher un professeur..." value="{{ request()->get('search') }}">
            <button type="submit" class="btn-primary">
                <i class="fas fa-search"></i>
                Chercher
            </button>
        </form>
        <a href="{{route('prof.showAddPage')}}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Ajouter un professeur
        </a>
    </div>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Matricule</th>
            <th>Password</th>
            <th>Filière</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($listProfs) && $listProfs->isNotEmpty())
            @foreach($listProfs as $prof)
                <tr>
                    <td>{{ $prof->id }}</td>
                    <td>{{ $prof->nom }}</td>
                    <td>{{ $prof->prenom }}</td>
                    <td>{{ $prof->matricule }}</td>
                    <td>{{ $prof->password }}</td>
                    <td>{{ $prof->filière }}</td>
                    <td class="actions">
                        <a href="{{ route('prof.showEditPage',$prof->id) }}" class="btn-icon btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('prof.delete', $prof->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-icon btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7" style="text-align: center; padding: 2rem;">Aucun professeur trouvé</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
</body>
</html>
