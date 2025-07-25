{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Reprar"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
     [
        'name'=>'Buscar',
        'href' => '/',
    ],
    [
        'name'=> 'Detalle',
    ]
    ]">

    <div class="grid gap-6 mb-4 md:grid-cols-2">
            <div>
                @if ($bien->FK_B_Fisico_TipoId ==6)
                    <img class="rounded-full w-96 h-96" width="300px" src="https://static.vecteezy.com/system/resources/previews/012/618/939/original/printer-cartoon-illustration-vector.jpg" alt="image description">
            
                @endif
                @if ($bien->FK_B_Fisico_TipoId ==5)
                    <img src="https://m.media-amazon.com/images/I/41it4g4TcEL._UF894,1000_QL80_.jpg " height="350px" width="350px" alt="imagen de impresora">
                @endif
                @if ($bien->FK_B_Fisico_TipoId ==4)
                    <img src=" https://static.vecteezy.com/system/resources/previews/011/065/272/non_2x/wireless-computer-mouse-clipart-gray-computer-mouse-watercolor-style-illustration-isolated-on-white-background-simple-wireless-mouse-cartoon-hand-drawn-office-supplies-drawing-back-view-vector.jpg" height="350px" width="350px" alt="imagen de impresora">
                @endif
                @if ($bien->FK_B_Fisico_TipoId ==3)
                    <img src=" https://cdn-icons-png.flaticon.com/512/5921/5921714.png" height="350px" width="350px" alt="imagen de impresora">
                @endif
                @if ($bien->FK_B_Fisico_TipoId ==2)
                    <img src="https://img.freepik.com/vector-premium/monitor-computadora-estilo-dibujos-animados-aislado-sobre-fondo-blanco-ilustracion-stock-simbolo-computadora_258706-337.jpg" height="350px" width="350px" alt="imagen de impresora">
                @endif
                @if ($bien->FK_B_Fisico_TipoId ==1)
                    <img src="" height="350px" width="350px" alt="imagen de impresora">
                @endif    
            </div>
            <div>
                <div class="mt-4">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Área</label>
                    <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->area->UK_Nombre_Area}}" required />
                </div>
                <br>    
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Codigo:</label>
                    <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->UK_Codigo_Pratimonial}}" required />
                </div>
                <br>
                {{-- <div class="inline-flex rounded-md shadow-xs" role="group">
                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                        Editar
                    </button>
                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                        Dar de baja
                    </button>
                </div> --}}

                <div >
                    
                    <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-xl px-2 py-4 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        Dar de baja
                    </button>

                    <button type="button" class="w-[300px] text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-xl px-8 py-4 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                        Editar {{$bien->tipo->T_Descriocion}}
                    </button>                
                </div>
            </div>
    </div>    
    

    <div class="relative overflow-x-auto">
        <h3>Comentarios</h3>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Usuario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Comentario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                        ga
                    </th>
                        
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                        ga
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                        ga
                    </td>
                 </tr>
                    
                
            </tbody>
        </table>
    </div>

        






    
</x-admin-layout>