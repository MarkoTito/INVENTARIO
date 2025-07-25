{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Reprar"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
     [
        'name'=>'Buscar',
        'href' => '/',
    ],
    [
        'name'=> 'Detalle',
    ]
    ]">
    

    




    
</x-admin-layout>