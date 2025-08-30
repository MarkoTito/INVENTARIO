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
    <label for="frutas">Elige una fruta:</label>
    <input list="lista-frutas" id="frutas" name="frutas">

    <datalist id="lista-frutas">
        <option value="Manzana">
        <option value="Mango">
        <option value="Mandarina">
        <option value="Melón">
        <option value="Sandía">
    </datalist>



    
</x-admin-layout>