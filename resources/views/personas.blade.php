<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<!-- component -->
<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
    <div class="text-center pb-12">
        <h2 class="text-base font-bold text-indigo-600">
            Jugadores y entrenadores
        </h2>
        <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-gray-900">
            
        </h1>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <a href="/personas/crear" class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center">
            <div class="mb-8 text-8xl">
                <i class="fa-solid fa-plus"></i>
            </div>
            <div class="text-center">
                <p class="text-xl text-gray-700 font-bold mb-2">Crear</p>
                <p class="text-base text-gray-400 font-normal"></p>
            </div>
        </a>
        @foreach ($personas as $persona)
        <a href="/persona/{{$persona->idpersona}}" class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center">
            <div class="mb-8">
                <img class="object-center object-cover rounded-full h-36 w-36" src="/client/{{$persona->foto}}" alt="photo">
            </div>
            <div class="text-center">
                <p class="text-xl text-gray-700 font-bold mb-2">{{$persona->nombre." ".$persona->apellido}}</p>
                <p class="text-base text-gray-400 font-normal">{{$persona->idrol->descripcion}}</p>
                <span class="flex flex-r items-center">
                    <img class="w-[16px] h-[16px] mr-2" src="/client/{{$persona->idequipo->urllogo}}" alt="">
                    <p class="text-base text-gray-400 font-normal">{{$persona->idequipo->nombre}}</p>
                </span>
            </div>
        </a>
        @endforeach
        
    </div>
</section>
</body>
</html>