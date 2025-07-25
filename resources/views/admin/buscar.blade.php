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
                <label for="tipos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de Bien</label>
                      <select name="FK_B_Fisico_TipoId" id="tipos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($tipos as $tipo)
                      <option value="{{{$tipo->PK_Tipo}}}">{{{$tipo->T_Descriocion}}}</option>
                  @endforeach
              </select>
            </div>
            <div>
                {{-- area --}}
                    <div>
                        <label for="areas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Elige un area</label>
                        <select name="FK_B_Fisico_Area" id="areas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($areas as $area)
                                <option value="{{$area->PK_Area}}">{{$area->UK_Nombre_Area}}</option>
                            @endforeach
                        </select>
                    </div>
                    
            </div>

        </div>   

        {{-- <div class="grid gap-6 mb-4 md:grid-cols-2 mt-4 ">

            <div>
               codigo patrimonial 
               <label for="codigo_patrimonial" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Codigo Patrimonial</label>
               <input name="UK_Codigo_Pratimonial" type="text" id="codigo_patrimonial" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese el codigo unitario de 12 digitos" required value="{{old('UK_Codigo_Pratimonial')}}"/>
               @error('UK_Codigo_Pratimonial')
                       <p class="text-red-600">*{{$message}}</p>
               @enderror
            </div>
        </div>     --}}

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
                            {{$bien->tipo->T_Descriocion}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            {{$bien->UK_Codigo_Pratimonial}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            {{$bien->T_Estado}}
                        </th>
                         <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            {{$bien->area->UK_Nombre_Area}}
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
            <a href="#" class="flex items-center justify-center px-4 h-10 me-3 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
            </svg>
            AnteriorB_
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