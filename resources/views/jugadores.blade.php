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

<body>
<style>
  .card{
   min-height:456px !important;
  }
</style>
    <div class="container text-center">

        <div class="row">

            
        <div class="col">
                <div class="card flex  " style="width: 18rem;">
                <div class="iconoJugador flex justify-center text-gray-800 "  style="font-size: 10rem;">
                  <i class="fa-solid fa-user-plus " ></i>

                </div>
                    <div class="card-body flex flex-col justify-center content-center ">
                     
                       <a href="/jugadores"><button
                            class="middle none center mr-4 rounded-lg bg-green-500 py-2 px-4 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            data-ripple-light="true">
                            Añadir jugador <i class="fa-solid fa-plus"></i>
                        </button></a> 
                    </div>
                </div>
            </div>
            <div class="col">
            

                <div class="card" style="width: 18rem;">
                    <img src="/img/iconsoccer.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">nombre</h5>
                        <p class="card-text">descripcion</p>
                        <a href="/historialDeJugador" class="btn btn-primary">Ver perfil</a>
                    </div>
                </div>
             

            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="https://img.a.transfermarkt.technology/portrait/big/53622-1689683568.jpg?lm=1" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ilkay Gundogan</h5>
                        <p class="card-text">Posición principal :
Mediocentro
Posición secundaria:
Pivote
Mediocentro ofensivo</p>
                        <a href="/historialDeJugador" class="btn btn-primary">Ver perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>