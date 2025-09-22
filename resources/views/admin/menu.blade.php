{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout >
{{-- title="Menu"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => route('dashboard'),
    ],
    [
        'name'=> 'Prueba',
    ]
    ]"> --}}

    <div class="flex justify-center mt-4" >
        <img src="{{ asset('images/menu.png') }}" height="1500" width="1250" alt="Logo">
    </div>



    
</x-admin-layout>