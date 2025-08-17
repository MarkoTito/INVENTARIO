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
        'name'=> 'Exportar',
    ]
    ]"> 

    <div class="grid gap-6 mb-4 md:grid-cols-3">
        <div>
        </div>
        <div>
            
        </div>
        <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
            <input checked name="pedido" id="remember" type="checkbox" value="1" class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
            </div>
            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Fecha de Adquisicion</label>
        </div>
    </div>

    <div id="conFecha" >
        <form method="POST" action="/admin/exportacion/encontrado" >
            @csrf
            <input type="text" name="form" value="1" class="hidden">

            <div class="grid gap-6 mb-4 md:grid-cols-3">
                <div>
                    {{-- tipo de bien --}}
                    <label for="tipos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de Hardware:</label>
                    <select name="tipo" id="tipos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        <label for="areas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Area:</label>
                        <select name="area" id="areas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($areas as $area)
                                <option value="{{$area->PK_area}}">{{$area->UK_Nombre_area}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <div>
                        {{-- Año de adquisicion --}}
                        <label for="tipos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Año de Adquisicion:</label>
                        <select name="adquisicion" id="tipos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                        </select>
                    </div>
                </div>   
                <div class=" flex justify-center mt-4">
                    <input checked id="default-radio-1" type="radio" value="1" name="estado" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Activo</label>
                    <span class="text-white" >---</span>
                    <input  id="default-radio-2" type="radio" value="0" name="estado" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Inactivo</label>
                </div>
                <div class="flex justify-center mt-4">
                     <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" type="submit">
                    Buscar
                    </button>            
                </div>    
        </form>
    </div>
    <div id="sinFecha" style="display: none;">
        <form method="POST" action="/admin/exportacion/encontrado" >
            @csrf
            <input type="text" name="form" value="2" class="hidden">            
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div>
                    {{-- tipo de bien --}}
                    <label for="tipos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de Hardware:</label>
                    <select name="tipo" id="tipos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        <label for="areas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Area:</label>
                        <select name="area" id="areas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($areas as $area)
                                <option value="{{$area->PK_area}}">{{$area->UK_Nombre_area}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
                <div class=" flex justify-center mt-4">
                    <input checked id="default-radio-1" type="radio" value="1" name="estado" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Activo</label>
                    <span class="text-white" >---</span>
                    <input  id="default-radio-2" type="radio" value="0" name="estado" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Inactivo</label>
                </div>
                <div class="flex justify-center mt-4">
                     <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" type="submit">
                    Buscar
                    </button>            
                </div>    
        </form>
    </div>

    @push('js')
        <script>
            document.querySelectorAll('input[name="pedido"]').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                // ocultar todos los inputs
                // document.getElementById('conFecha').style.display = 'none';
                // document.getElementById('sinFecha').style.display = 'none';
                

                // mostrar solo el correspondiente
                if (this.checked) {
                    document.getElementById('conFecha').style.display = 'block';
                    document.getElementById('sinFecha').style.display = 'none';
                } 
                else{
                    document.getElementById('sinFecha').style.display = 'block';
                    document.getElementById('conFecha').style.display = 'none';
                }
                });
            });
        </script>
        
    @endpush
    

    
</x-admin-layout>