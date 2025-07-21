{{-- @php
   $links=[
      [
         'name' => 'menu',
         'href'=>route('admin.menu'),
         // verifica si estamos en la ruta admin.menu y devuelve False o true
         'active' =>request()->routesIs('admin.menu'), 
         ]
         
   ];
@endphp --}}


<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         <li>
            {{-- para ingresar producto --}}

            <a href="/admin/create" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               {{-- el comando dentro del span lo pone en el centro de las dimenciones
                  que le dimos osea entre 6 y 6
               --}}
               <span class="w-6 h-6 inline-flex justify-center items-center">
                     <i class="fa-solid fa-arrow-right"></i>
               </span>
               <span class="ms-3">Registrar</span>
            </a>
         </li>
         <li>
            {{-- para buscar producto --}}

            <a href="/admin/index" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               {{-- el comando dentro del span lo pone en el centro de las dimenciones
                  que le dimos osea entre 6 y 6
               --}}
               <span class="w-6 h-6 inline-flex justify-center items-center">
                     <i class="fa-solid fa-magnifying-glass"></i>
               </span>
               <span class="ms-3">Buscar</span>
            </a>
         </li>
         <li>
            {{-- para  reparar --}}

            <a href="/admin/buscar/reparar" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               {{-- el comando dentro del span lo pone en el centro de las dimenciones
                  que le dimos osea entre 6 y 6
               --}}
               <span class="w-6 h-6 inline-flex justify-center items-center">
                     <i class="fa-solid fa-wrench"></i>
               </span>
               <span class="ms-3">Reparar</span>
            </a>
         </li>
         <li>
            {{-- para entregar --}}

            <a href="/admin/entregar" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               {{-- el comando dentro del span lo pone en el centro de las dimenciones
                  que le dimos osea entre 6 y 6
               --}}
               <span class="w-6 h-6 inline-flex justify-center items-center">
                     <i class="fa-solid fa-truck"></i>
               </span>
               <span class="ms-3">Entrega</span>
            </a>
         </li>
      </ul>
   </div>
</aside>