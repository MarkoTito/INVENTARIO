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
        'name'=>'Buscar',
        'href' => '/',
    ],
    [
        'name'=> 'Detalle',
    ]
    ]">

    <div class="grid gap-6  md:grid-cols-2">
            <div>
                @if (!$imagen)
                    @if ($bien->FK_B_Fisico_TipoId ==6)
                        <img class="rounded-full w-96 h-96" width="300px" src="https://static.vecteezy.com/system/resources/previews/012/618/939/original/printer-cartoon-illustration-vector.jpg" alt="image description">
                        
                    @endif
                    @if ($bien->FK_B_Fisico_TipoId ==5)
                        <img src="https://m.media-amazon.com/images/I/41it4g4TcEL._UF894,1000_QL80_.jpg " height="250px" width="350px" alt="imagen de impresora">
                    @endif
                    @if ($bien->FK_B_Fisico_TipoId ==4)
                        <img src=" https://static.vecteezy.com/system/resources/previews/011/065/272/non_2x/wireless-computer-mouse-clipart-gray-computer-mouse-watercolor-style-illustration-isolated-on-white-background-simple-wireless-mouse-cartoon-hand-drawn-office-supplies-drawing-back-view-vector.jpg" height="350px" width="350px" alt="imagen de impresora">
                    @endif
                    @if ($bien->FK_B_Fisico_TipoId ==3)
                        <img src=" https://cdn-icons-png.flaticon.com/512/5921/5921714.png" height="200px" width="200px" alt="imagen de impresora">
                    @endif
                    @if ($bien->FK_B_Fisico_TipoId ==2)
                        <img src="https://img.freepik.com/vector-premium/monitor-computadora-estilo-dibujos-animados-aislado-sobre-fondo-blanco-ilustracion-stock-simbolo-computadora_258706-337.jpg" height="200px" width="250px" alt="imagen de impresora">
                    @endif
                    @if ($bien->FK_B_Fisico_TipoId ==1)
                        <img src="" height="350px" width="350px" alt="imagen de impresora">
                    @endif  
                    
                @else
                    
                    <img src="{{ Storage::url($imagen->Ima_path) }}" height="50px" width="140px" alt="imagen del bien">
                    
                @endif


                    
                
            </div>
            
            <div>
                <div class="grid gap-6 md:grid-cols-2">

                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Área</label>
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->area->UK_Nombre_Area}}" disabled>
                    </div>
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Codigo:</label>    
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->UK_Codigo_Pratimonial}}" disabled>
                    
                    </div>

                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Fecha de Adquisicion:</label>
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->D_Adquisicion}}" disabled>
                    </div>
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Estado Original:</label>    
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->T_Estado_Fisico}}" disabled>
                    
                    </div>
                    
                </div>
                
            </div>
        </div>    
        <div>

            
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Descripcion</label>
            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>{{$bien->T_B_Descripcion}}</textarea>


            {{-- <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Descripcion:</label>
            <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->T_B_Descripcion}}" disabled>
         --}}
        
        </div>
        <br>
        <br>
        @if ($bien->T_Estado == 'Activo')
        
                        <div class="grid gap-6 mb-4 md:grid-cols-3" >
                            
                           <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                class="block text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-lg px-8 py-3 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800" type="button"> Dar de Baja 
                            </button>
        
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                class="block text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-lg px-8 py-3 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800" type="button">   Editar {{$bien->tipo->T_Descriocion}}
                            </button>

                            <a href="/admin/buscar/historial/{{$bien->PK_B_Fisico}}">
                                <button
                                    class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-lg px-10 py-4 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800"
                                    type="button">
                                    Ver Historial
                                </button>
                            </a>
        
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
                                        <form action="/admin/Bajar/{{$bien->PK_B_Fisico}}"
                                                class="delete-form">
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
        
                      
                        </div>
            
        @endif
        @if ($bien->T_Estado == 'Baja')

            <div class="grid gap-6 mb-4 md:grid-cols-2" >

                <a href="/admin/baja/{{$bien->PK_B_Fisico}}/pdf">
                    <button 
                        class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-lg px-10 py-4 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800"
                        type="button">
                        Ver Baja
                    </button>
                </a>
                
                <a href="/admin/buscar/historial/{{$bien->PK_B_Fisico}}">
                    <button 
                        class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-lg px-10 py-4 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800"
                        type="button">
                        Ver Historial
                    </button>
                </a>
            </div>

        @endif


    @push('js')
        <script>
        //que seleciona todos esos formularios que tengan ese nombre de delete-form 
            forms = document.querySelectorAll('.delete-form')
            //que recorra todos los formularios
            forms.forEach(form => {
                //que se ponga al escucha de ese formulario con el evento submit
                form.addEventListener('submit',function(e){ //e es el evento en si
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
                                    
    @endpush      






    
</x-admin-layout>