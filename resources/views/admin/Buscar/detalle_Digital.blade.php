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
        'name'=>'Buscar Licencia',
        'href' => '/',
    ],
    [
        'name'=> 'Detalle Licencia',
    ]
    ]">

    <div class="grid gap-6  md:grid-cols-2">
            <div>
                
                @if ($digital->FK_Software_SistemaId ==4)
                    <img src="https://nexcelsaudi.com/wp-content/uploads/2024/04/item-2356550-943-500x500-1.webp" height="350px" width="350px" alt="imagen de impresora">
                @endif
                @if ($digital->FK_Software_SistemaId ==3)
                    <img src="https://www.intel.com/content/dam/www/central-libraries/us/en/images/2024-05/logo-microsoft-transparent-bg-rwd.png" height="250px" width="250px" alt="imagen de impresora">
                @endif
                @if ($digital->FK_Software_SistemaId ==2)
                    <img src="https://static.vecteezy.com/system/resources/previews/060/100/943/non_2x/eset-nod32-antivirus-logo-square-rounded-eset-nod32-antivirus-logo-eset-nod32-antivirus-logo-free-download-free-png.png" height="350px" width="350px" alt="imagen de impresora">
                @endif
                @if ($digital->FK_Software_SistemaId ==1)
                    <img src="https://diariodigitalis.com/wp-content/uploads/2021/02/Zoon-an%CC%83ade-subti%CC%81tulos-automa%CC%81ticos-a-las-cuentas-gratuitas.jpg" height="350px" width="350px" alt="imagen de impresora">
                @endif    
    
                
            </div>
            
            <div>
                <div class="grid gap-6 md:grid-cols-2">
                    
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Nombre:</label>
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->Tnombre_software}}" disabled>
                    </div>
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Sistema:</label>    
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->sistema->Tdescripcion_sistema}}" disabled>
                        
                    </div>
                    
                </div>
                
                <div class="grid gap-6 md:grid-cols-2">

                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Host:</label>
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->Thost_software}}" disabled>
                    </div>
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fecha de Inicio:</label>    
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->Dfe_Inicio_software}}" disabled>
                    
                    </div>
                    
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Determinacion:</label>
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->determinacion->Tdescripcion_determinacion}}" disabled>
                    </div>
                    @if ($digital->FK_Software_DeterminacionId == 2)
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fecha de Fin:</label>    
                            <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="- " disabled>
                            
                        </div>
                        
                    @else
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fecha de Fin:</label>    
                            <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->Dfe_vencimiento_software}}" disabled>
                            
                        </div>
                    @endif
                </div>
                
            </div>
    </div>    
    
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre Del Archivo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de Publicacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ver
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($archivos->isEmpty())
                    <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            No hay Documentos
                        </th>   
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                           -
                        </th>  
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            -
                        </th>           
                    </tr>
                @else
                    @foreach ($archivos as $archivo)
                        <tr>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                                {{$archivo->T_Arch_Nombre}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                                {{$archivo->created_at}}
                            </th>
                            <th class="px-6 py-4">

                                <a href="{{asset('storage/'.$archivo->Arch_path)}} "target="_blank" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Ver
                                </a>
                            
                            </th>
                        </tr>
                    @endforeach
                    
                @endif
                
                
            </tbody>
        </table>
    </div>



        






    
</x-admin-layout>