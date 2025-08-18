<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
        <li>
            {{-- para ingresar producto --}}
            {{-- Sub titulo q divide el fisico con el digital - uppercase es mayuscula--}}
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                  <span class="w-6 h-6 inline-flex justify-center items-center">
                     <i class="fa-solid fa-arrow-right"></i>
                  </span>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Registrar</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                  @can('create-hardware')
                     <li>
                        <a href="{{route('adminbien.create')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Hardware</a>
                     </li>    
                  @endcan

                  @can('create-software',)
                     <li>
                        <a href="{{route('admindigital.create')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Licencia</a>
                     </li>
                  @endcan
                 
            </ul>
         </li>
         <li>
            {{-- para buscar producto --}}
            

            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-buscar" data-collapse-toggle="dropdown-buscar">
                  <span class="w-6 h-6 inline-flex justify-center items-center">
                     <i class="fa-solid fa-magnifying-glass"></i>
                   </span>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Buscar</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>

            <ul id="dropdown-buscar" class="hidden py-2 space-y-2">
                  @can('read-hardware')
                     <li>
                        <a href="{{route('adminbien.index')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Hardware</a>
                     </li>
                  @endcan

                  @can('read-software')
                     <li>
                        <a href="{{route('admindigital.index')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Licencia</a>
                     </li>
                  @endcan
                 
            </ul>
         </li>
         
         @can('create-comentario')
            <li>
               {{-- para  reparar --}}

               <a href="{{route('admincomentario.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  {{-- el comando dentro del span lo pone en el centro de las dimenciones
                     que le dimos osea entre 6 y 6
                  --}}
                  <span class="w-6 h-6 inline-flex justify-center items-center">
                        <i class="fa-solid fa-wrench"></i>
                  </span>
                  <span class="ms-3">Reparar</span>
               </a>
            </li>
         @endcan
         
         <li>
            {{-- exportar bienes --}}
            <a href="/admin/exportar" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               {{-- el comando dentro del span lo pone en el centro de las dimenciones
                  que le dimos osea entre 6 y 6 --}}
              
               <span class="w-6 h-6 inline-flex justify-center items-center">
                  <i class="fa-solid fa-arrow-up-from-bracket"></i>
               </span>
               <span class="ms-3">Exportar</span>
            </a>
         </li>
         @can('create-agregar')
            <li>
               {{-- ingresar mas --}}
               <a href="/admin/Agregar" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  {{-- el comando dentro del span lo pone en el centro de las dimenciones
                     que le dimos osea entre 6 y 6 --}}
               
                  <span class="w-6 h-6 inline-flex justify-center items-center">
                     <i class="fa-solid fa-plus"></i>
                  </span>
                  <span class="ms-3">Agregar</span>
               </a>
            </li>
         @endcan
         
         
      </ul>
   </div>
</aside>