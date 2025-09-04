{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Editar"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
    [
        'name'=> 'Editar Harware',
    ]
    ]">
    <form action="{{route('adminbien.update',$bien->PK_Hardware)}}" class="edit-form" method="POST">
        @csrf
        @method('PUT')

            <div class="grid gap-6 md:grid-cols-3 mb-2">
                <div>
                     @if (!$imagen)
                        @if ($bien->FK_Hardware_TipoId ==8)
                            <img src="https://static.vecteezy.com/system/resources/previews/012/618/939/original/printer-cartoon-illustration-vector.jpg" height="240px" width="250px" alt="imagen de impresora">
                        @endif
                        @if ($bien->FK_Hardware_TipoId ==7) 
                            <img src="https://m.media-amazon.com/images/I/41it4g4TcEL._UF894,1000_QL80_.jpg " height="210px" width="310px" alt="imagen de Proyector">
                            {{-- <p> Estado Original: {{$bien->Testado_fisico_hardware}}</p>                     --}}
                        @endif
                        @if ($bien->FK_Hardware_TipoId ==6)
                            <img src=" https://static.vecteezy.com/system/resources/previews/011/065/272/non_2x/wireless-computer-mouse-clipart-gray-computer-mouse-watercolor-style-illustration-isolated-on-white-background-simple-wireless-mouse-cartoon-hand-drawn-office-supplies-drawing-back-view-vector.jpg" height="350px" width="350px" alt="imagen de Mouse">
                            {{-- <p> Estado Original: {{$bien->Testado_fisico_hardware}}</p> --}}
                        @endif
                        @if ($bien->FK_Hardware_TipoId ==5)
                            <img src=" https://cdn-icons-png.flaticon.com/512/5921/5921714.png" height="200px" width="200px" alt="imagen de CPU">
                            {{-- <p> Estado Original: {{$bien->Testado_fisico_hardware}}</p> --}}
                        @endif
                        @if ($bien->FK_Hardware_TipoId ==4)
                            <img src="https://img.freepik.com/vector-premium/monitor-computadora-estilo-dibujos-animados-aislado-sobre-fondo-blanco-ilustracion-stock-simbolo-computadora_258706-337.jpg" height="200px" width="250px" alt="imagen de Monitor">
                            {{-- <p> Estado Original: {{$bien->Testado_fisico_hardware}}</p> --}}
                        @endif
                        @if ($bien->FK_Hardware_TipoId ==3)
                            <img src="https://images.vexels.com/media/users/3/140673/isolated/preview/68ff7023a9804bb6e5e12d53f6044c4c-icono-de-dibujos-animados-de-laptop.png" height="200px" width="250px" alt="imagen de Laptop">
                            {{-- <p> Estado Original: {{$bien->Testado_fisico_hardware}}</p> --}}
                        @endif
                        {{-- aca falta poner una imagen x si no es ninguna de ellos --}}
                    @else
                         
                        <img src="{{ Storage::url($imagen->Tpath_imagenes) }}" height="450px" width="550px" alt="imagen del bien">
                         
                    @endif
                </div>
                <div class="md:col-span-2 bg-green-200 p-4">
                    <div class="grid gap-6 md:grid-cols-3">
                        <div>
                             {{-- AREA --}} 
                            <label for="areas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Elige un Área</label>
                            <select name="FK_Hardware_AreaId" id="miSelect-area"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($areas as $area)
                                    @if ($area->PK_area != 1 )
                                        <option value="{{$area->PK_area}}" {{$bien->FK_Hardware_AreaId==$area->PK_area ? 'selected' : ''}} >{{$area->UK_Nombre_area}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div>
                            {{-- tipo --}}
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de Hardware:</label>    
                            <select name="FK_Hardware_TipoId" id="miSelect-tipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($tipos as $tipo)
                                    @if ($tipo->PK_tipo != 1 && $tipo->PK_tipo != 2)
                                        <option value="{{{$tipo->PK_tipo}}}" {{$bien->tipo->PK_tipo==$tipo->PK_tipo ? 'selected' : ''}} >{{{$tipo->Tdescriocion_tipo}}}</option>
                                    @endif
                                
                                @endforeach
                            </select> 
                        </div>   
                        <div>
                            {{-- codigo --}}
                            <label for="UK_Hardware_Codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo:</label>
                            <input name="UK_Hardware_Codigo" type="text" id="UK_Hardware_Codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" maxlength="12" pattern=".{12}" required title="Debe tener exactamente 12 caracteres" required  value="{{$bien->UK_Hardware_Codigo}}" >      
                            @error('UK_Hardware_Codigo')
                                <p class="text-red-600">*{{$message}}</p>
                            @enderror
                        
                        </div>

                       <div>
                            {{-- marca --}}
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de Hardware:</label>    
                            <select name="FK_Hardware_MarcasId" id="miSelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($marcas as $marca)
                                    <option value="{{{$marca->PK_marca}}}" {{$bien->marca->PK_marca==$marca->PK_marca ? 'selected' : ''}} >{{{$marca->UK_Nombre_marca}}}</option>                            
                                @endforeach
                            </select> 
                        </div> 


                        {{-- modeo --}}
                        <div>
                            <label for="Tmodelo_hardware" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modelo:</label>
                            <input name="Tmodelo_hardware" type="text" id="miInput" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  maxlength="25"   required  value="{{$bien->Tmodelo_hardware}}" >      
                            @error('Tmodelo_hardware')
                                <p class="text-red-600">*{{$message}}</p>
                            @enderror
                        
                        </div> 

                        {{-- serie --}}
                        <div>
                            <label for="Tserie_hardware" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serie:</label>
                            <input name="Tserie_hardware" type="text" id="miInput2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  maxlength="25"   required  value="{{$bien->Tserie_hardware}}" >      
                            @error('Tserie_hardware')
                                <p class="text-red-600">*{{$message}}</p>
                            @enderror
                        
                        </div>

                        {{-- fecha de adquisicion --}}
                        <div>
                            <label for="Dadquisicion_hardware" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Fecha de Adquisicion:</label>
                            <input type="date" name="Dadquisicion_hardware" id="Dadquisicion_hardware"  class="mb-6 bg-gray-100 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->Dadquisicion_hardware}}" max="{{ date('Y-m-d') }}">
                            @error('Dadquisicion_hardware')
                                <p class="text-red-600">*{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div>
                            {{-- estado --}}
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Estado:</label>   
                            <select name="Testado_fisico_hardware" id="Testado_fisico_hardware" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Bien" {{$bien->Testado_fisico_hardware== 'Bien' ? 'selected' : ''}} >Bien</option>
                                <option value="Regular" {{$bien->Testado_fisico_hardware== 'Regular' ? 'selected' : ''}} >Regular</option>
                                <option value="Mal" {{$bien->Testado_fisico_hardware== 'Mal' ? 'selected' : ''}} >Mal</option>
                            </select>   
                        </div>



                    </div>                  
                </div>
         </div>
        <br>
         <div class="mb-4">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Descripcion</label>
            <textarea id="miTextarea" name="Tdescripcion_hardware" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$bien->Tdescripcion_hardware}}</textarea>
            <p>Letras restantes: <span id="contador">180</span></p>
            @error('Tdescripcion_hardware')
                    <p class="text-red-600">*{{$message}}</p>
            @enderror

        </div> 
        <br> 
        <div class="grid gap-6 mb-4 md:grid-cols-3">
                <div>            
                </div>
                <div class="grid gap-6 mb-4 md:grid-cols-2">
                    <div class="flex justify-end">
                        <button type="submit" 
                            class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                            Subir  <i class="fa-solid fa-arrow-up"></i>
                        </button>
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
            $(document).ready(function() {
                $('#miSelect-tipo').select2({
                placeholder: "---Seleccioné un tipo de hardware---",
                allowClear: true
                });
            });
        </script>
        <script>
            $(document).ready(function() {
               
                $('#miSelect').select2({
                    placeholder: "---Selecciona una marca---",
                    allowClear: true
                });
                const modelo = "{{ $bien->Tmodelo_hardware }}";
                const serie  = "{{ $bien->Tserie_hardware }}";

                $('#miSelect').on("change", function () {
                    const value = $(this).val();
                    const input = document.getElementById("miInput");
                    const input2 = document.getElementById("miInput2");

                    if (value === "2" || value === "1") { 
                        input.value = "Sin registro";
                        input2.value = "Sin registro";  
                        input.disabled = true;
                        input2.disabled = true;
                    } else {
                        input.value = modelo;
                        input2.value = serie;
                        input.disabled = false;
                        input2.disabled = false;
                    }
                });
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
                            title: "Editar este bien?",
                            text: "no podrás revertir esto",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, editar bien",
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
            const textarea = document.getElementById("miTextarea");
            const contador = document.getElementById("contador");
            const limite = 180; // máximo de letras/caracteres permitidos

            textarea.addEventListener("input", () => {
                let restantes = limite - textarea.value.length;

                if (restantes < 0) {
                    textarea.value = textarea.value.substring(0, limite); // corta el texto
                    restantes = 0;
                }

                contador.textContent = restantes;
            });
        </script>
                                    
    @endpush      

    
    
</x-admin-layout>