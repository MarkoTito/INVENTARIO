{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Activar"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
    [
        'name'=> 'prueba',
    ]
    ]">


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">n</th>
                    <th scope="col" class="px-6 py-3 text-center">name</th>
                    <th scope="col" class="px-6 py-3 text-center">esta</th>
                </tr>
            </thead>
            <tbody id="bienes-lista">
                @include('admin.partials.areas-rows', ['areas' => $areas])
            </tbody>
        </table>
    </div>

    @if($areas->count() < $total)
        <div class="text-center mt-4">
            <button id="loadMore" 
                    data-limit="{{ $limit }}" 
                    data-total="{{ $total }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                Mostrar más
            </button>
        </div>
    @endif


    @push('js')
        <script>
        document.addEventListener("DOMContentLoaded", () => {
            const button = document.getElementById("loadMore");
            if (!button) return;

            let limit = parseInt(button.dataset.limit);
            const total = parseInt(button.dataset.total);

            button.addEventListener("click", () => {
                limit += 5;

                fetch("?limit=" + limit, {
                    headers: { "X-Requested-With": "XMLHttpRequest" }
                })
                .then(res => res.text())
                .then(data => {
                    // Añadir nuevas filas (append)
                    document.getElementById("bienes-lista").innerHTML = data;

                    // Ocultar botón si ya no hay más
                    if (limit >= total) {
                        button.style.display = "none";
                    }

                    button.dataset.limit = limit;
                });
            });
        });
        </script>
    @endpush


    

{{-- <div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    n
                </th>
                <th scope="col" class="px-6 py-3">
                    nombre 
                </th>
                <th scope="col" class="px-6 py-3">
                    estado
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($areas as $area)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$area->PK_area}}
                    </th>
                    <td class="px-6 py-4">
                        {{$area->UK_Nombre_area}}
                    </td>
                    <td class="px-6 py-4">
                        {{$area->Nestado_area}}
                    </td>
            
                </tr>
                
            @endforeach


            
        </tbody>
    </table>
</div> --}}

{{-- {{ $areas->links() }} --}}

    

   

        
</x-admin-layout>