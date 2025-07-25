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
                    <h1>Impresora</h1>
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
                <br>
                <div class="mt-4">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Área</label>
                    <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->area->UK_Nombre_Area}}" required />
                </div>
                <br>    
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Codigo:</label>
                    <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->UK_Codigo_Pratimonial}}" required />
                </div>
            </div>

        </div>        






    
</x-admin-layout>