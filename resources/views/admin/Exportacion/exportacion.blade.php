{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Exportacion"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
    [
        'name'=> 'Prueba',
    ]
    ]"> 

   <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="area-tab" data-tabs-target="#area" type="button" role="tab" aria-controls="area" aria-selected="true">
            Área
            </button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="hardware-tab" data-tabs-target="#hardware" type="button" role="tab" aria-controls="hardware" aria-selected="false">
            Tipo de Hardware
            </button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="sistema-tab" data-tabs-target="#sistema" type="button" role="tab" aria-controls="sistema" aria-selected="false">
            Tipo de Sistema
            </button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="usuario-tab" data-tabs-target="#usuario" type="button" role="tab" aria-controls="usuario" aria-selected="false">
            Usuarios
            </button>
        </li>
        
    </ul>

    <div id="myTabContent">
        {{-- area --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="area" role="tabpanel" aria-labelledby="area-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">Formulario de Área</p>
            <form class="max-w-sm mx-auto" action="{{route('adminarea.store')}}" method="POST"  >
                @csrf
                
                <div class="grid gap-6 mb-4 md:grid-cols-2">
                    <div>
                        {{-- <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresar Area:</label> --}}
                        <input name="UK_Nombre_area" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa àrea" required />
                        @error('UK_Nombre_area')
                            <p class="text-red-600">*{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Agregar <i class="fa-solid fa-plus"></i></button>
                    </div>


                </div>

            </form>
            <p class="text-sm text-gray-500 dark:text-gray-400">Áreas</p>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Numero
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Área
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Eliminar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($areas as $area)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$area->PK_area}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$area->UK_Nombre_area}}
                                </td>
                                @if ($area->Nestado_area==1)
                                    <td class="px-6 py-4">
                                        Activo
                                    </td>
                                @else
                                    <td class="px-6 py-4">
                                        No activo
                                    </td>
                                @endif
                                @if ($area->Nestado_area==1)
                                    <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra">
                                        <form action="{{route('adminarea.edit',$area->PK_area)}}" method="GET" class="delete-form-area">
                                            @csrf
                                            <button>
                                                <span class="w-6 h-6 inline-flex justify-center items-center">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </span>
                                            </button>

                                        </form>
                                        
                                    </th>
                                    
                                @else
                                    <td class="px-6 py-4">
                                        -
                                    </td>
                                @endif                                
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            {{$areas->links()}}







        </div>
        {{-- tipo --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="hardware" role="tabpanel" aria-labelledby="hardware-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">Formulario de tipo de hardware</p>
            <form class="max-w-sm mx-auto" action="{{route('admintipos.store')}}" method="POST" >   
                @csrf
                <div class="grid gap-6 mb-4 md:grid-cols-2">
                    <div class="mb-5">
                        {{-- <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresar Nombre:</label> --}}
                        <input name="Tdescriocion_tipo" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa hardware" required />
                    </div>
                    <div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Agregar <i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
            </form>
            <p class="text-sm text-gray-500 dark:text-gray-400">Tipos de hardwares</p>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Numero
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipo de Hardware
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Eliminar
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipos as $tipo)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$tipo->PK_tipo}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$tipo->Tdescriocion_tipo}}
                                </td>
                                @if ($tipo->Nestado_tipo==1)
                                    <td class="px-6 py-4">
                                        Activo
                                    </td>
                                @else
                                    <td class="px-6 py-4">
                                        No activo
                                    </td>
                                @endif
                                @if ($tipo->Nestado_tipo==1)
                                    <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra">
                                        <form action="{{route('admintipos.edit',$tipo->PK_tipo)}}" method="GET" class="delete-form-hardware">
                                            @csrf
                                            <button>
                                                <span class="w-6 h-6 inline-flex justify-center items-center">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </span>
                                            </button>

                                        </form>
                                        
                                    </th>
                                    
                                @else
                                    <td class="px-6 py-4">
                                        -
                                    </td>
                                @endif 
                                
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            {{-- {{$tipos->links()}} --}}




        </div>


        {{-- sistemas --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="sistema" role="tabpanel" aria-labelledby="sistema-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">Formulario de tipo de sistema</p>
            <form class="max-w-sm mx-auto" action="{{route('adminsistemas.store')}}" method="POST" >
                @csrf
                <div class="grid gap-6 mb-4 md:grid-cols-2">
                    <div class="mb-5">
                        {{-- <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresar Nombre:</label> --}}
                        <input name="Tdescripcion_sistema" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa sistema" required />    
                    </div>
                    <div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Agregar <i class="fa-solid fa-plus"></i> </button>
                    </div>
                </div>
            </form>




            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Numero
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipo de Sistema
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Eliminar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sistemas as $sistema)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$sistema->PK_sistema}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$sistema->Tdescripcion_sistema}}
                                </td>
                                @if ($sistema->Testado_sistema==1)
                                    <td class="px-6 py-4">
                                        Activo
                                    </td>
                                @else
                                    <td class="px-6 py-4">
                                        No activo
                                    </td>
                                @endif
                                @if ($sistema->Testado_sistema==1)
                                    <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra">
                                        <form action="{{route('adminsistemas.edit',$sistema->PK_sistema)}}" method="GET" class="delete-form-sistema">
                                            @csrf
                                            <button>
                                                <span class="w-6 h-6 inline-flex justify-center items-center">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </span>
                                            </button>

                                        </form>
                                        
                                    </th>
                                    
                                @else
                                    <td class="px-6 py-4">
                                        -
                                    </td>
                                @endif 
                                
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            {{-- {{$tipos->links()}} --}}




        </div>
        {{-- usuarios --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="usuario" role="tabpanel" aria-labelledby="usuario-tab">
            {{-- <p class="text-sm text-gray-500 dark:text-gray-400">Formulario para creaciòn de usuario:</p> --}}

            <!-- Botón que cambia -->
            <div class="flex justify-end">
                <button type="button" 
                        onclick="
                            document.getElementById('formulario').classList.remove('hidden');
                            document.getElementById('inputInicial').classList.add('hidden');
                        " 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Agregar usuario
                </button>
            </div>

            <!-- Formulario oculto -->
            <div id="formulario" class="hidden mt-4 p-4 border rounded-lg shadow bg-white">
                <div class="flex justify-end">
                    <button type="button" 
                                onclick="
                                    document.getElementById('formulario').classList.add('hidden');
                                    document.getElementById('inputInicial').classList.remove('hidden');
                                "
                                class="ml-2 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                            Regresar
                        </button>
                </div>
                <form class="max-w-md mx-auto" action="{{route('adminusuario.store')}}" method="POST" > 
                    @csrf
                    <div class="grid md:grid-cols-2 md:gap-6">
                        {{-- email --}}
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="email" name="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Correo electronico</label>
                        </div>
                        {{-- permisos --}}
                        <div class="grid gap-6 mb-4 md:grid-cols-3" id="radios">
                            <div class="flex items-center">
                                <input id="default-radio-1" type="radio" value="nivel1" name="permiso" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Nivel 1</label> 
                            </div>
                            <div class="flex items-center">
                                <input  id="default-radio-2" type="radio" value="nivel2" name="permiso" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label  for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Nivel 2</label>
                            </div>
                            <div class="flex items-center">
                                <input  id="default-radio-2" type="radio" value="nivel3" name="permiso" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label  for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Nivel 3</label>
                            </div>
                            @error('permiso')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                            
                        </div>
                        
                    </div>

                    <div class="grid md:grid-cols-2 md:gap-6">
                        
                        <div class="relative z-0 w-full mb-5 group">
                            {{-- contraseña --}}
                            <input type="password" name="password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contraseña</label>
                        </div>

                        <div class="relative z-0 w-full mb-5 group">
                            {{-- confirmar contraseña --}}
                            <input type="password" name="password_confirmation" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmar contraseña</label>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            {{-- nombre --}}
                            <input type="text" name="name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            {{-- apellido --}}
                            <input type="text" name="apellido" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Apellido</label>
                        </div>
                    </div>
                    <div class="flex justify-center mt-4">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>
                    </div>
                    
                </form>
            </div>
            <!-- Input que está desde el inicio -->
            <div id="inputInicial" class="mb-4">
                {{-- tabla --}}
                <br>
                <p class="text-sm text-gray-500 dark:text-gray-400">Usuarios</p>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Numero
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Eliminar
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$user->id}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$user->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$user->email}}
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra">
                                        <form action="/admin/eliminar/usuario/{{$user->id}}" method="POST" class="delete-form-usuario">
                                            @csrf
                                            <button>
                                                <span class="w-6 h-6 inline-flex justify-center items-center">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </span>
                                            </button>
    
                                        </form>
                                        
                                    </th>
    
                                   
                                    
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                {{-- {{$tipos->links()}} --}}
            </div>















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
        //que seleciona todos esos formularios que tengan ese nombre de delete-form-area 
            forms = document.querySelectorAll('.delete-form-area')
            //que recorra todos los formularios
            forms.forEach(form => {
                //que se ponga al escucha de ese formulario con el evento submit
                form.addEventListener('submit',function(e){ //e es el evento en si
                    //previne el evento 
                    e.preventDefault('');
                        Swal.fire({
                            title: "Eliminar esta àrea?",
                            text: "No podras revertir esto!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, eliminar àrea",
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
        //que seleciona todos esos formularios que tengan ese nombre de delete-form-area 
            forms = document.querySelectorAll('.delete-form-hardware')
            //que recorra todos los formularios
            forms.forEach(form => {
                //que se ponga al escucha de ese formulario con el evento submit
                form.addEventListener('submit',function(e){ //e es el evento en si
                    //previne el evento 
                    e.preventDefault('');
                        Swal.fire({
                            title: "Eliminar esta tipo de hardware?",
                            text: "No podras revertir esto!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, eliminar hardware",
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
        //que seleciona todos esos formularios que tengan ese nombre de delete-form-area 
            forms = document.querySelectorAll('.delete-form-sistema')
            //que recorra todos los formularios
            forms.forEach(form => {
                //que se ponga al escucha de ese formulario con el evento submit
                form.addEventListener('submit',function(e){ //e es el evento en si
                    //previne el evento 
                    e.preventDefault('');
                        Swal.fire({
                            title: "Eliminar esta tipo de sistema?",
                            text: "No podras revertir esto!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, eliminar sistema",
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
        //que seleciona todos esos formularios que tengan ese nombre de delete-form-area 
            forms = document.querySelectorAll('.delete-form-usuario')
            //que recorra todos los formularios
            forms.forEach(form => {
                //que se ponga al escucha de ese formulario con el evento submit
                form.addEventListener('submit',function(e){ //e es el evento en si
                    //previne el evento 
                    e.preventDefault('');
                        Swal.fire({
                            title: "Eliminar esta usuario",
                            text: "No podras revertir esto!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, eliminar usuario",
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