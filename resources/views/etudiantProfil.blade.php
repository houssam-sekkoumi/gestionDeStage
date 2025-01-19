<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary-color: #27640a;
            --primary-hover: #3f8f11;
            --background: #f5f5f5;
            --card-bg: #ffffff;
            --text-primary: #333;
            --border-color: #e0e0e0;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: var(--background);
            color: var(--text-primary);
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
            padding: 20px;
            margin: 0 auto;
            max-width: 1200px;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            animation: slideIn 0.5s ease-out forwards;
        }

        .alert-success {
            background-color: #dcfce7;
            border: 1px solid #16a34a;
            color: #16a34a;
        }

        .alert-success i {
            font-size: 1.25rem;
            color: #16a34a;
        }

        .alert-dismiss {
            margin-left: auto;
            cursor: pointer;
            padding: 0.25rem;
            border-radius: 0.25rem;
            transition: background-color 0.2s ease;
        }

        .alert-dismiss:hover {
            background-color: rgba(22, 163, 74, 0.1);
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
            border-right: 1px solid #e0e0e0;
        }

        .data-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid var(--border-color);
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
            color: var(--primary-color);
            font-weight: 500;
            font-size: 1rem;
        }

        .upload-section {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            width: 100%;
            animation: fadeIn 0.8s ease-out forwards;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-color);
        }

        .file-input-wrapper {
            position: relative;
            width: 100%;
            height: 200px;
            border: 2px dashed var(--border-color);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 20px;
        }

        .file-input-wrapper:hover {
            border-color: var(--primary-color);
            background-color: rgba(39, 100, 10, 0.05);
        }

        .file-input-content {
            text-align: center;
        }

        .file-input-content i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .file-input-content p {
            margin: 5px 0;
            color: #666;
        }

        input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        .upload-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .upload-btn:hover {
            background-color: var(--primary-hover);
        }

        .file-info {
            margin-top: 1rem;
            padding: 1rem;
            background-color: rgba(39, 100, 10, 0.05);
            border-radius: 0.5rem;
            display: none;
        }

        .file-info.active {
            display: block;
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

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
                border-bottom: 1px solid var(--border-color);
                padding-bottom: 15px;
            }

            .photo-container {
                display: flex;
                justify-content: center;
            }

            .header {
                padding: 10px 15px;
            }

            .nav-menu {
                gap: 15px;
            }

            .container {
                padding: 10px;
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
        <a href="#upload-form">Déposer le rapport</a>
        <a href="{{route('etudiant.index')}}">Deconexion</a>
        <p style="font-weight: bold">{{strtoupper($etudient->nom)." ".strtoupper($etudient->prenom)}}</p>
    </nav>
</header>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success" id="successAlert">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
            <span class="alert-dismiss" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </span>
        </div>
    @endif

    <div class="data-grid">
        <div class="photo-container">
            <img src="{{ asset('user.png') }}" alt="Student Photo" class="photo">
        </div>
        <div class="info-container">
            <div class="info-column">
                <div class="data-item">
                    <span class="label">Matricule :</span>
                    <span class="value">{{$etudient->matricule}}</span>
                </div>
                <div class="data-item">
                    <span class="label">Nom :</span>
                    <span class="value">{{$etudient->nom}}</span>
                </div>
                <div class="data-item">
                    <span class="label">Prénom :</span>
                    <span class="value">{{$etudient->prenom}}</span>
                </div>
                <div class="data-item">
                    <span class="label">E-mail :</span>
                    <span class="value">{{$etudient->email}}</span>
                </div>
            </div>
            <div class="info-column">
                <div class="data-item">
                    <span class="label">Filière :</span>
                    <span class="value">{{$etudient->filière}}</span>
                </div>
                <div class="data-item">
                    <span class="label">Classe :</span>
                    <span class="value">{{$etudient->classe}}</span>
                </div>
                <div class="data-item">
                    <span class="label">Groupe :</span>
                    <span class="value">{{$etudient->groupe}}</span>
                </div>
            </div>
        </div>
    </div>

    <div id="upload-form" class="upload-section">
        <h2 class="section-title">Déposer le rapport</h2>
        <form action="{{ route('rapportEtudiant.upload',$etudient->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="file-input-wrapper">
                <input type="file" name="file" id="file" accept=".pdf,.doc,.docx">
                <div class="file-input-content">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <h3>Glissez et déposez votre fichier ici</h3>
                    <p>ou</p>
                    <p>Cliquez pour sélectionner un fichier</p>
                    <p class="text-sm text-secondary">Formats acceptés : PDF, DOC, DOCX</p>
                </div>
            </div>
            <div id="fileInfo" class="file-info">
                <p><i class="fas fa-file-alt"></i> <span id="fileName"></span></p>
            </div>
            <button type="submit" class="upload-btn">
                <i class="fas fa-upload"></i>
                <span>Déposer le rapport</span>
            </button>
        </form>
    </div>
</div>

<script>
    document.getElementById('file').addEventListener('change', function(e) {
        const fileInfo = document.getElementById('fileInfo');
        const fileName = document.getElementById('fileName');

        if (this.files.length > 0) {
            fileName.textContent = this.files[0].name;
            fileInfo.classList.add('active');
        } else {
            fileInfo.classList.remove('active');
        }
    });

    const successAlert = document.getElementById('successAlert');
    if (successAlert) {
        setTimeout(() => {
            successAlert.style.opacity = '0';
            successAlert.style.transform = 'translateY(-10px)';
            setTimeout(() => {
                successAlert.remove();
            }, 500);
        }, 5000);
    }
</script>
</body>
</html>
