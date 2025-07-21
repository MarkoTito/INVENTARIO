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

    
<form>
    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de Bien</label>
    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="1">Licencia</option>
        <option value="2">Monitor</option>
        <option value="3">CPU</option>
        <option value="4">Mouse</option>
        <option value="5">Proyector</option>
        <option value="6">Impresora</option>
        <option value="7">Otro</option>
    </select>
    <br>
    <div class="grid gap-6 mb-4 md:grid-cols-2">
        <div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Elige un area</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="1">Contabilidad</option>
                    <option value="2">educacion</option>
                    <option value="3">ODTI</option>
                    <option value="4">OCI</option>
                </select>
        </div>
        <div>
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Codigo unitario</label>
            <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese el codigo unitario de 12 digitos" required />
        </div>
        <div  >            
            <label for="message" class="block mb-1 text-sm font-medium text-gray-900 dark:text-black">Descripcion</label>
            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese una descripcion del bien"></textarea>
        </div>
        {{-- aca falta ver si preciona licencia aumentar algo mas, verificar el modal
         --}}
    </div>
    
   
    <button type="submit" class="text-black bg-blue-100 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-100 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>
</form>

    



    
</x-admin-layout>