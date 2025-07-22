{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Registrar"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
    [
        'name'=> 'Registrar',
    ]
    ]">
    
    @if ($errors->any())
        <div>
            <h2>Errores</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                    
                @endforeach
            </ul>
        </div>    
    @endif

        
    <form method="POST" action="{{route('adminbien.store')}}">
        @csrf

        <label for="tipos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de Bien</label>
        <select name="tipo" id="tipos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($tipos as $tipo)
                    <option value="{{{$tipo->id}}}">{{{$tipo->descripcion}}}</option>
            @endforeach
        </select>
        <br>
        <div class="grid gap-6 mb-4 md:grid-cols-2">
            <div>
                    <label for="areas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Elige un area</label>
                    <select name="area" id="areas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($areas as $area)
                            <option value="{{$area->id}}">{{$area->nombre}}</option>
                        @endforeach
                    </select>
            </div>
            <div>
                <label for="codigo_patrimonial" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Codigo unitario</label>
                <input name="codigo" type="text" id="codigo_patrimonial" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese el codigo unitario de 12 digitos" required />
            </div>
            <div  >            
                <label  for="message" class="block mb-1 text-sm font-medium text-gray-900 dark:text-black">Descripcion</label>
                <textarea name="descripcion" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese una descripcion del bien"></textarea>
            </div>
            {{-- aca falta ver si preciona licencia aumentar algo mas, verificar el modal
            --}}
        </div>
        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">
            INGRESAR
        </button>

        

    </form>

        



    
</x-admin-layout>