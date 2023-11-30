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
            <form enctype="multipart/form-data" class="" action="/persona/crear" method="POST">
                @csrf
                <div class="relative flex flex-col items-center">
                    <label for="imgInp" style="text-align:center"> <label
                            class="text-sm font-bold text-gray-700 tracking-wide">
                            Foto
                        </label><img id="blah" class="w-[110px] h-[110px] shadow-md m-3 rounded-md" src="/img/blank.png"
                            alt=""></label>
                    <input type="file" accept=".png,.jpg,.jpeg" class="w-[0.01px] h-[0.01px]" name="img" required
                        id="imgInp">
                </div>
                <div class="relative">
                    <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Nombre</label>
                    <input
                        class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-500"
                        type="" name="name" required placeholder="" value="">
                </div>
                <div class="mt-8 content-center">
                    <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">
                        Apellido
                    </label>
                    <input
                        class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-green-500"
                        required name="apellido" type="" placeholder="" value="">
                </div>
                <div class="mt-8 content-center">
                    <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">
                        Fecha de nacimiento
                    </label>
                    <input
                        class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-green-500"
                        required name="fecha" type="date" placeholder="" value="">
                </div>
                <div class="mt-8 content-center">
                    <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">
                        Escoge tú rol
                    </label>
                    <select class="form-select" aria-label="Default select example" placeholder="Escoge tu rol">
                        
                        <option value="1">Arbitro</option>
                        <option value="2">Jugador</option>
                        <option value="3">Entrenador</option>
                    </select>
                </div>
                <div class="mt-8 content-center">
                    <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">
                        A que equipo perteneces?
                    </label>
                    <select class="form-select" aria-label="Default select example" placeholder="Escoge tu rol">
                        <!-- TODO: hacerlo dinamico desde el backend -->
                        <option value="1">FCBarcelona</option>
                        
                    </select>
                </div>
                <div>
                    <button type="submit"
                        class="w-full flex mt-8 justify-center bg-gradient-to-r from-green-500 to-green-600  hover:bg-gradient-to-l hover:from-green-500 hover:to-green-600 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                        Actualizar
                    </button>
                </div>
            </form>
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