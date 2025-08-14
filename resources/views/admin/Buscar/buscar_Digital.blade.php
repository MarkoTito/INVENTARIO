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

    <form method="POST" action="/admin/buscar/digital/store" >
        @csrf
         <div class="grid gap-6 mb-4 md:grid-cols-2">

            <div>
                {{-- tipo de sistema  --}}
                <label for="tipos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de Bien</label>
                      <select name="FK_Software_SistemaId" id="tipos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($sistemas as $sistema)
                      <option value="{{{$sistema->PK_sistema}}}">{{{$sistema->Tdescripcion_sistema}}}</option>
                  @endforeach
              </select>
            </div>
            <div>
                {{-- Determinacion --}}
                    <div>
                        <label for="areas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Elige un area</label>
                        <select name="determinacion" id="areas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="2">Indeterminado</option>
                            <option value="1">Determinado</option>
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
        <h3>Licencias</h3>
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
                        <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                            {{$digital->Tnombre_software}}
                        </th>
                        <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                            {{$digital->Thost_software}}
                        </th>
                        <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                            {{$digital->determinacion->Tdescripcion_determinacion}} 
                        </th>
                         <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                            {{$digital->Dfe_Inicio_software}}
                        </th>
                        <td class="px-6 py-4">
                            @php
                                $idCifrado = Crypt::encryptString($digital->PK_Software);
                            @endphp
                            <a href="{{url('/admin/buscar/digital/'.$idCifrado)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detalle</a>
                        
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
     
    
   <div class="flex justify-center mt-4">
        {{-- para la paginacion --}}
        {{ $digitales->links() }}
    </div>   
    

    

    
</x-admin-layout>