<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="container flex flex-col justify-center items-center h-full">
    <div class="card w-full md:w-[50%] ">
    <form enctype="multipart/form-data" class="" action="/persona/fichaje" method="POST">
        @csrf
        <div class="relative">
            <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Nombre</label>
            <input
                class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-500"
                type="" name="name" required placeholder="" value="">
        </div>
        <div class="mt-8 content-center">
            <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">
                Precio
            </label>
            <input
                class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-green-500"
                required name="Precio" type="" placeholder="" value="">
        </div>
    
        </div>
        <div class="mt-8 content-center">
            <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">
                Equipo nuevo
            </label>
            <select class="form-select" aria-label="Default select example" placeholder="Equipo nuevo">
                
                <option value="1">FCBarcelona</option>
                
            </select>
        </div>
         <div>
         <a href="/historialDeJugador" class="btn btn-primary">trasnferir</a>
        </div>
    </form>
</div>

</body>
</html>