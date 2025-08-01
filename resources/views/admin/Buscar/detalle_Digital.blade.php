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
                
                @if ($digital->FK_B_Digital_SistemaId ==4)
                    <img src="https://nexcelsaudi.com/wp-content/uploads/2024/04/item-2356550-943-500x500-1.webp" height="350px" width="350px" alt="imagen de impresora">
                @endif
                @if ($digital->FK_B_Digital_SistemaId ==3)
                    <img src="https://www.intel.com/content/dam/www/central-libraries/us/en/images/2024-05/logo-microsoft-transparent-bg-rwd.png" height="250px" width="250px" alt="imagen de impresora">
                @endif
                @if ($digital->FK_B_Digital_SistemaId ==2)
                    <img src="https://static.vecteezy.com/system/resources/previews/060/100/943/non_2x/eset-nod32-antivirus-logo-square-rounded-eset-nod32-antivirus-logo-eset-nod32-antivirus-logo-free-download-free-png.png" height="350px" width="350px" alt="imagen de impresora">
                @endif
                @if ($digital->FK_B_Digital_SistemaId ==1)
                    <img src="https://diariodigitalis.com/wp-content/uploads/2021/02/Zoon-an%CC%83ade-subti%CC%81tulos-automa%CC%81ticos-a-las-cuentas-gratuitas.jpg" height="350px" width="350px" alt="imagen de impresora">
                @endif    
    
                
            </div>
            
            <div>
                <div class="grid gap-6 md:grid-cols-2">
                    
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Nombre:</label>
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="Usuario Agregar" disabled>
                    </div>
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Sistema::</label>    
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->FK_B_Digital_SistemaId}}" disabled>
                        
                    </div>
                    
                </div>
                
                <div class="grid gap-6 md:grid-cols-2">

                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Host:</label>
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->T_Host}}" disabled>
                    </div>
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fecha de Inicio:</label>    
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->D_F_Inicio}}" disabled>
                    
                    </div>
                    
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Determinacion:</label>
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->T_Determinacion}}" disabled>
                    </div>
                    @if ($digital->T_Determinacion == "Indeterminado")
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Sistema:</label>    
                            <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="No hay " disabled>
                            
                        </div>
                        
                    @else
                        
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Sistema::</label>    
                            <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->D_F_Vencimiento}}" disabled>
                            
                        </div>
                    @endif

            
                    
                </div>

                
             

                {{-- <div class="grid gap-6 mb-4 md:grid-cols-2" >
                    
                   <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                        class="block text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-lg px-8 py-3 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800" type="button"> Dar de Baja 
                    </button>

                    <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                        class="block text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-lg px-8 py-3 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800" type="button">   Editar {{$bien->tipo->T_Descriocion}}
                    </button>

                    <!-- Main modal -->
                    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Dar de Baja al Bien
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body y formulario -->
                                <form action="/admin/Bajar/{{$bien->PK_B_Fisico}}">
                                    @csrf
                                    <div class="p-4 md:p-5 space-y-4">
                                        <label for="T_Motivo_Baja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motivo:</label>
                                        <textarea  name="T_Motivo_Baja" id="T_Motivo_Baja" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escriba el motivo de la baja">{{old('T_Motivo_Baja')}}</textarea>
                                        @error('T_Motivo_Baja')
                                                <p class="text-red-600">*{{$message}}</p>
                                        @enderror
                                    
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="default-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Dar de baja</button>
                                        <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

              
                </div> --}}
            </div>
    </div>    
    <div>
               <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Sistema:</label>
                <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->FK_B_Digital_SistemaId}}" disabled>
    </div>


        






    
</x-admin-layout>