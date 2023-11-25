<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/torneo.css">
    
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>
<div id="gameCont" class="hidden p-3 absolute top-0 w-full h-full bg-white z-50">
    <div class="flex absolute right-10 mt-2 justify-end">
        <button onclick="toggleModal()" class="bg-white p-2 rounded-md px-3"><i class="fa-solid fa-x"></i></button>
    </div>
    <iframe src="/torneos/clasificatoria/{{$torneo->id}}" class="w-full h-full" frameborder="0"></iframe>
</div>
    <main class="flex flex-row  sm:p-2 md:p-10 justify-center ">
        <div class="leagues animate__animated animate__fadeInLeft bg-white px-2 w-[100%] md:w-[20%] shadow-sm rounded-md py-2 hidden md:inline">
            @for($i = 0; $i < 5 && $i < count($torneos); $i++)
                <a href="/torneo/{{$torneos[$i]->id}}">
                    <div class="lea py-2 flex flex-row"> 
                        <img class="w-[20px] mx-2" src="/client/{{$torneos[$i]->logo}}" alt="avatar" />
                        {{$torneos[$i]->nombre}}
                    </div>
                </a>
                <div class="divider"></div>
            @endfor
           
        </div>
        <div class="flex flex-col  w-[100%] md:w-[60%] px-2">
            <div class="flex flex-row text-sm text-gray-400">
                <a href="/torneos">Torneos</a> > {{$torneo->nombre}}
            </div>
            <div class="flex flex-row mt-3">
            <img class="w-[114px] shadow-xl rounded-xl mx-3" src="/client/{{$torneo->logo}}" alt="avatar" />
                <div class="infoLeague">
                    <div class="text-info-ct">Informacion</div>
                    <div class="text-sm">
                    {{$torneo->informacion}}
                    </div>
                    <div class="text-info-ct">creado en:</div>
                    <p  class="text-sm">{{$torneo->fecha}}</p>
                </div>
            </div>
            <div class="flex flex-row items-center justify-end ">

            <a href="/torneos/eliminar/{{$torneo->id}}">
           <button type="submit" class="px-3 py-2 flex items-center justify-center bg-gradient-to-r from-red-500 to-red-600 text-sm hover:bg-gradient-to-l hover:from-red-600 hover:to-red-500 text-white p-0 my-2 rounded-full tracking-wide font-semibold  shadow-sm cursor-pointer transition ease-in duration-500 mr-2">
                Eliminar <i class="fa-solid fa-trash ml-2"></i>
              </button>
           </a>


           <a href="/torneos/editar/{{$torneo->id}}">
           <button type="submit" class="px-3 py-2 flex items-center justify-center bg-gradient-to-r from-white text-sm hover:bg-gradient-to-l hover:from-white- hover:to-white text-black p-0 my-2 rounded-full tracking-wide font-semibold  shadow-sm cursor-pointer transition ease-in duration-500 mr-2">
                Editar <i class="fa-solid fa-pen-to-square ml-2"></i>
              </button>
           </a>
              <button type="submit" class="px-3 py-2 flex items-center justify-center bg-gradient-to-r from-white text-sm hover:bg-gradient-to-l hover:from-white- hover:to-white text-black p-0 my-2 rounded-full tracking-wide font-semibold  shadow-sm cursor-pointer transition ease-in duration-500">
                Agregar Equipo <i class="fa-solid fa-plus ml-2"></i>
              </button>
            </div>
            <div class="flex flex-row mt-3 animate__fadeInUp animate__animated">
                <div class="p-2 ittab activetab" onclick="changetab('resCont', this)">Resultados</div>
                <div class="p-2 ittab" onclick="changetab('staCont', this)">Posiciones</div>
                <div class="p-2 ittab" onclick="changetab('teamscont', this)">Equipos</div>
                <div class="p-2 ittab" onclick="changetab('posCont', this)">Top</div>
                <div class="p-2 ittab" onclick="toggleModal()">Clasificatoria</div>
            </div>
            <div class="container animate__fadeInUp animate__animated bg-white w-full">
                
                <div id="resCont" class="p-3">
                    <table class="w-full">
                        <tbody>
                            <tr class="p-3">
                                <td class="text-right font-light">Equipo 1</td>
                                <td class="w-[70px] text-center font-bold">0 - 1</td>
                                <td class="font-light">Equipo 2</td>
                                <td> <button type="submit" class="w-full flex justify-center bg-gradient-to-r from-green-500 to-green-600  hover:bg-gradient-to-l hover:from-green-500 hover:to-green-600 text-gray-100 p-0 my-2 rounded-full tracking-wide font-semibold  shadow-sm cursor-pointer transition ease-in duration-500">
                Info
              </button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="staCont" class="hidden p-3">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <td class="text-center">#</td>
                                <td>Equipo</td>
                                <td class="text-center">PT</td>
                                <td class="text-center">E</td>
                                <td class="text-center">G</td>
                                <td class="text-center">P</td>
                                <td class="text-center">PTS</td>
                            </tr>
                        </thead>
                        <tbody class="posTable">
                            @for($i=1; $i <= 10; $i++)
                            <tr class="hover:bg-gray-50 my-2">
                                <td class="text-center">{{$i}}</td>
                                <td class="flex flex-row items-center"> <img class="w-[15px] mx-3" src="https://api.dicebear.com/7.x/bottts-neutral/svg?seed=Lilly" alt=""> Equipo {{$i}}</td>
                                <td class="text-center">{{rand(5-$i,9-$i)}}</td>
                                <td class="text-center">{{rand(5-$i,9-$i)}}</td>
                                <td class="text-center">{{rand(5-$i,9-$i)}}</td>
                                <td class="text-center">{{rand(5-$i,9-$i)}}</td>
                                <td class="text-center">{{rand(5-$i,9-$i)}}</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                <div id="posCont" class="hidden p-3"></div>
                <div id="teamscont" class="grid grid-cols-2 md:grid-cols-4 gap-2 py-3 hidden">
                    <div class="teamCont p-3 shadow-sm rounded-md">
                        <img class="w-[100%]" src="https://api.dicebear.com/7.x/bottts-neutral/svg?seed=Lilly" alt="">
                        Equipo 1
                    </div>
                    <div class="teamCont p-3 shadow-sm rounded-md">
                        <img class="w-[100%]" src="https://api.dicebear.com/7.x/bottts-neutral/svg?seed=Garfield" alt="">
                        Equipo 2
                    </div>
                    <div class="teamCont p-3 shadow-sm rounded-md">
                        <img class="w-[100%]" src="https://api.dicebear.com/7.x/bottts-neutral/svg?seed=Missy" alt="">
                        Equipo 3
                    </div>
                    <div class="teamCont p-3 shadow-sm rounded-md">
                        <img class="w-[100%]" src="https://api.dicebear.com/7.x/bottts-neutral/svg?seed=Casper" alt="">
                        Equipo 4
                    </div>
                    <div class="teamCont p-3 shadow-sm rounded-md">
                        <img class="w-[100%]" src="https://api.dicebear.com/7.x/bottts-neutral/svg?seed=Bear" alt="">
                        Equipo 5
                    </div>
                </div>
            </div>
        </div>
        <div class="teams  animate__animated animate__fadeInRight bg-white px-2 w-[100%] md:w-[20%] shadow-sm rounded-md py-2 hidden md:flex">
            <table class="w-full">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Equipo</td>
                        <td>P</td>
                        <td>G</td>
                        <td>PTS</td>
                    </tr>
                </thead>
                <tbody class="posTable">
                    @for($i=1; $i <= 10; $i++)
                        <tr class="hover:bg-gray-50 my-2">
                            <td>{{$i}}</td>
                            <td> Equipo {{$i}}</td>
                            <td>{{rand(5-$i,9-$i)}}</td>
                            <td>{{rand(5-$i,9-$i)}}</td>
                            <td>{{rand(5-$i,9-$i)}}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
    <script>
        const resCont = document.getElementById('resCont')
        const staCont = document.getElementById('staCont')
        const posCont = document.getElementById('posCont')
        const teamscont = document.getElementById('teamscont')
        const gameCont = document.getElementById('gameCont')
        function changetab(data, elementtab) {
            document.getElementsByClassName('activetab')[0].classList.remove('activetab');
            elementtab.classList.add('activetab');
            switch (data) {
                case "resCont":
                    resCont.classList.remove('hidden');
                    posCont.classList.add('hidden');
                    staCont.classList.add('hidden');
                    teamscont.classList.add('hidden');
                    break;
                case "staCont":
                    staCont.classList.remove('hidden');
                    posCont.classList.add('hidden');
                    resCont.classList.add('hidden');
                    teamscont.classList.add('hidden');
                    break;
                case "posCont":
                    posCont.classList.remove('hidden');
                    resCont.classList.add('hidden');
                    staCont.classList.add('hidden');
                    teamscont.classList.add('hidden');
                    break;
                case "teamscont":
                    teamscont.classList.remove('hidden');
                    posCont.classList.add('hidden');
                    staCont.classList.add('hidden');
                    resCont.classList.add('hidden');
                    break;
               
                default:
                    break;
            }
        }

        function toggleModal() {
            gameCont.classList.toggle('hidden');    
        }
    </script>
</body>
</html>