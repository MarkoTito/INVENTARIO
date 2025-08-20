{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Buscar"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
    [
        'name'=> 'Exportar',
    ]
    ]"> 

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <h3>Bienes</h3>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tipo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Codigo Patrimonial
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Área
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Año de Adquisicion
                    </th>
                    @if ($request->estado == "0")
                        <th scope="col" class="px-6 py-3">
                            Año de Baja
                        </th>
                    @endif
                    
                </tr>
            </thead>
            <tbody>
                @if ($bienes->isEmpty())
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                             No Exite Bien con esa relacion
                        </th>
                        <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                             -
                        </th>
                        <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                             -
                        </th>
                        <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                             -
                        </th>
                        <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                             -
                        </th>
                    </tr>
                @else
                    @foreach ($bienes as $bien)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
    
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                {{$bien->tipo->Tdescriocion_tipo}}
                            </th>
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                {{$bien->UK_Hardware_Codigo}}
                            </th>
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                {{$bien->estado->UK_Descripcion_estado}}
                            </th>
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                {{$bien->area->UK_Nombre_area}}
                            </th>
                            <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                {{$bien->Dadquisicion_hardware}}
                            </th>
                            @if ($request->estado == "0")
                                <th class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                    {{$bien->Dbaja_hardware}}
                                </th>
                                
                            @endif
                            
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <br>
    {{-- botosnes --}}
    <div class="grid gap-6 md:grid-cols-3">
        <div class="grid gap-6  md:grid-cols-3">
            <div>
                <a href="{{route('adminexport.excell',$request)}}">
                    <button  type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <i class="fa-solid fa-file-excel"></i> Excell
                    </button>
                </a>
            </div>
            <div>
                <a href="{{route('adminexport.pdf',$request)}}">
                    <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"> 
                        <i class="fa-solid fa-file-pdf"></i> PDF
                    </button>
                </a>
            </div>
            <div>

            </div>
        </div>
        <div>

        </div>
        <div>
            Total: {{$cantidad}}
        </div>

    </div>





    @push('js')
        <script>
            document.querySelectorAll('input[name="pedido"]').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                // ocultar todos los inputs
                // document.getElementById('conFecha').style.display = 'none';
                // document.getElementById('sinFecha').style.display = 'none';
                

                // mostrar solo el correspondiente
                if (this.checked) {
                    document.getElementById('conFecha').style.display = 'block';
                    document.getElementById('sinFecha').style.display = 'none';
                } 
                else{
                    document.getElementById('sinFecha').style.display = 'block';
                    document.getElementById('conFecha').style.display = 'none';
                }
                });
            });
        </script>
        
    @endpush
    

    
</x-admin-layout>