<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <style>
        body {
            background: linear-gradient(135deg, #27640a 0%, #3f8f11 100%);

            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        #formcontainer {

            background-color: white;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 40%;
            height: 100%;
        }
        form{

        }
        .logo {
            text-align: center;
            margin-bottom: 100px;

        }

        .logo img {
            max-width: 300px;
        }



        .form-group {

            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: flex-start;
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
        .form-control:focus{
            border-color: #3f8f11;
        }



        .btn {
            text-align: center;
            display: flex;
            justify-self: center;
            font-weight: 400;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 10px 20px;
            font-size: 16px;
            line-height: 1.5;
            border-radius: 5px;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            color: #fff;
            background-color: #3f8f11;
            width: 100%;

        }

        .btn {
            background: linear-gradient(135deg, #27640a 0%, #3f8f11 100%);
            margin-top:40px;
            color: #fff;
            background-color: #27640a;
            border-color: #27640a;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn:hover {
            background-color: #3f8f11;
            border-color: #3f8f11;
            cursor: pointer;
        }
        #imglogin{
            position: absolute;
            top: 10%;
            left: 55%;



        }

         .error-message {
             background-color: #f8d7da;
             color: #842029;
             border: 1px solid #f5c2c7;
             padding: 15px;
             border-radius: 5px;
             margin-bottom: 20px;
             text-align: center;
         }
        .error-message strong {
            font-weight: bold;
        }


    </style>
</head>
<body>

<img id="imglogin" src="{{ asset('imagelogin.png') }}">

<div id="formcontainer">

    <div class="logo">
        <img src="{{ asset('emsilogo.png') }}" alt="Logo">

    </div>
    <form action="{{route('admin.auth')}}" method="post" >
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="email">Adresse email:</label>
            <input type="email" class="form-control" id="email" name="email" >
        </div>
        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        @if ($errors->any())
            <div class="error-message" >
                <strong>Erreur :</strong> {{ $errors->first('error') }}
            </div>
        @endif
        <button type="submit" class="btn ">Connexion</button>
    </form>
</div>
</body>
</html>
