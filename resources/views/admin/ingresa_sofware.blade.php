{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Registrar"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
    [
        'name'=> 'Registrar Licencia',
    ]
    ]">

    <form method="POST" action="{{route('admindigital.store')}}" class="submit-form" enctype="multipart/form-data">
        @csrf
        

        <div class="grid gap-6 mb-4 md:grid-cols-2">
            
            <div>
                {{-- Nombre de la licencia --}}
                <label for="T_Nombre_Digital" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nombre de la Licencia:</label>
                <input name="T_Nombre_Digital" type="text" id="T_Nombre_Digital" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese el nombre especifico de la licencia" required value="{{old('T_Nombre_Digital')}}"/>
                @error('T_Nombre_Digital')
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
            </div>

            <div>
                    {{-- Sistem --}}
                    <label for="FK_B_Digital_SistemaId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Elige un Sistema</label>
                    <select name="FK_B_Digital_SistemaId" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($sistemas as $sis)
                            <option value="{{$sis->PK_sistema}}">{{$sis->Tdescripcion_sistema}}</option>
                        @endforeach
                    </select>
            </div>
            
            
            <div>
                {{-- Nombre del host --}}
                <label for="T_Host" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Host:</label>
                <input name="T_Host" type="text" id="T_Host" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese el Host" required value="{{old('T_Host')}}"/>
                @error('T_Host')
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
            </div>

            <div>
                    {{-- area --}}
                    <label for="FK_B_Digital_AreaId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Área</label>
                    <select name="FK_B_Digital_AreaId" id="FK_B_Digital_AreaId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($areas as $area)
                            <option value="{{$area->PK_area}}">{{$area->UK_Nombre_area}}</option>
                        @endforeach
                    </select>
            </div>
            <div>
                {{-- determincacion --}}
                <div class="flex items-center mb-4">
                    <input id="default-radio-1" type="radio" value="Determinado" name="T_Determinacion" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Determinado</label> 
                </div>
                <div class="flex items-center">
                    <input id="default-radio-2" type="radio" value="Indeterminado" name="T_Determinacion" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Indeterminado</label>
                </div>
                @error('T_Determinacion')
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
                
            </div>
            <div>
                {{-- Fecha de inicio --}}
                <label for="fecha_vencimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fecha de Inicio:</label>
                <input type="date" name="D_F_Inicio">
                @error('D_F_Inicio')
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
            </div>  
        </div>
        
        <br>
        
        
        
        <div class="flex justify-center" id="miInput" style="display: none;">
            {{-- Fecha de vencimiento  --}}
            <label for="fecha_vencimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fecha de Vencimiento:</label>
            <input type="date" id="wasa" name="D_F_Vencimiento">
            @error('D_F_Vencimiento')
            <p class="text-red-600">*{{$message}}</p>
            @enderror
        </div>
        
        <div class="flex justify-center mt-4" >
            <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Subir</button>
        </div>  

    </form>    
    

    @push('js')
        <script>
        let input = document.getElementById('miInput');

        document.querySelectorAll('input[name="T_Determinacion"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                let input = document.getElementById('miInput');
                if (this.value === 'Determinado') {
                    input.style.display = 'block'; // mostrar
                } else {
                    input.style.display = 'none';  // ocultar
                }
            });
        });
        </script>
        <script>
        //que seleciona todos esos formularios que tengan ese nombre de delete-form 
            forms = document.querySelectorAll('.submit-form')
            //que recorra todos los formularios
            forms.forEach(form => {
                //que se ponga al escucha de ese formulario con el evento submit
                form.addEventListener('submit',function(e){ //e es el evento en si
                    //previne el evento 
                    e.preventDefault('');
                        Swal.fire({
                            title: "Estas seguro de subir este Bien?",
                            text: "No podras revertir esto!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, Subir bien",
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