<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de stage</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
        }

        .header {
            background: linear-gradient(135deg, #27640a 0%, #3f8f11 100%);
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 260px;
            background: linear-gradient(135deg, #27640a 0%, #3f8f11 100%);
            padding: 30px 20px;
            color: white;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo img {
            height: 50px;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: white;
            text-decoration: none;
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .menu-item i {
            font-size: 18px;
        }

        .main-content {
            margin-left: 280px;
            padding: 40px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            text-align: center;
            border: 1px solid #e5e7eb;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .stat-icon {
            font-size: 40px;
            color: #27640a;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.1);
        }

        .stat-info h3 {
            font-size: 28px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .stat-info p {
            color: #666;
            font-size: 16px;
            font-weight: 500;
        }

        .data-row {
            display: grid;
            grid-template-columns: 150px 1fr;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            background-color: white;
            transition: all 0.3s ease;
        }

        .data-row:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }

        .label {
            font-weight: 600;
            color: #444;
        }

        .value {
            color: #3f8f11;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .grid {
                grid-template-columns: 1fr;
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .grid {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</head>

<body>
<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('logo2.png') }}" alt="Logo">
    </div>
    <div class="menu-item">
       <h2 style="color: white">Admin</h2>
    </div><div class="menu-item">
        <i class="fas fa-home"></i>
        <span>Tableau de bord</span>
    </div>
    <div class="menu-item" onclick="window.location.href='{{ route('etudiant.getall') }}'">
        <i class="fas fa-user-graduate"></i>
        <span>Étudiants</span>
    </div>
    <div class="menu-item" onclick="window.location.href='{{ route('prof.getall') }}'">
        <i class="fas fa-chalkboard-teacher"></i>
        <span>Professeurs</span>
    </div>
    <div class="menu-item" onclick="window.location.href='{{ route('admin.affectation') }}'">
        <i class="fas fa-plus-circle"></i>
        <span>Affectation</span>
    </div>
</div>

<div class="main-content">
    <div class="grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="stat-info">
                <h3>{{$nbrEtudiants}}</h3>
                <p>Total Étudiants</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="stat-info">
                <h3>{{$nbrProfs}}</h3>
                <p>Total Professeurs</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-school"></i>
            </div>
            <div class="stat-info">
                <h3>15</h3>
                <p>Étudiants affectés</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
