{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Buscar"
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
        'name'=> 'Bien',
        
    ]
    ]"> 

    <form method="POST" action="/admin/buscar/todo" >
        @csrf
        <div class="grid gap-6 mb-4 md:grid-cols-2">

            <div>
                {{-- tipo de bien --}}
                <label for="tipos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de Bien</label>
                      <select name="FK_Hardware_TipoId" id="tipos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($tipos as $tipo)
                        @if ($tipo->PK_tipo != 1)
                            <option value="{{{$tipo->PK_tipo}}}">{{{$tipo->Tdescriocion_tipo}}}</option>
                        @endif
                  @endforeach
              </select>
            </div>
            <div>
                {{-- area --}}
                    <div>
                        <label for="areas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Elige un area</label>
                        <select name="FK_Hardware_AreaId" id="areas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($areas as $area)
                                <option value="{{$area->PK_area}}">{{$area->UK_Nombre_area}}</option>
                            @endforeach
                        </select>
                    </div>
                    
            </div>

        </div>      
        <div class=" flex justify-center mt-4">
            <input id="default-radio-1" type="radio" value="1" name="estado" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Activo</label>
            <span class="text-white" >---</span>
            <input checked id="default-radio-2" type="radio" value="0" name="estado" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Inactivo</label>
        </div>  
        

        <div class="flex justify-center mt-4">
            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" type="submit">
            Buscar
            </button>            
        </div>    
    </form>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <h3>Bienes</h3>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tipo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Codigo Patrimonial
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Área
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Accion
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($bienes->isEmpty())
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                             No Exite Bien con esa relacion
                        </th>
                    </tr>
                @else
                    @foreach ($bienes as $bien)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
    
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                {{$bien->tipo->Tdescriocion_tipo}}
                            </th>
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                {{$bien->UK_Hardware_Codigo}}
                            </th>
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                {{$bien->estado->UK_Descripcion_estado}}
                            </th>
                             <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                {{$bien->area->UK_Nombre_area}}
                            </th>
                            <td class="px-6 py-4">
                                <a href="/admin/buscar/{{$bien->PK_Hardware}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detalle</a>                            
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-4">
            <a href="#" class="flex items-center justify-center px-4 h-10 me-3 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
            </svg>
            Anterior
        </a>
        <a href="#" class="flex items-center justify-center px-4 h-10 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            Siguiente
            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>         
    </div>   
    
    <!-- Previous Button -->
   
    

    

    
</x-admin-layout>