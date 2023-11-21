<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://kit.fontawesome.com/1e8824e8c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>
<div>

	<div style="z-index: 9999;" class='fixed bg-white flex
  @if ($response != "null")
    hidden
  @endif
  justify-center items-center w-full h-full'
  x-show="open" x-data="{ open: true }" x-transition:enter="ease-out duration-300"
				x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
				x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
				x-transition:leave="ease-in duration-200"
				x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
				x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
				x-description="Modal panel, show/hide based on modal state."
  >
  <div class=" animate__animated animate__backInDown">
		<div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

			<div 
				class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
				@click.away="open = false">
				<div class="p-4 sm:p-10 text-center overflow-y-auto">
					<!-- Icon -->
					<span class="mb-4 inline-flex justify-center items-center w-[62px] h-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                    </svg>
                    </span>
					<!-- End Icon -->

					<h3 class="mb-2 text-2xl font-bold text-gray-800">
						Error!
					</h3>
					<p class="text-gray-500">
						Error al conectar con el servidor http://localhost:8080/ 
					</p>

					<div class="mt-6 flex justify-center gap-x-4">
						<a class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-green-500 text-white shadow-sm align-middle hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm"
							href="/torneos">
							Reintentar
						</a>
						<button @click="open = false" type="button" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-white text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                                      Cerrar
                        </button>
					</div>
				</div>
			</div>

		</div>
  </div>
</div>
    <div class="flex h-screen overflow-y-hidden " x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
      <!-- Loading screen -->
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
            <h1 class="text-2xl font-semibold whitespace-nowrap">Resumen</h1>
            
          </div>

          <!-- Start Content -->
          <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-3">
            <div class="p-4 animate__animated animate__bounceIn transition-shadow border rounded-lg shadow-sm hover:shadow-lg bg-white">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">Total Torneos</span>
                    <span class="text-lg font-semibold">{{count($torneos)}}</span>
                  </div>
                  <div class="p-3 bg-gray-200 rounded-md"><img class="w-[54px]" src="/img/4048969.png" alt=""></div>
                </div>
              </div>
              <div class="p-4 animate__animated animate__bounceIn transition-shadow border rounded-lg shadow-sm hover:shadow-lg bg-white">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">Total Equipos</span>
                    <span class="text-lg font-semibold">10</span>
                  </div>
                  <div class="p-3 bg-gray-200 rounded-md"><img class="w-[54px]" src="/img/5042057.png" alt=""></div>
                </div>
              </div>
              <div class="p-4 animate__animated animate__bounceIn transition-shadow border rounded-lg shadow-sm hover:shadow-lg bg-white">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">Total Jugadores</span>
                    <span class="text-lg font-semibold">221</span>
                  </div>
                  <div class="p-3 bg-gray-200 rounded-md"><img class="w-[54px]" src="/img/soccer_player_icon_125840.png" alt=""></div>
                </div>
              </div>
             
          </div>

         <div class="flex flex-row justify-between items-center mt-6">
            <h3 class=" text-xl">Torneos</h3>
           <a href="/torneos/nuevo"> <button
  class="middle none center mr-4 rounded-lg bg-green-500 py-2 px-4 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
  data-ripple-light="true"
>
Crear nuevo torneo <i class="fa-solid fa-plus"></i>
</button></a>
         </div>
          <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                  <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Nombre
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Titulo
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Estado
                        </th>
                       
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @for($i = count($torneos)-1; $i >= 0 ; $i--)
                          
                            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                  <div class="flex-shrink-0 w-10 h-10">
                                    <img
                                      class="w-10 h-10 rounded-full"
                                      src="/client/{{$torneos[$i]->logo}}"
                                      alt=""
                                    />
                                  </div>
                                  <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{$torneos[$i]->nombre}}</div>
                                  </div>
                                </div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$torneos[$i]->titulo}}</div>
                                <div class="text-sm text-gray-500">{{$torneos[$i]->informacion}}</div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                              @if($torneos[$i]->estado == 1)
                                <span
                                  class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                                >
                                  Activo
                                </span>
                              @else
                              <span
                                  class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full"
                                >
                                  Inactivo
                                </span>
                              @endif
                              </td>
                              <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <a href="/torneo/{{$torneos[$i]->id}}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                              </td>
                            </tr>
                            
                          @endfor
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>

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