<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="navTextContainer bg-gray-800 text-white">
    <div class="flex flex-row text-md">
        <a href="/equipos" class="hover:text-gray-300">Equipo</a> >
        <a href="/equipo/{{$equipo->idEquipo}}" class="hover:text-gray-300">{{$equipo->nombre}}</a> > Jugadores
    </div>
</div>

<div class="container mx-auto mt-8 p-4">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        <div class="card flex flex-col items-center bg-white rounded-md p-4 transition-transform transform hover:scale-105">
            <div class="iconoJugador flex justify-center text-gray-800 mb-4">
                <i class="fa-solid fa-user-plus text-5xl"></i>
            </div>
            <div class="card-body flex flex-col items-center">
                <a href="/persona/crear"
                    class="bg-green-500 text-white px-4 py-2 rounded-full font-bold text-xs uppercase transition-all hover:bg-green-600 focus:outline-none focus:ring focus:border-blue-300">
                    Añadir jugador <i class="fa-solid fa-plus ml-1"></i>
                </a>
            </div>
        </div>

        <!--
        @foreach($jugadores as $persona)
            <div class="card bg-white rounded-md p-4 transition-transform transform hover:scale-105">
                <img src="{{ $persona['imagen'] }}" class="w-full h-48 object-cover mb-4 rounded-md"
                    alt="{{ $persona['nombre'] }}">
                <div class="card-body">
                    <h5 class="card-title text-xl font-bold">{{ $persona['nombre'] }}</h5>
                    <p class="card-text">
                        <strong>Posición Principal:</strong> {{ $persona['posicion_principal'] }}
                    </p>
                    <p class="card-text">
                        <strong>Posición Secundaria:</strong> {{ $persona['posicion_secundaria'] }}
                    </p>
                    <a href="/historialDeJugador"
                        class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded-full font-bold text-xs uppercase transition-all hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                        Ver perfil
                    </a>
                </div>
            </div>
        @endforeach -->

        <div class="card bg-white rounded-md p-4 transition-transform transform hover:scale-105">
        
                    <img src="https://img.a.transfermarkt.technology/portrait/header/74857-1674465246.jpg?lm=1" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Marc-André ter Stegen</h5>
                        <p class="card-text">Posición principal :
                            Portero</p>
                        <a href="/historialDeJugador" class="btn btn-primary">Ver perfil</a>
                    </div>
        </div>

</div>

</body>

</html>
