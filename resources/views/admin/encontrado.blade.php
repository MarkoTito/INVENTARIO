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
        'name'=> 'Buscar',
        'href' => route('adminbien.index')
        
    ],
    [
        'name'=> 'Bien',
        
    ]
    ]"> 
    <div class="grid gap-2 mb-4 md:grid-cols-2">
        <div>
            {{-- formulario CON CODIGO --}}
            <form method="POST" action="/admin/buscar/todo/code" class="p-6 rounded-lg w-96 mx-auto">
                
                @csrf
                <input type="text" name="form" value="1" class="hidden">  
                <div class="mb-4">
                    <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresar codigo</label>
                    <input name="UK_Hardware_Codigo" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" maxlength="12" pattern=".{12}" required title="Debe tener exactamente 12 caracteres"  placeholder="Ingresa el Codigo del Bien" value="{{$request->UK_Hardware_Codigo}}"  />
                </div>

                <div class="flex justify-center mb-4" >
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                </div>
                <br>
                
            </form>
        </div>
        <div>
            <form method="POST" action="/admin/buscar/todo" class="p-6 rounded-lg mx-auto inline-block">                
                @csrf
                <input type="text" name="form" value="2" class="hidden">  
                 <div class="grid gap-6 mb-4 md:grid-cols-2">
                    <div>
                        {{-- tipo de bien --}}
                        <label for="tipos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de Hardware</label>
                        <select name="FK_Hardware_TipoId" id="miSelect-tipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=""selected disabled >---Seleccioné un tipo de hardware---</option>
                            @foreach ($tipos as $tipo)
                                    @if ($tipo->PK_tipo != 1)
                                        <option value="{{{$tipo->PK_tipo}}}" {{$request->FK_Hardware_TipoId==$tipo->PK_tipo ? 'selected': ''}} >{{{$tipo->Tdescriocion_tipo}}}</option>
                                    @endif
                            @endforeach
                        </select>
                        @error('FK_Hardware_TipoId')
                            <p class="text-red-600">*{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                            <div>
                                {{-- area --}}
                                <label for="areas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Elige un Área</label>
                                <select name="FK_Hardware_AreaId" id="miSelect-area" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value=""selected disabled >---Seleccioné un área---</option>
                                        @foreach ($areas as $area)
                                            <option value="{{$area->PK_area}}" {{$request->FK_Hardware_AreaId==$area->PK_area ? 'selected' : '' }}  >{{$area->UK_Nombre_area}}</option>
                                        @endforeach
                                </select>
                                @error('FK_Hardware_AreaId')
                                    <p class="text-red-600">*{{$message}}</p>
                                @enderror 
                            </div>
                            
                    </div>
                    
                    
                    
                </div>   
                
                <div class=" flex justify-center mt-4">
                    <input  id="default-radio-1" type="radio" value="1" name="estado" 
                        {{$request->estado == "1" ? 'checked' : ''}}
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Activo</label>                    
                    <span class="text-white" >---</span>
                    <input  id="default-radio-2" type="radio" value="0" name="estado" 
                        {{$request->estado == "0" ? 'checked' : ''}}
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Inactivo</label>
                </div>
               
        
                <div class="flex justify-center mt-4" >
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                </div>  
            </form>
            
        </div>

    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <h3>Bienes</h3>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3" align="center" >
                        Tipo
                    </th>
                    <th scope="col" class="px-6 py-3" align="center" >
                        Codigo Patrimonial
                    </th>
                    <th scope="col" class="px-6 py-3" align="center" >
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3" align="center" >
                        Area
                    </th>
                    <th scope="col" class="px-6 py-3" align="center" >
                        Reparar
                    </th>
                    <th scope="col" class="px-6 py-3" align="center" >
                        Activar/Bajar
                    </th>
                    <th scope="col" class="px-6 py-3" align="center" >
                        Detalle
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($bienes->isEmpty())
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                             No Exite Bien con esa relacion
                        </th>
                        <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                             -
                        </th>
                        <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                             -
                        </th>
                        <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                             -
                        </th>
                        <th class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                             -
                        </th>
                    </tr>
                @else
                     @foreach ($bienes as $bien)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-black" align="center" >
                                {{$bien->tipo->Tdescriocion_tipo}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-black" align="center" >
                                {{$bien->UK_Hardware_Codigo}}
                            </th>
                            @if ($bien->estado->UK_Descripcion_estado== 'Activo')
                                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap  text-blue-600" align="center" >
                                    {{$bien->estado->UK_Descripcion_estado}}
                                </th>
                            @else
                                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-red-600" align="center" >
                                    {{$bien->estado->UK_Descripcion_estado}}
                                </th>
                                
                            @endif
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                {{$bien->area->UK_Nombre_area}}
                                
                            </th>
                            {{-- reparacion --}}
                            @if ( $bien->FK_Hardware_EstadoId == 1)
                                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra" align="center" >
                                    <a href="/admin/comentario/creacion/{{$bien->UK_Hardware_Codigo}}" class="text-black"   >
                                        <span class="w-6 h-6 inline-flex justify-center items-center">
                                            <i class="fa-solid fa-wrench"></i>
                                        </span>
                                    </a>
                                </th>
                                
                            @else
                                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-black" align="center" >
                                    -
                                </th>                           
                            @endif
                            {{-- bajar o activar--}}
                            @if ( $bien->FK_Hardware_EstadoId == 1)
                                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra" align="center" >
                                    <a href="/admin/baja/creacion/{{$bien->UK_Hardware_Codigo}}" class="text-red-500" >
                                        <span class="w-6 h-6 inline-flex justify-center items-center">
                                            <i class="fa-solid fa-circle-down"></i>
                                        </span>
                                    </a>
                                </th>
                            @else
                            {{-- activar --}}
                                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-black" align="center" >
                                    <a href="/admin/revercion/creacion/{{$bien->PK_Hardware}}" class="text-blue-600 dark:text-blue-500" >
                                        <span class="w-6 h-6 inline-flex justify-center items-center">
                                            <i class="fa-solid fa-circle-up"></i>
                                        </span>
                                    </a>
                                </th>                           
                            @endif

                            {{-- detalle --}}
                            <td class="px-6 py-4"align="center" >
                                {{-- cifrado --}}
                                @php
                                    $idCifrado = Crypt::encryptString($bien->PK_Hardware);
                                @endphp
                                <a href="{{url('/admin/buscar/'.$idCifrado)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                
                                
                                {{-- <a href="/admin/buscar/{{$bien->PK_Hardware}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detalle</a> --}}
                            
                            </td>
                        </tr>
                        
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>



    <br>
    {{-- <div class="flex justify-center mt-4">
        {{ $bienes->links('pagination::tailwind') }}
    </div>        --}}
    <!-- Previous Button -->
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
            {{-- Total: {{$cantidad}} --}}
        </div>

    </div>
    @push('js')
            <script>
                document.querySelectorAll('input[name="busqueda"]').forEach(function(radio) {
                    radio.addEventListener('change', function() {
                    // ocultar todos los inputs
                    document.getElementById('conCodigo').style.display = 'none';
                    document.getElementById('sinCodigo').style.display = 'none';
                    

                    // mostrar solo el correspondiente
                    if (this.value === '1') {
                        document.getElementById('conCodigo').style.display = 'block';
                        document.getElementById('radios').style.display = 'block';
                        
                    } else if (this.value === '2') {
                        document.getElementById('sinCodigo').style.display = 'block';
                        document.getElementById('radios').style.display = 'block';
                        
                    }
                    });
                });
            </script>


            <script>
            let input = document.getElementById('conCode');

            document.querySelectorAll('input[name="busqueda"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    let input = document.getElementById('conCode');
                    if (this.value === '2') {
                        input.style.display = 'block'; // mostrar
                    } else {
                        input.style.display = 'none';  // ocultar
                    }
                });
            });
            </script>
            <script>
                $(document).ready(function() {
                    $('#miSelect-area').select2({
                    placeholder: "Seleccioné un área",
                    allowClear: true
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#miSelect-tipo').select2({
                    placeholder: "Seleccioné un tipo",
                    allowClear: true
                    });
                });
            </script>
            
        @endpush
    

    

    
</x-admin-layout>