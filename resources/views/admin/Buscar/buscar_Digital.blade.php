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
        'name'=> 'Buscar Software',
    ]
    ]"> 

    <form method="POST" action="/admin/buscar/baja/store" >
        @csrf
         <div class="grid gap-6 mb-4 md:grid-cols-2">

            <div>
                {{-- tipo de sistema  --}}
                <label for="tipos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de Bien</label>
                      <select name="FK_B_Fisico_TipoId" id="tipos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($sistemas as $sistema)
                      <option value="{{{$sistema->PK_Sistema}}}">{{{$sistema->T_Descripcion_Sis}}}</option>
                  @endforeach
              </select>
            </div>
            <div>
                {{-- Determinacion --}}
                    <div>
                        <label for="areas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Elige un area</label>
                        <select name="FK_B_Fisico_Area" id="areas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="Indeterminado">Indeterminado</option>
                            <option value="Determinado">Determinado</option>
                        </select>
                    </div>
                    
            </div>

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
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Host
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Determinacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de Inicio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Accion
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($digitales as $digital)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            {{$digital->T_Nombre_Digital}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            {{$digital->T_Host}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            {{$digital->T_Determinacion}}
                        </th>
                         <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            {{$digital->D_F_Inicio}}
                        </th>
                        <td class="px-6 py-4">

                            <a href="/admin/buscar/digital/{{$digital->PK_B_Digital}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detalle</a>
                        
                        </td>
                    </tr>
                    
                @endforeach
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