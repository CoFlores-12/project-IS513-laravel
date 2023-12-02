<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
      <!-- component -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;1,100&display=swap"
rel="stylesheet" />

<style>
    html,
    body {
        font-family: Poppins, Helvetica, sans-serif;
    }
</style>
</head>

<body>
  

<div class="mx-20 mt-8 grid">
 

  <div class="flex flex-row rounded-lg border border-gray-200/80 bg-white p-6">
    <img class="w-40 h-40 rounded-md object-cover" src="/client/{{$persona->foto}}" alt="User" />

    <div class="flex flex-col px-6">
      <div class="flex h-8 flex-row">
          <h2 class="text-lg font-semibold">{{$persona->nombre." ". $persona->apellido}}</h2>
      </div>

      <div class="my-2 flex flex-row space-x-2">
        <div class="flex flex-row">
        <i class="fa-solid fa-people-group"></i>
          <div class="text-xs text-gray-400/80 hover:text-gray-400 ml-2">{{$persona->idequipo->nombre}}</div>
        </div>

        <div class="flex flex-row">
        <i class="fa-solid fa-calendar-days"></i>
          <div class="text-xs text-gray-400/80 hover:text-gray-400 ml-2">{{$persona->fecha}}</div>
        </div>

      </div>

      <div class="mt-2 flex flex-row items-center space-x-5">
        <button onclick="change('g')"
          class="flex h-20 w-40 flex-col items-center justify-center rounded-md border border-dashed border-gray-200 transition-colors duration-100 ease-in-out hover:border-gray-400/80">
          <div class="flex flex-row items-center justify-center">
          <i class="fa-solid fa-futbol"></i>

            <span class="font-bold text-gray-600 ml-2"> {{count($goles)}} </span>
          </div>

          <div class="mt-2 text-sm text-gray-400">Goles</div>
</button>

        <button onclick="change('p')"
          class="flex h-20 w-40 flex-col items-center justify-center rounded-md border border-dashed border-gray-200 transition-colors duration-100 ease-in-out hover:border-gray-400/80">
          <div class="flex flex-row items-center justify-center">
          <i class="fa-solid fa-medal"></i>

            <span class="font-bold text-gray-600 ml-2"> {{count($partidos)}} </span>
          </div>

          <div class="mt-2 text-sm text-gray-400">Partidos</div>
        </button>

        <button onclick="change('t')"
          class="flex h-20 w-40 flex-col items-center justify-center rounded-md border border-dashed border-gray-200 transition-colors duration-100 ease-in-out hover:border-gray-400/80">
          <div class="flex flex-row items-center justify-center">
            <i class="fa-solid fa-right-left"></i>

            <span class="font-bold text-gray-600 ml-2"> {{count($fichajes)}} </span>
          </div>

          <div class="mt-2 text-sm text-gray-400">Fichajes</div>
        </button>
      </div>
    </div>

    <div class="w-100 flex flex-grow flex-col items-end justify-start">
      <div class="flex flex-row space-x-3 items-center justify-center">
        <a href="/persona/transferir/{{$persona->idpersona}}"
          class="flex items-center justify-center rounded-md bg-green-500 py-2 px-4 text-white transition-all duration-150 ease-in-out hover:bg-green-600">
          <i class="fa-solid fa-right-left mr-2"></i>
          Transferir
</a>
       
      </div>
    </div>
  </div>
</div>
<div class="mx-20 mt-8 rounded-lg border border-gray-200/80 bg-white p-6">
    <div id="goles">
        <center>Goles</center>
        <table class="w-full">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Equipo</th>
            </tr>
          </thead>
          <tbody>
            @foreach($goles as $gol)
              <tr>
                <th>{{$gol->partido->fecha}}</th>
                <th class="flex flex-row"><img class="w-[24px] h-[24px] mr-2" src="/client/{{$gol->equipo->urllogo}}" alt="">{{$gol->equipo->nombre}}</th>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
    <div id="partidos" class="hidden">
        <center>Partidos</center>
        <table class="w-full">
          <tbody>
            @foreach($partidos as $partido)
              <tr>
                <td>{{$partido->fecha}}</td>
                <th class="font-light flex justify-end text-right flex-row"><img class="w-[24px] h-[24px] mr-2" src="/client/{{$partido->equipo1->urllogo}}" alt="">{{$partido->equipo1->nombre}}</th>
                <td class="w-[70px] text-center font-bold">{{$partido->golesequipo1}} - {{$partido->golesequipo2}}</td>
                <th class="font-light flex flex-row"><img class="w-[24px] h-[24px] mr-2" src="/client/{{$partido->equipo2->urllogo}}" alt="">{{$partido->equipo2->nombre}}</th>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
    <div id="transfers" class="hidden">
        <center>Fichajes</center>
        <table class="w-full">
          <thead>
              <tr>
                <td class="font-light">Desde</td>
                <td class="font-light">Precio</td>
                <td class="font-light">Para</td>
              </tr>
            </thead>
          <tbody>
            @foreach($fichajes as $fichaje)
              <tr>
                <td class="font-light flex flex-row"><img class="w-[24px] h-[24px] mr-2" src="/client/{{$fichaje->idequipoout->urllogo}}" alt="">{{$fichaje->idequipoout->nombre}}</td>
                <td>{{$fichaje->precio}}</td>
                <td class="font-light flex flex-row"><img class="w-[24px] h-[24px] mr-2" src="/client/{{$fichaje->idequipoin->urllogo}}" alt="">{{$fichaje->idequipoin->nombre}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
<script>
    const gview = document.getElementById('goles');
    const pview = document.getElementById('partidos');
    const tview = document.getElementById('transfers');
    function change(view) {
        switch (view) {
            case 'p':
                pview.classList.remove('hidden');
                gview.classList.add('hidden');
                tview.classList.add('hidden');
                break;
            case 't':
                tview.classList.remove('hidden');
                gview.classList.add('hidden');
                pview.classList.add('hidden');
                break;
            default:
                gview.classList.remove('hidden');
                pview.classList.add('hidden');
                tview.classList.add('hidden');
                break;
        }
    }
</script>
</body>

</html>