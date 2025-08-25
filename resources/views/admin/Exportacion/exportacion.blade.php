{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Exportacion"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
    [
        'name'=> 'Prueba',
    ]
    ]"> 

   <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="area-tab" data-tabs-target="#area" type="button" role="tab" aria-controls="area" aria-selected="true">
            Área
            </button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="hardware-tab" data-tabs-target="#hardware" type="button" role="tab" aria-controls="hardware" aria-selected="false">
            Tipo de Hardware
            </button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="sistema-tab" data-tabs-target="#sistema" type="button" role="tab" aria-controls="sistema" aria-selected="false">
            Tipo de Sistema
            </button>
        </li>
        
    </ul>

    <div id="myTabContent">
        {{-- area --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="area" role="tabpanel" aria-labelledby="area-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">Formulario de Área</p>
            <form class="max-w-sm mx-auto" action="{{route('adminarea.store')}}" method="POST" >
                @csrf
                
                <div class="grid gap-6 mb-4 md:grid-cols-2">
                    <div>
                        {{-- <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresar Area:</label> --}}
                        <input name="UK_Nombre_area" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa el nombre del Area" required />
                        @error('UK_Nombre_area')
                            <p class="text-red-600">*{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Agregar <i class="fa-solid fa-plus"></i></button>
                    </div>


                </div>

            </form>
            <p class="text-sm text-gray-500 dark:text-gray-400">Áreas</p>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Numero
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Área
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($areas as $area)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$area->PK_area}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$area->UK_Nombre_area}}
                                </td>
                                @if ($area->Nestado_area==1)
                                    <td class="px-6 py-4">
                                        Activo
                                    </td>
                                @else
                                    <td class="px-6 py-4">
                                        No activo
                                    </td>
                                @endif
                                
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            {{$areas->links()}}







        </div>
        {{-- tipo --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="hardware" role="tabpanel" aria-labelledby="hardware-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">Formulario de tipo de hardware</p>
            <form class="max-w-sm mx-auto" action="{{route('admintipos.store')}}" method="POST" >   
                @csrf
                <div class="grid gap-6 mb-4 md:grid-cols-2">
                    <div class="mb-5">
                        {{-- <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresar Nombre:</label> --}}
                        <input name="Tdescriocion_tipo" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa el nombre del bien" required />
                    </div>
                    <div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Agregar <i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
            </form>
            <p class="text-sm text-gray-500 dark:text-gray-400">Tipos de hardwares</p>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Numero
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipo de Hardware
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipos as $tipo)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$tipo->PK_tipo}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$tipo->Tdescriocion_tipo}}
                                </td>
                                @if ($tipo->Nestado_tipo==1)
                                    <td class="px-6 py-4">
                                        Activo
                                    </td>
                                @else
                                    <td class="px-6 py-4">
                                        No activo
                                    </td>
                                @endif
                                
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            {{-- {{$tipos->links()}} --}}




        </div>


        
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="sistema" role="tabpanel" aria-labelledby="sistema-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">Formulario de tipo de sistema</p>
            <form class="max-w-sm mx-auto" action="{{route('adminsistemas.store')}}" method="POST" >
                @csrf
                <div class="grid gap-6 mb-4 md:grid-cols-2">
                    <div class="mb-5">
                        {{-- <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresar Nombre:</label> --}}
                        <input name="Tdescripcion_sistema" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa el nombre del Sistema" required />    
                    </div>
                    <div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Agregar <i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
            </form>




            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Numero
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipo de Sistema
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sistemas as $sistema)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$sistema->PK_sistema}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$sistema->Tdescripcion_sistema}}
                                </td>
                                @if ($sistema->Testado_sistema==1)
                                    <td class="px-6 py-4">
                                        Activo
                                    </td>
                                @else
                                    <td class="px-6 py-4">
                                        No activo
                                    </td>
                                @endif
                                
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            {{-- {{$tipos->links()}} --}}




        </div>
    </div>
    
</x-admin-layout>