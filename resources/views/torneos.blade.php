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
</head>
<body>
<div>
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
          <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg bg-white">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">Total Torneos</span>
                    <span class="text-lg font-semibold">2</span>
                  </div>
                  <div class="p-3 bg-gray-200 rounded-md"><img class="w-[54px]" src="/img/4048969.png" alt=""></div>
                </div>
                <div>
                  <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">50%</span>
                  <span>Activos</span>
                </div>
              </div>
              <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg bg-white">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">Total Equipos</span>
                    <span class="text-lg font-semibold">10</span>
                  </div>
                  <div class="p-3 bg-gray-200 rounded-md"><img class="w-[54px]" src="/img/5042057.png" alt=""></div>
                </div>
                <div>
                  <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">100%</span>
                  <span>Activos</span>
                </div>
              </div>
              <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg bg-white">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">Total Jugadores</span>
                    <span class="text-lg font-semibold">221</span>
                  </div>
                  <div class="p-3 bg-gray-200 rounded-md"><img class="w-[54px]" src="/img/soccer_player_icon_125840.png" alt=""></div>
                </div>
                <div>
                  <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">100%</span>
                  <span>Activos</span>
                </div>
              </div>
              <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg bg-white">
                <div class="flex items-start justify-between">
                  <div class="flex flex-col space-y-2">
                    <span class="text-gray-400">Total Espectadores</span>
                    <span class="text-lg font-semibold">112</span>
                  </div>
                  <div class="p-3 bg-gray-200 rounded-md"><img class="w-[54px]" src="/img/Z4s6P0e821iv72hdGG.png" alt=""></div>
                </div>
                <div>
                  <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">5</span>
                  <span>En linea</span>
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
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Popularidad
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 w-10 h-10">
                                <img
                                  class="w-10 h-10 rounded-full"
                                  src="https://api.dicebear.com/7.x/bottts/svg?seed=Garfield"
                                  alt=""
                                />
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Torneo 1</div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Regional</div>
                            <div class="text-sm text-gray-500">info</div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                            >
                              Activo
                            </span>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">100</td>
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <a href="/torneo/1" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                          </td>
                        </tr>
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 w-10 h-10">
                                <img
                                  class="w-10 h-10 rounded-full"
                                  src="https://api.dicebear.com/7.x/bottts/svg?seed=Lilly"
                                  alt=""
                                />
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Torneo 2</div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Titulo 2</div>
                            <div class="text-sm text-gray-500">info</div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-red-100 rounded-full"
                            >
                              Inactivo
                            </span>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">12</td>
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <a href="/torneo/1" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                          </td>
                        </tr>
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