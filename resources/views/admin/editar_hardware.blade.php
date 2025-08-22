{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Entregar"
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

        <div class="grid gap-6  md:grid-cols-2">
                 <div>
                     @if (!$imagen)
                         @if ($bien->FK_Hardware_TipoId ==7)
                            <img src="https://static.vecteezy.com/system/resources/previews/012/618/939/original/printer-cartoon-illustration-vector.jpg" height="240px" width="250px" alt="imagen de impresora">
                        @endif
                        @if ($bien->FK_Hardware_TipoId ==6)
                            <img src="https://m.media-amazon.com/images/I/41it4g4TcEL._UF894,1000_QL80_.jpg " height="250px" width="310px" alt="imagen de Proyector">
                            <p> Estado Original: {{$bien->Testado_fisico_hardware}}</p>                    
                        @endif
                        @if ($bien->FK_Hardware_TipoId ==5)
                            <img src=" https://static.vecteezy.com/system/resources/previews/011/065/272/non_2x/wireless-computer-mouse-clipart-gray-computer-mouse-watercolor-style-illustration-isolated-on-white-background-simple-wireless-mouse-cartoon-hand-drawn-office-supplies-drawing-back-view-vector.jpg" height="350px" width="350px" alt="imagen de Mouse">
                            <p> Estado Original: {{$bien->Testado_fisico_hardware}}</p>
                        @endif
                        @if ($bien->FK_Hardware_TipoId ==4)
                            <img src=" https://cdn-icons-png.flaticon.com/512/5921/5921714.png" height="200px" width="200px" alt="imagen de CPU">
                            <p> Estado Original: {{$bien->Testado_fisico_hardware}}</p>
                        @endif
                        @if ($bien->FK_Hardware_TipoId ==3)
                            <img src="https://img.freepik.com/vector-premium/monitor-computadora-estilo-dibujos-animados-aislado-sobre-fondo-blanco-ilustracion-stock-simbolo-computadora_258706-337.jpg" height="200px" width="250px" alt="imagen de Monitor">
                            <p> Estado Original: {{$bien->Testado_fisico_hardware}}</p>
                        @endif
                        @if ($bien->FK_Hardware_TipoId ==2)
                            <img src="https://images.vexels.com/media/users/3/140673/isolated/preview/68ff7023a9804bb6e5e12d53f6044c4c-icono-de-dibujos-animados-de-laptop.png" height="200px" width="250px" alt="imagen de Laptop">
                            <p> Estado Original: {{$bien->Testado_fisico_hardware}}</p>
                        @endif
                    @else
                         
                        <img src="{{ Storage::url($imagen->Tpath_imagenes) }}" height="450px" width="550px" alt="imagen del bien">
                         
                    @endif
                </div>
                <div>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                             {{-- AREA --}} 
                            <label for="areas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Elige un Área</label>
                            <select name="FK_Hardware_AreaId" id="areas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($areas as $area)
                                    <option value="{{$area->PK_area}}" {{$bien->FK_Hardware_AreaId==$area->PK_area ? 'selected' : ''}} >{{$area->UK_Nombre_area}}</option>
                                @endforeach
                            </select>
                        </div>
     
                         <div>
                            {{-- codigo --}}
                             <label for="UK_Hardware_Codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Codigo:</label>    
                             <input type="text" name="UK_Hardware_Codigo" id="UK_Hardware_Codigo" aria-label="UK_Hardware_Codigo" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->UK_Hardware_Codigo}}" >          
                            @error('UK_Hardware_Codigo')
                                <p class="text-red-600">*{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                             <label for="Dadquisicion_hardware" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Fecha de Adquisicion:</label>
                             <input type="date" name="Dadquisicion_hardware" id="Dadquisicion_hardware"  class="mb-6 bg-gray-100 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->Dadquisicion_hardware}}" >
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
                    <div class="grid gap-6 md:grid-cols-2">

                        <div>
                            {{-- tipo --}}
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de Hardware:</label>    
                            <select name="FK_Hardware_TipoId" id="FK_Hardware_TipoId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($tipos as $tipo)
                                    @if ($tipo->PK_tipo != 1)
                                        <option value="{{{$tipo->PK_tipo}}}">{{{$tipo->Tdescriocion_tipo}}}</option>
                                    @endif
                                
                                @endforeach
                            </select> 
                        </div>   
                    </div>

                </div>
         </div>
        <br>
         <div class="mb-4">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Descripcion</label>
            <textarea id="message" name="Tdescripcion_hardware" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$bien->Tdescripcion_hardware}}</textarea>
            @error('Tdescripcion_hardware')
                    <p class="text-red-600">*{{$message}}</p>
            @enderror
        </div> 
         <br> 
        <button
            style="background-color: #16a34a; color: white; font-size: 1.25rem; padding: 1.25rem 3rem; border-radius: 9999px; width: 100%; font-weight: bold;"
            type="submit">
            Editar
        </button>

    </form>


    @push('js')
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
                            title: "Editar este Bien?",
                            text: "no podrás revertir esto",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, Editar bien",
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