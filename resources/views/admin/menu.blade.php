{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Menu"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => route('dashboard'),
    ],
    [
        'name'=> 'Prueba',
    ]
    ]">
    hola desde el admin
    menu inicial



    
</x-admin-layout>