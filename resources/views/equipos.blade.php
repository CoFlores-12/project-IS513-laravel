<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos: {{$torneo-> nombre }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body>
<div>

    <div class="flex h-screen overflow-y-hidden" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">   
    

        <div
            x-ref="loading"
            class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
        >
            Loading.....
        </div>

        <!-- Sidebar backdrop -->
        <div
            x-show.in.out.opacity="isSidebarOpen"
            class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
        ></div>

        <div class="flex flex-col flex-1 h-full overflow-hidden">
            <!-- Main content -->
            <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
                <!-- Main content header -->
                <div
                    class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
                >
                    <h1 class="text-2xl font-semibold whitespace-nowrap">Equipos: {{$torneo-> nombre }}</h1>
                </div>

                <div class="flex flex-row text-sm text-gray-400">
                    <a href="/torneos">Torneos</a> > <a href="/torneo/{{$torneo->idtorneo}}">{{$torneo->nombre}}</a> > Equipos
                </div> 

                <div class="flex flex-row justify-between items-center mt-6" style="margin-top: 25px;">
                    <h3 class="text-xl">Añade un equipo</h3>
                    <a href="/torneo/{{$torneo->idtorneo}}/equipos/nuevo">
                        <button
                            class="middle none center mr-4 rounded-lg bg-green-500 py-2 px-4 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            data-ripple-light="true"
                        >
                            Crear nuevo equipo <i class="fa-solid fa-plus"></i>
                        </button>
                    </a>
                </div>


                <!-- Start Content -->
                <div class="row" style="margin-top: 25px;">

                @for($i = count($equipos) - 1; $i >= 0; $i--)

                    <div class="col-md-4" style="margin-top: 2.5rem;">
                        <div class="p-4 animate__animated animate__bounceIn transition-shadow border rounded-lg shadow-sm hover:shadow-lg bg-white">
                            <div class="flex items-start justify-between">
                                <div class="flex flex-col space-y-2">
                                    <span class="text-lg-gray-600">{{$equipos[$i]->nombre}}</span>
                                    <span class="text-sm font-semibold">{{$equipos[$i]->anioFundacion}}</span>
                                    <span class="text-sm font-semibold">{{$equipos[$i]->pais}}</span>
                                </div>
                                <div class="p-3 bg-gray-200 rounded-md"><img class="w-[54px]" src="{{$equipos[$i]->urllogo}}" alt=""></div>
                            </div>
                            <a href="/torneo/{{$torneo->idtorneo}}/equipos/eliminar/{{$equipos[$i]->idEquipo}}">
                                <button type="submit" class="px-3 py-2 flex items-center justify-center bg-gradient-to-r from-red-500 to-red-600 text-sm hover:bg-gradient-to-l hover:from-red-600 hover:to-red-500 text-white p-0 my-2 rounded-full tracking-wide font-semibold  shadow-sm cursor-pointer transition ease-in duration-500 mr-2">
                                    Eliminar <i class="fa-solid fa-trash ml-2"></i>
                                </button>
                            </a>

                            <button type="button" class="px-3 py-2 flex items-center justify-center bg-gradient-to-r from-white text-sm hover:bg-gradient-to-l hover:from-white- hover:to-white text-black p-0 my-2 rounded-full tracking-wide font-semibold  shadow-sm cursor-pointer transition ease-in duration-500 mr-2" onclick="openEditModal({{$equipos[$i]->idEquipo}})">
                                Editar <i class="fa-solid fa-pen-to-square ml-2"></i>
                            </button>
                        </div>
                    </div>


                @endfor

                <!-- Modal de edición -->
                <div id="editModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 animate__animated animate__fadeIn">
                        <div class="bg-white p-4 rounded-lg">
                            <!-- Aquí puedes agregar los campos de edición -->
                            <h2>Editar información de equipos</h2>
                            <br>
                            <form enctype="multipart/form-data" action="/torneo/{{$torneo->idtorneo}}/equipos/actualizar" method="POST">
                                @csrf
                                <input type="hidden" id="idequipo" name="idequipo" value="">
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                        Nombre
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" type="text" required name="name">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="urllogo">
                                        URL del logo
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="urllogo" type="text" required name="urllogo">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="anioFundacion">
                                        Año de fundación
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="anioFundacion" type="number" required name="anioFundacion">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="pais">
                                        País
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="pais" type="text" required name="pais">
                                </div>
                                <div>
                                    <label class="block text-gray-700 text sm font-bold mb-2" for="idTorneo">
                                        Torneo
                                    </label>
                                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="idTorneo" required name="idTorneo">
                                        <!-- Primero el torneo actual del equipo-->
                                        <option value="{{$torneo->idtorneo}}">Torneo Actual: {{$torneo->nombre}} o...</option>
                                        @foreach ($torneos as $torneo)
                                        <option value="{{ $torneo->idtorneo }}">{{ $torneo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <button type="button" onclick="closeEditModal()" class="mt-4 px-3 py-2 bg-gray-300 rounded-lg">Cancelar</button>
                                <button type="submit" class="mt-4 px-3 py-2 bg-blue-500 text-white rounded-lg">Guardar</button>

                            </form>
                        </div>
                    </div>

                </div>
                <!-- End Content -->
                <!-- Se puede replicar este bloque para más equipos -->

                <!-- Botón para agregar nuevo equipo -->
            </main>
        </div>
    </div>

    <script>
                        function openEditModal(equipoId) {
                            //trae los datos de los equipos
                            var equipoS = <?php echo json_encode($equipos); ?>;

                            // Buscar el equipo en el arreglo
                            var equipo = equipoS.find(equipo => equipo.id == equipoId);

                            // Mostrar el modal de edición
                            document.getElementById('editModal').classList.remove('hidden');
                            // Aquí puedes realizar cualquier otra lógica necesaria, como cargar los datos del equipo en los campos de edición

                            document.getElementById('idequipo').value = equipo.id;
                            document.getElementById('name').value = equipo.nombre;
                            document.getElementById('urllogo').value = equipo.urllogo;
                            document.getElementById('anioFundacion').value = equipo.anioFundacion;
                            document.getElementById('pais').value = equipo.pais;
                            

                        }

                        function closeEditModal() {
                            // Ocultar el modal de edición
                            document.getElementById('editModal').classList.add('hidden');
                        }
                    </script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script>
        const setup = () => {
            return {
                loading: true,
                isSidebarOpen: false,
                toggleSidbarMenu() {
                    this.isSidebarOpen = !this.isSidebarOpen
                },
                isSettingsPanelOpen: false,
                isSearchBoxOpen: false,
            }
        }
    </script>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
