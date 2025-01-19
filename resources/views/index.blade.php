<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            min-height: 100vh;
        }

        .accueil-header {
            background: linear-gradient(135deg, #27640a 0%, #3f8f11 100%);
            text-align: center;
            padding: 30px 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .accueil-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, transparent 100%);
            z-index: 1;
        }

        .accueil-header img {
            max-width: 300px;
            height: auto;
            position: relative;
            z-index: 2;
            transition: transform 0.3s ease;
        }

        .accueil-header img:hover {
            transform: scale(1.05);
        }

        .accueil-body {
            display: flex;
            justify-content: center;
            gap: 40px;
            padding: 60px 20px;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }

        .accueil-component {
            width: 320px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .accueil-component:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 35px rgba(63, 143, 17, 0.2);
        }

        .accueil-component img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .accueil-component:hover img {
            transform: scale(1.1);
        }

        .accueil-component-title {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #27640a 0%, #3f8f11 100%);
            color: white;
            font-size: 1.3rem;
            font-weight: 600;
            position: relative;
            z-index: 2;
        }

        .accueil-component::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(0,0,0,0.5));
            z-index: 1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .accueil-component:hover::before {
            opacity: 1;
        }

        .icon-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            color: white;
            font-size: 3rem;
            z-index: 2;
            transition: transform 0.3s ease;
        }

        .accueil-component:hover .icon-overlay {
            transform: translate(-50%, -50%) scale(1);
        }

        @media (max-width: 768px) {
            .accueil-header img {
                max-width: 250px;
            }

            .accueil-component {
                width: 100%;
                max-width: 340px;
            }

            .accueil-body {
                padding: 30px 15px;
                gap: 30px;
            }
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

        .accueil-component {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .accueil-component:nth-child(2) {
            animation-delay: 0.2s;
        }
    </style>
</head>

<body>
<div class="accueil-header">
    <a href="https://emsi.ma/">
        <img src="{{ asset('logo2.png') }}" alt="Logo">
    </a>
</div>

<div class="accueil-body">
    <div class="accueil-component" onclick="window.location.href='{{ route('etudiant.index') }}'">
        <img src="{{ asset('etuduent.jpg') }}" alt="Espace Étudiant">
        <div class="icon-overlay">
            <i class="fas fa-user-graduate"></i>
        </div>
        <div class="accueil-component-title">Espace Étudiant</div>
    </div>

    <div class="accueil-component" onclick="window.location.href='{{ route('professeur.index') }}'">
        <img src="{{ asset('prof.jpg') }}" alt="Espace Professeur">
        <div class="icon-overlay">
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div class="accueil-component-title">Espace Professeur</div>
    </div>
</div>
</body>
</html>
