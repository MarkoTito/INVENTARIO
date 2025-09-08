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
        'name'=> 'Buscar Licencia',
        'href' => route('admindigital.index')
    ],
    [
        'name'=> 'Editar licencia',
    ]
    ]">

    <form action="/admin/digital/editar"class="edit-form" method="POST">

        <br>
        <br>
        @csrf
        <input hidden name="PK_Software" type="text" value="{{$digital->PK_Software}}" >
        <input hidden name="FK_Software_EstadoId" type="text" value="1" >
        <input hidden name="FK_Software_TipoId" type="text" value="1" >

        <div class="grid gap-6  md:grid-cols-2">
                <div>
                    
                    @if ($digital->FK_Software_SistemaId ==5)
                        <img src="https://nexcelsaudi.com/wp-content/uploads/2024/04/item-2356550-943-500x500-1.webp" height="350px" width="350px" alt="imagen de impresora">
                    @endif
                    @if ($digital->FK_Software_SistemaId ==4)
                        <img src="https://www.intel.com/content/dam/www/central-libraries/us/en/images/2024-05/logo-microsoft-transparent-bg-rwd.png" height="250px" width="250px" alt="imagen de impresora">
                    @endif
                    @if ($digital->FK_Software_SistemaId ==3)
                        <img src="https://static.vecteezy.com/system/resources/previews/060/100/943/non_2x/eset-nod32-antivirus-logo-square-rounded-eset-nod32-antivirus-logo-eset-nod32-antivirus-logo-free-download-free-png.png" height="350px" width="350px" alt="imagen de impresora">
                    @endif
                    @if ($digital->FK_Software_SistemaId ==2)
                        <img src="https://diariodigitalis.com/wp-content/uploads/2021/02/Zoon-an%CC%83ade-subti%CC%81tulos-automa%CC%81ticos-a-las-cuentas-gratuitas.jpg" height="350px" width="350px" alt="imagen de impresora">
                    @endif    
        
                    
                </div>
                
                <div>
                    <div class="grid gap-6 md:grid-cols-2 mb-4 ">
                        <div>
                            {{-- area --}}
                            <label for="FK_Software_AreaId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Área</label>
                            <select name="FK_Software_AreaId" id="miSelect-area"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($areas as $area)
                                    @if ($area->PK_area != 1 )
                                        <option value="{{$area->PK_area}}" {{$digital->FK_Software_AreaId==$area->PK_area ? 'selected' : ''}} >{{$area->UK_Nombre_area}}</option>
                                    @endif
                                @endforeach
                            </select>                            
                        
                        
                        </div>
    
                    
                        <div>
                            {{-- sistema --}} 
                            <label for="areas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Elige un sistema</label>
                            <select name="FK_Software_SistemaId" id=""  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($sistemas as $sistema)
                                    @if ($sistema->PK_sistema != 1 )
                                        <option value="{{$sistema->PK_sistema}}" {{$digital->FK_Software_SistemaId==$sistema->PK_sistema ? 'selected' : ''}} >{{$sistema->Tdescripcion_sistema}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-4" >
                        {{-- nombre --}}
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input name="Tnombre_software" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->Tnombre_software}}" required />
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
    
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Host</label>
                            <input name="Thost_software" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->Thost_software}}" required />
                        </div>
    
                        {{-- fecha de adquisicion --}}
                        <div>
                            <label for="Dadquisicion_hardware" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Fecha de Inicio</label>
                            <input  name="Dfe_Inicio_software" type="date" name="Dadquisicion_hardware" id="Dadquisicion_hardware"  class="mb-6 bg-gray-100 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->Dfe_Inicio_software}}" max="{{ date('Y-m-d') }}">
                            @error('Dadquisicion_hardware')
                                <p class="text-red-600">*{{$message}}</p>
                            @enderror
                        </div>
    
    
                        
                    </div>
                    <div class="grid gap-6 md:grid-cols-2">
                        
                        {{-- indeterminado sin fecha es igual a2 --}}
                        @if ($digital->FK_Software_DeterminacionId == 2)
                            
                            <div class="mb-4">
                                <label for="opcion" class="block text-sm font-medium text-gray-700">Selecciona una opción</label>
                                <select id="opcion" name="FK_Software_DeterminacionId" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option disabled value="">-- Selecciona --</option>
                                    <option  value="1"  >Determinado</option>
                                    <option selected value="2"> Indeterminado</option>
                                </select>
                            </div>
                            
                        @else
                            
                            <div class="mb-4">
                                <label for="opcion" class="block text-sm font-medium text-gray-700">Selecciona una opción</label>
                                <select id="opcion" name="FK_Software_DeterminacionId" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option disabled value="">-- Selecciona --</option>
                                    <option selected value="1"  >Determinado</option>
                                    <option  value="2"> Indeterminado</option>
                                </select>
                            </div>
                            <div id="hostField" >
                                <label for="Dfe_vencimiento_software" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Fecha de Fin</label>
                                <input type="date" name="Dfe_vencimiento_software" id="Dfe_vencimiento_software"  class="mb-6 bg-gray-100 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$digital->Dfe_vencimiento_software}}">
                                @error('Dfe_vencimiento_software')
                                    <p class="text-red-600">*{{$message}}</p>
                                @enderror
                            </div>
                            
                            
                        @endif
                            
                        <div id="hostField" class="mb-4 hidden">
                                <label for="Thost_software" class="block text-sm font-medium text-gray-700">Fecha de Fin</label>
                                <input type="date" id="Thost_software" name="Dfe_vencimiento_software" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"  min="{{ date('Y-m-d') }}" >
                        </div>



                    </div>

                    
                    
                </div>
    
                
            </div>
            
            <br>
            <br>
            <div class="grid gap-6 mb-4 md:grid-cols-3">
                    <div>
    
                    </div>
    
                    <div>
                        <button type="submit" 
                            class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                            Subir  <i class="fa-solid fa-arrow-up"></i>
                        </button>
                    </div>
    
                    <div>
    
                    </div>
    
            </div>
    
    
    
        </div> 
    </form>
    
    
    
    @push('js')

        <script>
            $(document).ready(function() {
                $('#miSelect-area').select2({
                placeholder: "---Seleccioné un área---",
                allowClear: true
                });
            });
        </script>

        <script>
        document.getElementById('opcion').addEventListener('change', function () {
            const hostField = document.getElementById('hostField');
            if (this.value === '1') {
                hostField.classList.remove('hidden');
            } else {
                hostField.classList.add('hidden');
            }
        });
        </script>


        <script>
        //que seleciona todos esos formularios que tengan ese nombre de delete-form 
            forms = document.querySelectorAll('.edit-form')
            //que recorra todos los formularios
            forms.forEach(form => {
                //que se ponga al escucha de ese formulario con el evento submit
                form.addEventListener('submit',function(e){ //e es el evento en si
                    //previne el evento 
                    e.preventDefault('');
                        Swal.fire({
                            title: "Editar este software?",
                            text: "no podrás revertir esto",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, editar software",
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