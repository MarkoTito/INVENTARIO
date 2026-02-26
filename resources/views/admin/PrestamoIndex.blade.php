{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Prestamo"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
    [
        'name'=> 'Prestamo',
    ]
    ]">
    
    {{-- <form method="POST" action="/admin/Prestamo" class="submit-form" > --}}
    <form method="POST" action="/admin/Prestamo" class="submit-form" target="_blank" 
        onsubmit="setTimeout(() => { window.location.href='{{ route('adminbien.index') }}'; }, 2500);">
        @csrf
    
        <div class="hidden" >
            {{-- codigo patrimonial --}}
            <input name="FK_Prestamo_HardwareId" type="text" id="FK_Prestamo_HardwareId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese el codigo unitario de 12 digitos"  value="{{$code}}"/>
        </div>


        <div class="grid gap-2 mb-4 md:grid-cols-2 ">

                <div>
                    {{-- Estado del bien --}}
                    <h3 class=" font-semibold text-gray-900 dark:text-black">Estado del bien</h3>
                        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">    
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                        <input required id="horizontal-list-radio-license" type="radio" value="Bueno" name="Testado_fisico_prestamo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="horizontal-list-radio-license" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bueno </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input required  id="horizontal-list-radio-id" type="radio" value="Regular" name="Testado_fisico_prestamo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="horizontal-list-radio-id" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Regular </label>
                                </div>
    
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input required id="horizontal-list-radio-military" type="radio" value="Mal" name="Testado_fisico_prestamo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="horizontal-list-radio-military" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mal</label>
                                </div>
                            </li>
                        </ul>
                        @error('Testado_fisico_prestamo')
                            <p class="text-red-600">*{{$message}}</p>
                        @enderror
                </div>
                <div>
                    {{-- Documento de referencia --}}
                    <label for="doc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Doc. Referencia:</label>
                    <input name="Tdoc_ref_prestamo" type="text" id="usuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" maxlength="30"  required  placeholder="Escriba el documento el cual tendra relacion con el acta"  value="{{old('Tdoc_ref_prestamo')}}"/>
                    @error('Tdoc_ref_prestamo')
                            <p class="text-red-600">*{{$message}}</p>
                    @enderror
                </div>                   
        </div>
        <div class="grid gap-6 mb-4 md:grid-cols-2">
            <div >
                {{-- Motivo --}}
                <label  for="message" class="block mb-1 text-sm font-medium text-gray-900 dark:text-black">Motivo de prestamo:</label>
                <textarea name="Tmotivo_prestamo" id="motivo" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" maxlength="150"   placeholder="Ingrese el motivo de prestamo - Campo obligatorio">{{old('Tmotivo_prestamo')}}</textarea>
                @error('Tmotivo_prestamo')
                        
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
            </div>
            <div >
                {{-- observacion --}}
                <label  for="message" class="block mb-1 text-sm font-medium text-gray-900 dark:text-black">Observacion:</label>
                <textarea name="Tobservaciones_prestamo" id="observacion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" maxlength="150"   placeholder="Ingrese una observacion del Bien - Campo opcional">{{old('Tobservaciones_prestamo')}}</textarea>
                @error('Tobservaciones_prestamo')
                        
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="grid gap-6 mb-4 md:grid-cols-3">
            <div>
                {{-- Nombre del usuario --}}
                <label for="usuario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Usuario:</label>
                <input name="Tresponsable_prestamo" type="text" id="usuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" maxlength="30"  required  placeholder="Nombre y apellidos del usuario"  value="{{old('Tresponsable_prestamo')}}"/>
                @error('Tresponsable_prestamo')
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
            </div>
            <div>
                {{-- Nombre del cargo --}}
                <label for="cargo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Cargo:</label>
                <input name="Tcargo_prestamo" type="text" id="cargo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" maxlength="50"  required  placeholder="Ingrese el cargo del usuario" required value="{{old('Tcargo_prestamo')}}"/>
                @error('Tcargo_prestamo')
                        <p class="text-red-600">*{{$message}}</p>
                @enderror
            </div>
            <div>
                {{-- area --}}
                <label for="areas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Elige un Área</label>
                <select required name="FK_Prestamo_AreaId" id="miSelect-area" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value=""selected disabled >---Seleccioné un área---</option>
                        @foreach ($areas as $area)
                            @if ($area->PK_area != 1 )
                                <option value="{{$area->PK_area}}" {{old('FK_Prestamo_AreaId')== $area->PK_area ? 'selected': '' }} >{{$area->UK_Nombre_area}}</option>
                            @endif
                        @endforeach
                </select>
                @error('FK_Prestamo_AreaId')
                    <p class="text-red-600">*{{$message}}</p>
                @enderror 
            </div>
            

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
                            title: "Estas seguro de subir esta reparacion?",
                            text: "No podras revertir esto!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, subir reparacion",
                            cancelButtonText: "No cancelar"
                            }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });    
                });
            });
        </script>



        <script>
            $(document).ready(function() {
                $('#miSelect-area').select2({
                placeholder: "---Seleccioné un área---",
                allowClear: true
                });
            });
        </script>
                                    
    @endpush




    
</x-admin-layout>