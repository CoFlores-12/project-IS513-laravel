<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>

    </style>
</head>
<body style="overflow:hidden">
    <div class="relative min-h-screen flex ">
        <!-- Sección izquierda con fondo y animaciones -->
        <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
            <div class="sm:w-1/2 xl:w-2/5 h-full hidden md:flex flex-auto items-center justify-start p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative" style="background-image: url(/img/bg.jpg);">
                <div class="absolute bg-gradient-to-b from-green-900 to-gray-900 opacity-75 inset-0 z-0"></div>
                <div class="absolute triangle  min-h-screen right-0 w-16  animate__animated animate__slideInRight"></div>
                <img src="/img/player.png" class="h-56 absolute right-10 mr-10 animate__animated animate__zoomInDown">
                <div class="w-full  max-w-md z-10 animate__animated animate__slideInLeft">
                    <div class="sm:text-4xl xl:text-5xl font-bold leading-tight mb-6">Nuevo equipo</div>
                    <div class="sm:text-sm xl:text-md text-gray-200 font-normal">Agrega un nuevo equipo</div>
                </div>
                <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>

            <!-- Sección derecha con formulario para crear el equipo -->
            <div class="md:flex md:items-center md:justify-center w-full sm:w-auto md:h-full w-2/5 xl:w-2/5 p-8  md:p-10 lg:p-14 sm:rounded-lg md:rounded-none bg-white animate__animated animate__slideInRight">
                <div class="max-w-md w-full">
                    <form enctype="multipart/form-data" class="" action="/torneo/{{$torneo->id}}/equipos/guardar" method="POST">
                        @csrf
                        <div class="relative flex flex-col items-center">
                            <label for="imgInp" style="text-align:center">
                                <label class="text-sm font-bold text-gray-700 tracking-wide">Logo</label>
                                <img id="blah" class="w-[110px] h-[110px] shadow-md m-3 rounded-md" src="/img/blank.png" alt="">
                            </label>
                            <input type="file" accept=".png,.jpg,.jpeg" class="w-[0.01px] h-[0.01px]" name="img" required id="imgInp">
                        </div>
                        <div class="relative">
                            <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Nombre</label>
                            <input class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-500" type="text" name="nombre" required placeholder="" value="">
                        </div>
                        <div class="relative">
                            <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Año de Fundación</label>
                            <input class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-500" type="text" name="anioFundacion" required placeholder="" value="">
                        </div>
                        <div class="relative">
                            <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">País</label>
                            <input class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-500" type="text" name="pais" required placeholder="" value="">
                        </div>
                        <div class="mt-8 content-center">
                            <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Torneo</label>
                            <!-- Lista desplegable para seleccionar el torneo -->


                            <select class="select w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-green-500" required name="idTorneo">
                                <option value="{{$torneo->id}}">Torneo actual: {{$torneo->nombre}} o...</option>
                                @foreach ($torneos as $torneo)
                                    <option value="{{ $torneo->id }}">{{ $torneo->nombre }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div>
                            <button type="submit" class="w-full flex mt-8 justify-center bg-gradient-to-r from-green-500 to-green-600  hover:bg-gradient-to-l hover:from-green-500 hover:to-green-600 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                                Crear
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const imgInp = document.getElementById('imgInp');
        const blah = document.getElementById('blah');
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file);
            }
        }
    </script>
</body>
</html>
