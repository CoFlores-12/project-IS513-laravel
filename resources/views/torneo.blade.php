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
</head>
<body>
    <main class="flex flex-row  sm:p-2 md:p-10 justify-center ">
        <div class="leagues bg-white px-2 w-[100%] md:w-[20%] shadow-sm rounded-md py-2 hidden md:inline">
            <div class="lea py-2 flex flex-row"> 
                <img class="w-[20px] mx-2" src="https://api.dicebear.com/7.x/bottts/svg?seed=Lilly" alt="avatar" />
                League 1
            </div>
            <div class="divider"></div>
            <div class="lea py-2 flex flex-row"> 
                <img class="w-[20px] mx-2" src="https://api.dicebear.com/7.x/bottts/svg?seed=Garfield" alt="avatar" />
                League 2
            </div>
            <div class="divider"></div>
            <div class="lea py-2 flex flex-row"> 
                <img class="w-[20px] mx-2" src="https://api.dicebear.com/7.x/bottts/svg?seed=Bear" alt="avatar" />
                League 3
            </div>
            <div class="divider"></div>
            <div class="lea py-2 flex flex-row"> 
                <img class="w-[20px] mx-2" src="https://api.dicebear.com/7.x/bottts/svg?seed=Casper" alt="avatar" />
                League 4
            </div>
            <div class="divider"></div>
        </div>
        <div class="flex flex-col  w-[100%] md:w-[60%] px-2">
            <div class="flex flex-row">
                <a href="/torneos">Torneos</a> > English Premier League
            </div>
            <div class="flex flex-row ">
            <img class="w-[114px] shadow-xl rounded-xl mx-3" src="https://api.dicebear.com/7.x/bottts/svg?seed=Missy" alt="avatar" />
                <div class="infoLeague">
                    <div class="text-info-ct">About</div>
                    <div class="text-sm">
                    The Premier League is the top level of the English football league 
                        system. Contested by 20 clubs, it operates on a system of 
                        promotion and relegation with the English Football League
                    </div>
                    <div class="text-info-ct">Founded</div>
                    <p  class="text-sm">Nov. 2023</p>
                </div>
            </div>
            <div class="flex flex-row mt-5">
                <div class="p-2 ittab activetab" onclick="changetab('resCont', this)">Resultados</div>
                <div class="p-2 ittab" onclick="changetab('staCont', this)">Estadisticas</div>
                <div class="p-2 ittab" onclick="changetab('teamscont', this)">teamscont</div>
                <div class="p-2 ittab" onclick="changetab('posCont', this)">Posiciones</div>
            </div>
            <div class="container bg-white w-full">
                <div id="resCont"></div>
                <div id="staCont" class="hidden"></div>
                <div id="posCont" class="hidden"></div>
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
        <div class="teams  bg-white px-2 w-[100%] md:w-[20%] shadow-sm rounded-md py-2 hidden md:flex">
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
                <tbody>
                <tr>
                        <td>1</td>
                        <td>Equipo 1</td>
                        <td>7</td>
                        <td>13</td>
                        <td>21</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Equipo 2</td>
                        <td>7</td>
                        <td>13</td>
                        <td>21</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Equipo 3</td>
                        <td>7</td>
                        <td>13</td>
                        <td>21</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Equipo 4</td>
                        <td>7</td>
                        <td>13</td>
                        <td>21</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Equipo 5</td>
                        <td>7</td>
                        <td>13</td>
                        <td>21</td>
                    </tr>
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
                    staCont.classList.add('hidden');
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
    </script>
</body>
</html>