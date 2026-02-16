{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Historial de Prestamo"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
     [
        'name'=> 'Buscar',
        'href' => route('adminbien.index')
    ],
    [
        'name'=> 'Hitorial de prestamos',
    ]
    ]">
        <div class="relative overflow-x-auto">
        <h2>Historial:</h2>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Usuario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        N° de acta
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Areá
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Detalle
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($prestamos->isEmpty())
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            No hay prestamos
                        </th>
                    </tr>
                
                @else
                    @foreach ($prestamos as $presti)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                {{$presti->usuario->name}} 
                            </th>
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                {{$presti->Nnumero_prestamo}} 
                            </th>
                            
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                {{$presti->area->UK_Nombre_area}}
                            </th>
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                {{$presti->Testado_Hardware_prestamo}}
                            </td>
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                {{$presti->created_at}}
                            </td>
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-blue-600">
                                <a href="/admin/Prestamo/{{$presti->PK_Prestamos}}/edit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif

                  
                
            </tbody>
        </table>
    </div> 







    
</x-admin-layout>