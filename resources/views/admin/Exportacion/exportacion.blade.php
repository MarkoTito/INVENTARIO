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
    <form id="miFormulario" action="/guardar" method="POST">
        <label for="fecha">Fecha de adquisición:</label>
        <input type="date" id="fecha" name="fecha">
        <br>
        <button type="submit">Enviar</button>
    </form>

    <script>
    document.getElementById('miFormulario').addEventListener('submit', function(e) {
        const fecha = document.getElementById('fecha').value;
        if (!fecha) {
            e.preventDefault(); // evita que se envíe
            alert("Debes seleccionar una fecha antes de enviar.");
        }
    });
    </script>



    
</x-admin-layout>