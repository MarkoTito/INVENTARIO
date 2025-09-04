{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Movimientos"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
    [
        'name'=> 'Movimientos',
    ]
    ]"> 

    

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3" align="center" >
                    Tema  
                </th>
                <th scope="col" class="px-6 py-3 text-teal-950 " align="center" >
                    Codigo/ Sistema
                </th>
                <th scope="col" class="px-6 py-3" align="center" >
                    Usuario
                </th>
                <th scope="col" class="px-6 py-3" align="center" >
                    Fecha
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modificaciones as $modificacion)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">

                    @if ($modificacion->Tdescripcion_modificaciones == "1")

                        <th scope="row" class="px-6 py-4 font-medium text-orange-500 whitespace-nowrap dark:text-white" align="center">
                            Creación
                        </th>                        
                    @endif
                    @if ($modificacion->Tdescripcion_modificaciones == "2")

                        <th scope="row" class="px-6 py-4 font-medium text-green-400 whitespace-nowrap dark:text-white" align="center">
                            Edición 
                        </th>                        
                    @endif
                    @if ($modificacion->Tdescripcion_modificaciones == "3")

                        <th scope="row" class="px-6 py-4 font-medium text-red-600  whitespace-nowrap dark:text-white" align="center">
                            Baja
                        </th>                        
                    @endif
                    @if ($modificacion->Tdescripcion_modificaciones == "4")

                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap dark:text-white text-blue-600" align="center" >
                            Activacion
                        </th>                        
                    @endif
                    @if ($modificacion->Tdescripcion_modificaciones == "5")

                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap dark:text-white" align="center">
                            Reparacion
                        </th>                        
                    @endif

                    
                    @if (is_null($modificacion->FK_Modificaciones_HardwareId))
                        <td class="px-6 py-4 text-teal-950 " align="center" >
                            {{$modificacion->digital->Tnombre_software}}
                        </td> 
                        
                    @else
                        <td class="px-6 py-4 text-teal-950 " align="center" >
                            {{$modificacion->bien->UK_Hardware_Codigo}}
                        </td>         
                    @endif
            

                    <td class="px-6 py-4" align="center" >
                        {{$modificacion->usuario->name}}
                    </td>
                    <td class="px-6 py-4" align="center" >
                        {{$modificacion->created_at}}
                    </td>
                </tr>
                
            @endforeach

            
        </tbody>
    </table>
</div>
{{ $modificaciones->links()}}


    
</x-admin-layout>