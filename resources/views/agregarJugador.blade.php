<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form enctype="multipart/form-data" class="" action="/torneos/guardar" method="POST">
            @csrf
            <div class="relative flex flex-col items-center">
                <label for="imgInp" style="text-align:center"> <label class="text-sm font-bold text-gray-700 tracking-wide">
                Logo
              </label><img id="blah" class="w-[110px] h-[110px] shadow-md m-3 rounded-md" src="/img/blank.png" alt=""></label>
              <input type="file" accept=".png,.jpg,.jpeg" class="w-[0.01px] h-[0.01px]" name="img" required id="imgInp">
            </div>
            <div class="relative">
              <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Nombre</label>
              <input class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-500" type="" name="name" required placeholder="" value="">
            </div>
            <div class="mt-8 content-center">
              <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">
                Titulo
              </label>
              <input class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-green-500" required name="title" type="" placeholder="" value="">
            </div>
            <div class="mt-8 content-center">
              <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">
                Informacion
              </label>
              <input class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-green-500" required name="informacion" type="" placeholder="" value="">
            </div>
            <div>
              <button type="submit" class="w-full flex mt-8 justify-center bg-gradient-to-r from-green-500 to-green-600  hover:bg-gradient-to-l hover:from-green-500 hover:to-green-600 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                Crear
              </button>
            </div>
          </form>
</body>
</html>