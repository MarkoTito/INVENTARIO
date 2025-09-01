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

    <!-- Select -->
<select id="miSelect" style="width: 200px;">
  <option value="">---Selecciona una marca---</option>
  <option value="1">HP</option>
  <option value="2">Dell</option>
  <option value="3">Lenovo</option>
  <option value="4">Epson</option>
  <option value="5">Asus</option>
</select>

<!-- Input -->
<input type="text" id="miInput" placeholder="Aquí aparecerá el valor">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    // Activa select2 con búsqueda
    $('#miSelect').select2({
        placeholder: "---Selecciona una marca---",
        allowClear: true
    });

    // Detecta cambio
    $('#miSelect').on("change", function () {
        const value = $(this).val();
        const input = document.getElementById("miInput");

        if (value === "2") { 
            input.value = "Código-PC-001"; // asigna valor si escogió Asus
            input.disabled = true;
        } else {
            input.value = "";
            input.disabled = false;
        }
    });
});
</script>




    
</x-admin-layout>