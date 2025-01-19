<!DOCTYPE html>
<html>
<head>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
            color: white;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.02);
        }

        .logo img {
            height: 50px;
            border-radius: 5px;
        }

        .nav-menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-menu a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 0 auto;
            max-width: 1200px;
            width: 100%;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .data-grid {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            display: flex;
            gap: 30px;
            width: 100%;
            animation: fadeIn 0.8s ease-out forwards;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .data-grid:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .photo-container {
            flex: 0 0 200px;
        }

        .photo {
            width: 200px;
            height: 240px;
            border-radius: 15px;
            object-fit: cover;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: 3px solid #fff;
            transition: transform 0.3s ease;
        }

        .photo:hover {
            transform: scale(1.02);
        }

        .info-container {
            flex: 1;
            display: flex;
            gap: 30px;
        }

        .info-column {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
            padding: 0 15px;
        }

        .info-column:first-child {
            border-right: 1px solid #000;
        }

        .data-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .data-item:hover {
            transform: translateX(5px);
            background-color: #f8f9fa;
            padding-left: 10px;
            border-radius: 5px;
        }

        .data-item:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: 600;
            color: #444;
            font-size: 0.95rem;
            margin-right: 10px;
            min-width: 80px;
        }

        .value {
            color: #27640a;
            font-weight: 500;
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .data-grid {
                flex-direction: column;
            }

            .info-container {
                flex-direction: column;
            }

            .info-column:first-child {
                border-right: none;
                border-bottom: 1px solid #000;
                padding-bottom: 15px;
            }
        }
    </style>
</head>
<body>
<header class="header">
    <a href="#" class="logo">
        <img src="{{ asset('logo2.png') }}" alt="School Logo">
    </a>
    <nav class="nav-menu">
        <a href="#">Suivre les rapports</a>
        <a href="{{route('professeur.index')}}">Deconexion</a>
        <p style="font-weight: bold">{{strtoupper($prof->nom)." ".strtoupper($prof->prenom)}}</p>
    </nav>
</header>

<div class="container">
    <div class="data-grid">
        <div class="photo-container">
            <img src="{{ asset('user.png') }}" alt="Professor Photo" class="photo">
        </div>
        <div class="info-container">
            <div class="info-column">
                <div class="data-item">
                    <span class="label">Matricule :</span>
                    <span class="value">{{$prof->matricule}}</span>
                </div>
                <div class="data-item">
                    <span class="label">Nom :</span>
                    <span class="value">{{$prof->nom}}</span>
                </div>
                <div class="data-item">
                    <span class="label">Prénom :</span>
                    <span class="value">{{$prof->prenom}}</span>
                </div>
            </div>
            <div class="info-column">
                <div class="data-item">
                    <span class="label">E-mail :</span>
                    <span class="value">{{$prof->email}}</span>
                </div>
                <div class="data-item">
                    <span class="label">Filière :</span>
                    <span class="value">{{$prof->filière}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
