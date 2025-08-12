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
        'name'=> 'Reprar',
    ]
    ]">
      <form method="POST" action="{{route('admincomentario.store')}}" class="submit-form" >
        @csrf
    

        <div class="grid gap-6 mb-4 md:grid-cols-2">

            <div>
                {{-- codigo patrimonial --}}
                <label for="FK_Comentario_HardwareId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Codigo Patrimonial</label>
                <input name="FK_Comentario_HardwareId" type="text" id="FK_Comentario_HardwareId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese el codigo unitario de 12 digitos" required value="{{old('FK_Comentario_HardwareId')}}"/>
                @error('FK_Comentario_HardwareId')
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
            </div>

          
            <div>
                {{-- Estado del bien --}}
                <h3 class=" font-semibold text-gray-900 dark:text-black">Estado del bien</h3>
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">    
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="horizontal-list-radio-license" type="radio" value="Bien" name="Testado_fisico_comentario" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="horizontal-list-radio-license" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bien </label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="horizontal-list-radio-id" type="radio" value="Regular" name="Testado_fisico_comentario" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="horizontal-list-radio-id" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Regular </label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="horizontal-list-radio-military" type="radio" value="Mal" name="Testado_fisico_comentario" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="horizontal-list-radio-military" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mal</label>
                            </div>
                        </li>
                    </ul>
                    @error('Testado_fisico_comentario')
                        
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
            </div>
        
            <div>
                {{-- descipcion --}}
                <label  for="message" class="block mb-1 text-sm font-medium text-gray-900 dark:text-black">Descripcion</label>
                <textarea name="Tdescripcion_comentario" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese una descripcion de la reparacion">{{old('Tdescripcion_comentario')}}</textarea>
                 @error('Tdescripcion_comentario')
                        
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
            </div>
            <div>
                {{-- Observaciones --}}
                <label  for="message" class="block mb-1 text-sm font-medium text-gray-900 dark:text-black">Observacion:</label>
                <textarea name="Tobservacion_comentario" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese una observacion del Bien - Campo opcional">{{old('Tobservacion_comentario')}}</textarea>
                 @error('Tobservacion_comentario')
                        
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
            </div>
            <div>
                {{-- afuera/adentro --}}
                <div class="flex items-center mb-4">
                    <input id="default-radio-1" type="radio" value="0" name="situacion" {{ old('situacion') == 1 ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Dentro de Palacio</label> 
                </div>
                <div class="flex items-center">
                    <input  id="default-radio-2" type="radio" value="1" name="situacion" {{ old('situacion') == 2 ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label  for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Afuera de Palacio</label>
                </div>
                @error('situacion')
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
                @error('Dfe_vencimiento_software')
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
                
            </div>
            <div>
                {{-- recomendacion --}}
                <label  for="message" class="block mb-1 text-sm font-medium text-gray-900 dark:text-black">Recomendacion:</label>
                <textarea name="Trecomendacion_comentario" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese una Recomendacion del Bien - Campo opcional">{{old('Trecomendacion_comentario')}}</textarea>
                 @error('Trecomendacion_comentario')
                        
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
            </div>
            
            {{-- <div class="flex justify-center" id="miInput" style="display: none;">
                 area
                <label for="FK_Software_AreaId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Área de Destino:</label>
                <select name="area_destino" id="FK_Software_AreaId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($areas as $area)
                        <option value="{{$area->PK_area}}">{{$area->UK_Nombre_area}}</option>
                    @endforeach
                </select>
            </div> --}}
            
        </div>


        



        <br>

        <div class="flex justify-center mt-4" >
            <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Subir</button>

        </div>






    </form>    
    

    @push('js')
        <script>
        let input = document.getElementById('miInput');

        document.querySelectorAll('input[name="situacion"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                let input = document.getElementById('miInput');
                if (this.value === '1') {
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
                            title: "Estas seguro de subir este comentario?",
                            text: "No podras revertir esto!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, Subir comentario",
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