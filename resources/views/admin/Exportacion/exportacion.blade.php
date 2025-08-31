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

    <input id="campo" type="text" class="border border-gray-300 p-2 rounded-lg">

        <script>
        const input = document.getElementById('campo');

        input.addEventListener('input', () => {
        if (input.value.trim() === '') {
            input.classList.add('border-red-500', 'bg-red-100');
            input.classList.remove('border-green-500', 'bg-green-100');
        } else {
            input.classList.add('border-green-500', 'bg-green-100');
            input.classList.remove('border-red-500', 'bg-red-100');
        }
        });
        </script>


    
</x-admin-layout>