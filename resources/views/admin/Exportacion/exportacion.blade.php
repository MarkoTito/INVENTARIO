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

    <div class="p-4">
    <!-- Campo de búsqueda -->
    <input id="searchInput" 
           type="text" 
           placeholder="Buscar..." 
           class="border rounded-lg p-2 mb-4 w-full">

    <!-- Tabla -->
    <table class="min-w-full text-sm text-left text-gray-500">
        <thead class="bg-gray-200 text-gray-700 uppercase">
            <tr>
                <th class="px-6 py-3">Nombre</th>
                <th class="px-6 py-3">Correo</th>
                <th class="px-6 py-3">Edad</th>
            </tr>
        </thead>
        <tbody id="dataTable">
            <tr class="bg-white border-b">
                <td class="px-6 py-4">Juan Pérez</td>
                <td class="px-6 py-4">juan@example.com</td>
                <td class="px-6 py-4">28</td>
            </tr>
            <tr class="bg-white border-b">
                <td class="px-6 py-4">María Gómez</td>
                <td class="px-6 py-4">maria@example.com</td>
                <td class="px-6 py-4">34</td>
            </tr>
            <tr class="bg-white border-b">
                <td class="px-6 py-4">Pedro López</td>
                <td class="px-6 py-4">pedro@example.com</td>
                <td class="px-6 py-4">22</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    document.getElementById("searchInput").addEventListener("keyup", function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#dataTable tr");

        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>




    
</x-admin-layout>