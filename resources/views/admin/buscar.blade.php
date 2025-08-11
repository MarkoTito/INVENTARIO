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
    ]
    ]"> 

    <form method="POST" action="/admin/buscar/todo" >
        @csrf
         <div class="grid gap-6 mb-4 md:grid-cols-2">

            <div>
                {{-- tipo de bien --}}
                <label for="tipos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de Hardware</label>
                      <select name="FK_B_Fisico_TipoId" id="tipos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($tipos as $tipo)
                      <option value="{{{$tipo->PK_tipo}}}">{{{$tipo->Tdescriocion_tipo}}}</option>
                  @endforeach
              </select>
            </div>
            <div>
                {{-- area --}}
                    <div>
                        <label for="areas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Elige un area</label>
                        <select name="FK_B_Fisico_Area" id="areas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="table-hardware">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tipo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Codigo Patrimonial
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Activo/Inactivo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Area
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Accion
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bienes as $bien)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            {{$bien->tipo->Tdescriocion_tipo}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            {{$bien->UK_Codigo_Pratimonial}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            {{$bien->T_Estado}}
                        </th>
                         <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            {{$bien->area->UK_Nombre_area}}
                            
                        </th>
                        <td class="px-6 py-4">

                            <a href="/admin/buscar/{{$bien->PK_B_Fisico}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detalle</a>
                        
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-4">
        {{-- para la paginacion --}}
        {{ $bienes->links('pagination::tailwind') }}
    </div>   
    
    <!-- Previous Button -->
   
    

    

    
</x-admin-layout>