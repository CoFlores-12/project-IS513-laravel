<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: 2px solid #4CAF50;
            border-radius: 15px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-body {
            padding: 20px;
        }

        .logo {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .info {
            margin-top: 20px;
        }

        .navtext{
            margin-top: 40px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container flex-column">
    <div class="navTextContainer">
    <div class="flex flex-row text-md text-gray-400 navtext">
            <a href="/equipos">Equipo </a> > {{$equipo->nombre}} 
        </div>
    </div>
        
        <div class="cardContainer flex flex-column justify-content items-center">
        <div class="card h-75 w-75">
            <div class="card-header">
                <h2>Detalles del Equipo</h2>
            </div>
            <div class="card-body">
                <div class="flex justify-center items-center">
                    <img src="/client/{{ $equipo->urllogo }}" alt="Logo del Equipo" class="logo mb-3 w-25 h-25">
                </div>
                <h3 class="flex justify-center items-center text-center text-xl font-bold">{{ $equipo->nombre }}</h3>
                    <p><strong>Año de Fundación:</strong> {{ $equipo->anioFundacion }}</p>
                    <p><strong>País:</strong> {{ $equipo->pais }}</p>
                    <p><strong>Torneo:</strong> {{ $torneo->nombre }}</p> <!-- Reemplaza 'nombre_del_torneo' con el campo real -->
                    <p><strong>Grupo:</strong> {{ $equipo->grupo }}</p>
                    <p><strong>Puntos:</strong> {{ $equipo->puntos }}</p>
                    <a href="/equipo/{{$equipo->idEquipo}}/jugadores">
                        <button type="button" class="px-3 py-2 flex items-center justify-center bg-gradient-to-r from-green-500 to-green-600  hover:bg-gradient-to-l hover:from-green-500 hover:to-green-600 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500 mr-2" style="margin-top: 1rem;">
                            Ver jugadores <i class="fa-solid fa-eye ml-2"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
       
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Agrega otros scripts que puedas necesitar -->
</body>
</html>
