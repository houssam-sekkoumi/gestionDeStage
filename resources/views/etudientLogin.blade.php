<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #3f8f11;
            background: linear-gradient(135deg, #27640a 0%, #3f8f11 100%);


            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
        }

        #formcontainer {
            background-color: white;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 40%;
            min-height: 100vh;
            position: relative;
        }

        .logo {
            text-align: center;
            margin-bottom: 60px;
            padding-top: 40px;
        }

        .logo img {
            max-width: 300px;
            width: 100%;
            height: auto;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 10px 15px;
            font-size: 16px;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            border-color: #3f8f11;
            outline: none;
        }

        .btn {
            margin-top: 40px;
            color: #fff;
            background-color: #3f8f11;
            border-color: #3f8f11;
            width: 100%;
            display: flex;
            background: linear-gradient(135deg, #27640a 0%, #3f8f11 100%);
            justify-content: center;
            align-items: center;
            padding: 10px 20px;
            font-size: 16px;
            line-height: 1.5;
            border-radius: 5px;
            border: 1px solid transparent;
            transition: all 0.15s ease-in-out;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #27640a;
            border-color: #27640a;
        }

        #imglogin {
            position: fixed;
            top: 10%;
            left: 55%;
            max-width: 40%;
            height: auto;
        }

        .error-message {
            color: #dc3545;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #dc3545;
            border-radius: 5px;
            background-color: #f8d7da;
        }

        /* Media Queries pour la responsivité */
        @media screen and (max-width: 1200px) {
            #formcontainer {
                width: 50%;
            }

            #imglogin {
                max-width: 35%;
            }
        }

        @media screen and (max-width: 992px) {
            #formcontainer {
                width: 60%;
            }

            #imglogin {
                max-width: 30%;
            }
        }

        @media screen and (max-width: 768px) {
            #formcontainer {
                width: 100%;
                min-height: 100vh;
            }

            #imglogin {
                display: none;
            }

            .logo {
                margin-bottom: 40px;
            }

            .logo img {
                max-width: 250px;
            }
        }

        @media screen and (max-width: 480px) {
            #formcontainer {
                padding: 20px;
            }

            .logo img {
                max-width: 200px;
            }

            .btn {
                padding: 8px 16px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
<img id="imglogin" src="{{ asset('imagelogin.png') }}" alt="Login Image">
<div id="formcontainer">
    <div class="logo">
        <img src="{{ asset('emsilogo.png') }}" alt="Logo">
    </div>
    <form action="{{route('etudiant.auth')}}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="email">Matricule:</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        @if ($errors->any())
            <div class="error-message">
                <strong>Erreur :</strong> {{ $errors->first('error') }}
            </div>
        @endif
        <button type="submit" class="btn">Connexion</button>
    </form>
</div>
</body>
</html>
