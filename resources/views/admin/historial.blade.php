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
        'name'=> 'Buscar',
        'href' => route('adminbien.index')
    ],
    [
        'name'=> 'Hitorial',
    ]
    ]">
        <div class="relative overflow-x-auto">
        <h2>Historial:</h2>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Usuario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Comentario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($comentarios->isEmpty())
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            No hay comentarios
                        </th>
                    </tr>
                
                @else
                    @foreach ($comentarios as $coment)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                {{$coment->usuario->name}}
                            </th>
                                
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                {{$coment->Tdescripcion_comentario}}
                            </th>
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                {{$coment->Testado_fisico_comentario}}
                            </td>
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                {{$coment->created_at}}
                            </td>
                        </tr>
                    @endforeach
                @endif

                  
                
            </tbody>
        </table>
    </div> 
{{--  que?
    @push('js')
        <script>
        
            forms = document.querySelectorAll('.delete-form')
            
            forms.forEach(form => {
               
                form.addEventListener('submit',function(e){ 
                    //previne el evento 
                    e.preventDefault('');
                        Swal.fire({
                            title: "Bajar este Bien?",
                            text: "No podras revertir esto!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, Bajar bien",
                            cancelButtonText: "No cancelar"
                            }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });    
                });
            });
        </script>
                                    
    @endpush       --}}






    
</x-admin-layout>