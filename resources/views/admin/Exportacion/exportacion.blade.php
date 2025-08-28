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
    
    <textarea id="miTextarea" rows="4" cols="50" maxlength="200"></textarea>
    <p>Letras restantes: <span id="contador">200</span></p>

    <script>
        const textarea = document.getElementById("miTextarea");
        const contador = document.getElementById("contador");
        const limite = 200; // máximo de letras/caracteres permitidos

        textarea.addEventListener("input", () => {
            let restantes = limite - textarea.value.length;

            if (restantes < 0) {
                textarea.value = textarea.value.substring(0, limite); // corta el texto
                restantes = 0;
            }

            contador.textContent = restantes;
        });
    </script>



    
</x-admin-layout>