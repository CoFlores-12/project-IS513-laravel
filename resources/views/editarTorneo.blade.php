<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar | </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>
    <div class="flex justify-center items-center w-full h-full">
        <form id="myform" enctype="multipart/form-data" class="card p-3 bg-white shadow-md  animate__animated animate__bounceInDown" action="/torneos/actualizar" method="post">
            @csrf

            <input type="hidden" name="id" value="{{$torneo->id}}">
            <input type="hidden" name="fecha" value="{{$torneo->fecha}}">
            <input type="hidden" name="logo" value="{{$torneo->logo}}">
            <input type="hidden" name="logoChanged" value="0" id="logoChanged">

            <div class="flex justify-center">
            <label for="imgInp" style="text-align:center"> <label class="text-sm font-bold text-gray-700 tracking-wide">
                Logo
              </label><img id="blah" class="w-[125px] h-[125px] mb-8 shadow-md rounded-md" src="/client/{{$torneo->logo}}" alt=""></label>
            </div>
              <input type="file" accept=".png,.jpg,.jpeg" class="w-[0.01px] h-[0.01px]" name="img" id="imgInp">
            

            <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide">
            Nombre
            </label>
            <input class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-green-500" name="name" type="text"  value="{{$torneo->nombre}}">

            
           

            <label class="ml-3 mt-8 text-sm font-bold text-gray-700 tracking-wide">
            Informacion
            </label>
            <input class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-green-500" name="informacion" type="text"  value="{{$torneo->informacion}}">


            <button type="submit"  form="myform" class="w-full flex mt-8 justify-center bg-gradient-to-r from-green-500 to-green-600  hover:bg-gradient-to-l hover:from-green-500 hover:to-green-600 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                Actualizar
              </button>
            </form>
    </div>
    <script>
    const imgInp = document.getElementById('imgInp');
    const blah = document.getElementById('blah');
    const logoChanged = document.getElementById('logoChanged');
    imgInp.onchange = evt => {
    const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file);
            logoChanged.value = 1;
        }
    }
  </script>
</body>
</html>