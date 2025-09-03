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
        'name'=> 'Buscar',
        'href' => route('adminbien.index')
    ],
    [
        'name'=> 'Hitorial de bajas',
    ]
    ]">
        <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Usuario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Motivo de baja
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de baja
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Motivo de activar bien
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @if ($bajas->isEmpty())
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            No hay historial
                        </th>
                    </tr>
                
                @else
                    @foreach ($bajas as $bajas)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                {{$bajas->usuarioBaja->name}}
                            </th>
                                
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                {{$bajas->Tdescripcion_baja}}
                            </th>
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                {{$bajas->created_at}}
                            </td>
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                {{$bajas->Tdescripcion_null_baja}}
                            </td>
                        </tr>
                    @endforeach
                @endif

                  
                
            </tbody>
        </table>
    </div> 







    
</x-admin-layout>