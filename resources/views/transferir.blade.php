<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container flex justify-center items-center h-full">

        <div class="card w-full md:w-[50%] ">
            <form enctype="multipart/form-data" class="" action="/persona/transferir" method="POST">
                @csrf
                <input type="hidden" name="idpersona" value="{{$persona->idpersona}}">
                <input type="hidden" name="idequipoout" value="{{$persona->idequipo->idEquipo}}">
                <div class="relative">
                    <label  class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Nombre</label>
                    <input readonly
                        class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-500"
                        type="" name="name" required placeholder="" value="{{$persona->nombre.' '.$persona->apellido}}">
                </div>
                <div class="relative">
                    <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Equipo actual</label>
                    <input readonly
                        class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-500"
                        type="" name="equipoactual" required placeholder="" value="{{$persona->idequipo->nombre}}">
                </div>
                
                <div class="relative">
                    <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Precio</label>
                    <input
                        class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-500"
                        type="number" name="precio" required placeholder="" value="">
                </div>
                
                <div class="mt-8 content-center">
                    <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">
                        equipo destino
                    </label>
                    <select name="idequipoin" class="form-select" aria-label="Default select example" placeholder="Escoge tu rol">
                        @foreach ($equipos as $equipo)
                            <option value="{{$equipo->idEquipo}}">{{$equipo->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit"
                        class="w-full flex mt-8 justify-center bg-gradient-to-r from-green-500 to-green-600  hover:bg-gradient-to-l hover:from-green-500 hover:to-green-600 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                        Transferir
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>