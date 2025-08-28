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
    ]
    ]"> 

    <div class="grid gap-6 mb-4 md:grid-cols-2" id="radios" >
        {{-- buscar metodo --}}
        <div class="flex items-center mb-4">
            <input id="default-radio-1" type="radio" value="1" name="busqueda" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Buscar con Codido</label> 
        </div>
        <div class="flex items-center">
            <input  id="default-radio-2" type="radio" value="2" name="busqueda" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label  for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Buscar sin Codigo</label>
        </div>
        @error('busqueda')
            <p class="text-red-600">*{{$message}}</p>
        @enderror
        
    </div>
   

    <div class="flex justify-center" id="sinCodigo" style="display: none;">
        {{-- formulario SIN CODIGO --}}
        
            <form method="POST" action="/admin/buscar/todo" >
                @csrf
                <input type="text" name="form" value="2" class="hidden">  
                 <div class="grid gap-6 mb-4 md:grid-cols-2">
        
                    <div>
                        {{-- tipo de bien --}}
                        <label for="tipos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de Hardware</label>
                              <select name="FK_Hardware_TipoId" id="tipos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($tipos as $tipo)
                              
                                @if ($tipo->PK_tipo != 1)
                                    <option value="{{{$tipo->PK_tipo}}}">{{{$tipo->Tdescriocion_tipo}}}</option>
                                @endif
        
                            @endforeach
                      </select>
                    </div>
                    <div>
                        {{-- area --}}
                            <div>
                                <label for="areas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Elige un area</label>
                                <select name="FK_Hardware_AreaId" id="areas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($areas as $area)
                                        <option value="{{$area->PK_area}}">{{$area->UK_Nombre_area}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                    </div>
                    
                    
                    
                </div>   
                
                <div class=" flex justify-center mt-4">
                    <input checked id="default-radio-1" type="radio" value="1" name="estado" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Activo</label>
                    <span class="text-white" >---</span>
                    <input  id="default-radio-2" type="radio" value="0" name="estado" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Inactivo</label>
                </div>
               
        
                <div class="flex justify-center mt-4">
                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" type="submit">
                    Buscar
                    </button>            
                </div>    
            </form>
    </div>


    <div class="flex justify-center" id="conCodigo" style="display: none;">
        {{-- formulario CON CODIGO --}}
        <form class="max-w-sm mx-auto" action="/admin/buscar/todo/code" method="POST" >
            @csrf
            <input type="text" name="form" value="1" class="hidden">  
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div class="mb-5">
                    {{-- <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresar codigo</label> --}}
                    <input name="UK_Hardware_Codigo" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa el Codigo del Bien" required />
                </div>
                <div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <h3>Bienes</h3>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="table-hardware">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tipo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Codigo Patrimonial
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Activo/Baja
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Area
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Reparar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bajar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Detalle
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bienes as $bien)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                            {{$bien->tipo->Tdescriocion_tipo}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                            {{$bien->UK_Hardware_Codigo}}
                        </th>
                        @if ($bien->estado->UK_Descripcion_estado== 'Activo')
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap  text-blue-600">
                                {{$bien->estado->UK_Descripcion_estado}}
                            </th>
                        @else
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-red-600">
                                {{$bien->estado->UK_Descripcion_estado}}
                            </th>
                            
                        @endif
                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                            {{$bien->area->UK_Nombre_area}}
                            
                        </th>
                        {{-- reparacion --}}
                        @if ( $bien->FK_Hardware_EstadoId == 1)
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra">
                                <a href="/admin/comentario/creacion/{{$bien->UK_Hardware_Codigo}}" class="text-black" >
                                    <span class="w-6 h-6 inline-flex justify-center items-center">
                                        <i class="fa-solid fa-wrench"></i>
                                    </span>
                                </a>
                            </th>
                            
                        @else
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                -
                            </th>                           
                        @endif
                        {{-- bajar o activar--}}
                        @if ( $bien->FK_Hardware_EstadoId == 1)
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra">
                                <a href="/admin/baja/creacion/{{$bien->UK_Hardware_Codigo}}" class="text-red-500" >
                                    <span class="w-6 h-6 inline-flex justify-center items-center">
                                        <i class="fa-solid fa-circle-down"></i>
                                    </span>
                                </a>
                            </th>
                        @else
                        {{-- activar --}}
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                                <a href="/admin/revercion/creacion/{{$bien->PK_Hardware}}" class="text-blue-600 dark:text-blue-500" >
                                    <span class="w-6 h-6 inline-flex justify-center items-center">
                                        <i class="fa-solid fa-circle-up"></i>
                                    </span>
                                </a>
                            </th>                           
                        @endif

                        {{-- detalle --}}
                        <td class="px-6 py-4">
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
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-4">
        {{-- para la paginacion --}}
        {{ $bienes->links('pagination::tailwind') }}
    </div>   
    
    <!-- Previous Button -->
   
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
        
    @endpush

    

    
</x-admin-layout>