{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Mas"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
    [
        'name'=> 'Mas',
    ]
    ]"> 

   <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="sede-tab" data-tabs-target="#sede" type="button" role="tab" aria-controls="sede" aria-selected="true">
            Sedes
            </button>
        </li>

        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="area-tab" data-tabs-target="#area" type="button" role="tab" aria-controls="area" aria-selected="false">
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
        {{-- sede --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="sede" role="tabpanel" aria-labelledby="sede-tab">
            <div class="mb-4 flex justify-end " >
                <button data-modal-target="default-modal-sede" data-modal-toggle="default-modal-sede" class=" block  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 " type="button">
                    Agregar sede
                </button>
            </div>



            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3" align="center" >
                                Numero
                            </th>
                            <th scope="col" class="px-6 py-3" align="center" >
                                Sede
                            </th>
                            <th scope="col" class="px-6 py-3" align="center" >
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3" align="center" >
                                Deshabilitar / Habilitar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sedes as $sede)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center" >
                                    {{$sede->PK_sede}}
                                </th>
                                <td class="px-6 py-4" align="center" >
                                    {{$sede->UK_Nombre_sede}}
                                </td>
                                @if ($sede->Nestado_sede==1)
                                    <td class="px-6 py-4 text-blue-600 dark:text-blue-500 " align="center" >
                                        Activo
                                    </td>
                                @else
                                    <td class="px-6 py-4 text-red-500 " align="center" >
                                        No activo
                                    </td>
                                @endif
                                @if ($sede->Nestado_sede==1)
                                    <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra text-red-500" align="center"  >
                                        <form action="{{route('adminsedes.disable',$sede->PK_sede)}}" method="GET" class="delete-form-sede">
                                            @csrf
                                            <button>
                                                <span class="w-6 h-6 inline-flex justify-center items-center">
                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                </span>
                                            </button>

                                        </form>
                                        
                                    </th>
                                    
                                @else
                                    <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra text-blue-600 dark:text-blue-500" align="center"  >
                                        <form action="{{route('adminsedes.habilitar',$sede->PK_sede)}}" method="GET" class="activate-form-sede">
                                            @csrf
                                            <button>
                                                <span class="w-6 h-6 inline-flex justify-center items-center">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </span>
                                            </button>

                                        </form>
                                        
                                    </th>
                                @endif                                
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>







        </div>




        {{-- area --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="area" role="tabpanel" aria-labelledby="area-tab">
            <div class="mb-4 flex justify-end " >
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class=" block  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 " type="button">
                    Agregar Área
                </button>
            </div>
            
            <p class="text-sm text-gray-500 dark:text-gray-400">Áreas</p>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3" align="center" >
                                Numero
                            </th>
                            <th scope="col" class="px-6 py-3" align="center" >
                                Área
                            </th>
                            <th scope="col" class="px-6 py-3" align="center" >
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3" align="center" >
                                Deshabilitar / Habilitar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($areas as $area)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center" >
                                    {{$area->PK_area}}
                                </th>
                                <td class="px-6 py-4" align="center" >
                                    {{$area->UK_Nombre_area}}
                                </td>
                                @if ($area->Nestado_area==1)
                                    <td class="px-6 py-4 text-blue-600 dark:text-blue-500 " align="center" >
                                        Activo
                                    </td>
                                @else
                                    <td class="px-6 py-4 text-red-500 " align="center" >
                                        No activo
                                    </td>
                                @endif
                                @if ($area->Nestado_area==1)
                                    <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra text-red-500" align="center"  >
                                        <form action="{{route('adminarea.edit',$area->PK_area)}}" method="GET" class="delete-form-area">
                                            @csrf
                                            <button>
                                                <span class="w-6 h-6 inline-flex justify-center items-center">
                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                </span>
                                            </button>

                                        </form>
                                        
                                    </th>
                                    
                                @else
                                    <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra text-blue-600 dark:text-blue-500" align="center"  >
                                        <form action="{{route('adminarea.show',$area->PK_area)}}" method="GET" class="activate-form-area">
                                            @csrf
                                            <button>
                                                <span class="w-6 h-6 inline-flex justify-center items-center">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </span>
                                            </button>

                                        </form>
                                        
                                    </th>
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
            
            <div class="mb-4 flex justify-end " >
                <button data-modal-target="default-modal-hardware" data-modal-toggle="default-modal-hardware" class=" block  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 " type="button">
                    Agregar hardware
                </button>
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-400">Tipos de hardwares</p>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3" align="center" >
                                Numero
                            </th>
                            <th scope="col" class="px-6 py-3" align="center" >
                                Tipo de Hardware
                            </th>
                            <th scope="col" class="px-6 py-3" align="center" >
                                Estado
                            </th>
                             <th scope="col" class="px-6 py-3" align="center" >
                                Deshabilitar / Habilitar
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipos as $tipo)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center" >
                                    {{$tipo->PK_tipo}}
                                </th>
                                <td class="px-6 py-4" align="center" >
                                    {{$tipo->Tdescriocion_tipo}}
                                </td>
                                @if ($tipo->Nestado_tipo==1)
                                    <td class="px-6 py-4 text-blue-600 dark:text-blue-500 " align="center" >
                                        Activo
                                    </td>
                                @else
                                    <td class="px-6 py-4 text-red-500" " align="center" >
                                        No activo
                                    </td>
                                @endif
                                @if ($tipo->Nestado_tipo==1)
                                   <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra text-red-500" align="center"  >
                                        <form action="{{route('admintipos.edit',$tipo->PK_tipo)}}" method="GET" class="delete-form-hardware">
                                            @csrf
                                            <button>
                                                <span class="w-6 h-6 inline-flex text-red-500 justify-center items-center">
                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                </span>
                                            </button>

                                        </form>
                                        
                                    </th>
                                    
                                @else
                                   <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra text-blue-600 dark:text-blue-500" align="center"  >
                                       <form action="{{route('admintipos.show',$tipo->PK_tipo)}}" method="GET" class="activate-form-tipo">
                                           @csrf
                                           <button>
                                               <span class="w-6 h-6 inline-flex justify-center items-center">
                                                   <i class="fa-solid fa-circle-check"></i>
                                               </span>
                                           </button>
                                       </form>
                                        
                                    </th>
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

            <div class="mb-4 flex justify-end " >
                <button data-modal-target="default-modal-sistema" data-modal-toggle="default-modal-sistema" class=" block  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 " type="button">
                    Agregar Sistema
                </button>
            </div>

            {{-- <p class="text-sm text-gray-500 dark:text-gray-400">Formulario de tipo de sistema</p>
             --}}




            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3" align="center" >
                                Numero
                            </th>
                            <th scope="col" class="px-6 py-3" align="center" >
                                Tipo de Sistema
                            </th>
                            <th scope="col" class="px-6 py-3" align="center" >
                                Estado
                            </th>
                             <th scope="col" class="px-6 py-3" align="center" >
                                Deshabilitar / Habilitar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sistemas as $sistema)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center" >
                                    {{$sistema->PK_sistema}}
                                </th>
                                <td class="px-6 py-4" align="center" >
                                    {{$sistema->Tdescripcion_sistema}}
                                </td>
                                @if ($sistema->Testado_sistema==1)
                                    <td class="px-6 py-4 text-blue-600 dark:text-blue-500  " align="center" >
                                        Activo
                                    </td>
                                @else
                                    <td class="px-6 py-4 text-red-500 " align="center" >
                                        No activo
                                    </td>
                                @endif
                                @if ($sistema->Testado_sistema==1)
                                    <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra" align="center" >
                                        <form action="{{route('adminsistemas.edit',$sistema->PK_sistema)}}" method="GET" class="delete-form-sistema">
                                            @csrf
                                            <button>
                                                <span class="w-6 h-6 inline-flex justify-center items-center text-red-500" >
                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                </span>
                                            </button>

                                        </form>
                                        
                                    </th>
                                    
                                @else
                                    <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra text-blue-600 dark:text-blue-500" align="center"  >
                                       <form action="{{route('adminsistemas.show',$sistema->PK_sistema)}}" method="GET" class="activate-form-sistema">
                                           @csrf
                                           <button>
                                               <span class="w-6 h-6 inline-flex justify-center items-center">
                                                   <i class="fa-solid fa-circle-check"></i>
                                               </span>
                                           </button>
                                       </form>
                                        
                                    </th>
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
                            {{-- lastname --}}
                            <input type="text" name="lastname" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">lastname</label>
                        </div>
                    </div>
                    
                    <div class="flex justify-center mt-4">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>
                    </div>
                    
                </form>
                <br>
                {{-- aca mensaje de permisos --}}
                
                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert" id="permiso1" style="display: none;">
                    
                    <span class="sr-only">Info</span>
                    <div>
                        <i class="fa-solid fa-eye"></i> <span class="font-medium">Permiso 1!</span> Registra, edita, visualiza, da de baja y reverte baja a cualquier tipo de bien, realiza reparaciones y acceso total a la sección Mas.
                    </div>
                </div>

                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert" id="permiso2" style="display: none;">
                    
                    <span class="sr-only">Info</span>
                    <div>
                        <i class="fa-solid fa-eye"></i> <span class="font-medium">Permiso 2!</span> Registra, edita, visualiza, da de baja y reverte baja a cualquier tipo de bien, realiza reparaciones.
                    </div>
                </div>

                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert" id="permiso3" style="display: none;">
                    
                    <span class="sr-only">Info</span>
                    <div>
                        <i class="fa-solid fa-eye"></i> <span class="font-medium">Permiso 3!</span> Solo registrar y visualiza cualquier tipo de bien, registra y realiza reparaciones.
                    </div>
                </div>

                
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
                                <th scope="col" class="px-6 py-3" align="center" >
                                    Numero
                                </th>
                                <th scope="col" class="px-6 py-3" align="center" >
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3" align="center" >
                                    Apellido
                                </th>
                                <th scope="col" class="px-6 py-3" align="center" >
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3" align="center" >
                                    Eliminar
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center" >
                                        {{$user->id}}
                                    </th>
                                    <td class="px-6 py-4" align="center" >
                                        {{$user->name}}
                                    </td>
                                    <td class="px-6 py-4" align="center" >
                                        {{$user->lastname}}
                                    </td>
                                    <td class="px-6 py-4" align="center" >
                                        {{$user->email}}
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium  whitespace-nowra" align="center" >
                                        <form action="/admin/eliminar/usuario/{{$user->id}}" method="POST" class="delete-form-usuario">
                                            @csrf
                                            <button>
                                                <span class="w-6 h-6 inline-flex justify-center items-center text-red-500 ">
                                                    <i class="fa-solid fa-circle-xmark"></i>
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








    {{-- modals --}}
    <div id="default-modal-sede" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                        AGREGAR SEDE
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-black" data-modal-hide="default-modal-sede">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                   </button>
                </div>
                <div class="mb-4" >
                    <!-- Modal body y formulario -->
                    <form class="max-w-sm mx-auto" action="{{route('adminsedes.store')}}" method="POST"  >
                        @csrf
                        <div>
                            <br>
                            <input type="text" name="Nubicacion_sede" value="2" hidden >
                            <input name="UK_Nombre_sede" type="sede" id="sede" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" maxlength="105" placeholder="Ingresa sede" required />
                            @error('UK_Nombre_sede')
                                <p class="text-red-600">*{{$message}}</p>
                            @enderror
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Agregar <i class="fa-solid fa-plus"></i></button>
                            <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-black dark:hover:bg-gray-700">Cancelar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- modal de area --}}
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                        AGREGAR ÀREA
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-black" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                   </button>
                </div>
                <div class="mb-4" >
                    <!-- Modal body y formulario -->
                    <form class="max-w-sm mx-auto" action="{{route('adminarea.store')}}" method="POST"  >
                        @csrf
                        <div>
                            <br>
                            
                            <input name="UK_Nombre_area" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" maxlength="105" placeholder="Ingresa àrea" required />
                            @error('UK_Nombre_area')
                                <p class="text-red-600">*{{$message}}</p>
                            @enderror
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Agregar <i class="fa-solid fa-plus"></i></button>
                            <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-black dark:hover:bg-gray-700">Cancelar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- modals de hadrware --}}
    <div id="default-modal-hardware" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                        AGREGAR HARDWARE
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-black" data-modal-hide="default-modal-hardware">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                   </button>
                </div>
                <div class="mb-4" >
                    <!-- Modal body y formulario -->
                   <form class="max-w-sm mx-auto" action="{{route('admintipos.store')}}" method="POST" >   
                        @csrf
                        <br>
                        <div>
                            <input name="Tdescriocion_tipo" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" maxlength="25" placeholder="Ingresa hardware" required />
                            @error('Tdescriocion_tipo')
                                <p class="text-red-600">*{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Agregar <i class="fa-solid fa-plus"></i></button>
                            <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-black dark:hover:bg-gray-700">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modals de sistema --}}
    <div id="default-modal-sistema" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                        AGREGAR SISTEMA
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-black" data-modal-hide="default-modal-sistema">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                   </button>
                </div>
                <div class="mb-4" >
                    <!-- Modal body y formulario -->
                    <form class="max-w-sm mx-auto" action="{{route('adminsistemas.store')}}" method="POST" >
                        @csrf 
                        <br>
                        <div>
                            <input name="Tdescripcion_sistema" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" maxlength="25" placeholder="Ingresa sistema" required />
                            @error('Tdescripcion_sistema')
                                <p class="text-red-600">*{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Agregar <i class="fa-solid fa-plus"></i></button>
                            <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-black dark:hover:bg-gray-700">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @push('js')
        <script>
        //que seleciona todos esos formularios que tengan ese nombre de delete-form-area 
            forms = document.querySelectorAll('.delete-form-sede')
            //que recorra todos los formularios
            forms.forEach(form => {
                //que se ponga al escucha de ese formulario con el evento submit
                form.addEventListener('submit',function(e){ //e es el evento en si
                    //previne el evento 
                    e.preventDefault('');
                        Swal.fire({
                            title: "Deshabilitar  esta sede?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, Deshabilitar  sede",
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
            forms = document.querySelectorAll('.activate-form-sede')
            //que recorra todos los formularios
            forms.forEach(form => {
                //que se ponga al escucha de ese formulario con el evento submit
                form.addEventListener('submit',function(e){ //e es el evento en si
                    //previne el evento 
                    e.preventDefault('');
                        Swal.fire({
                            title: "Habilitar esta sede?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, habilitar sede",
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
            document.querySelectorAll('input[name="permiso"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                // ocultar todos los inputs
                
                document.getElementById('permiso1').style.display = 'none';
                document.getElementById('permiso2').style.display = 'none';
                document.getElementById('permiso3').style.display = 'none';
                

                // mostrar solo el correspondiente
                if (this.value === 'nivel1') {
                    document.getElementById('permiso1').style.display = 'block';
                    document.getElementById('radios').style.display = 'block';
                    
                } else if (this.value === 'nivel2') {
                    document.getElementById('permiso2').style.display = 'block';
                    document.getElementById('radios').style.display = 'block';
                    
                }
                else if (this.value === 'nivel3') {
                    document.getElementById('permiso3').style.display = 'block';
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
                            title: "Deshabilitar  esta àrea?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, Deshabilitar  àrea",
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
            forms = document.querySelectorAll('.activate-form-area')
            //que recorra todos los formularios
            forms.forEach(form => {
                //que se ponga al escucha de ese formulario con el evento submit
                form.addEventListener('submit',function(e){ //e es el evento en si
                    //previne el evento 
                    e.preventDefault('');
                        Swal.fire({
                            title: "Habilitar  esta àrea?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, habilitar  àrea",
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
                            title: "Deshabilitar  esta tipo de hardware?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, Deshabilitar  hardware",
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
            forms = document.querySelectorAll('.activate-form-tipo')
            //que recorra todos los formularios
            forms.forEach(form => {
                //que se ponga al escucha de ese formulario con el evento submit
                form.addEventListener('submit',function(e){ //e es el evento en si
                    //previne el evento 
                    e.preventDefault('');
                        Swal.fire({
                            title: "Habilitar  este tipo de hardware?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, habilitar tipo de hardware",
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
                            title: "Deshabilitar  esta tipo de sistema?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, Deshabilitar  sistema",
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
            forms = document.querySelectorAll('.activate-form-sistema')
            //que recorra todos los formularios
            forms.forEach(form => {
                //que se ponga al escucha de ese formulario con el evento submit
                form.addEventListener('submit',function(e){ //e es el evento en si
                    //previne el evento 
                    e.preventDefault('');
                        Swal.fire({
                            title: "Habilitar  este sistema?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, habilitar  sistema",
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
                            title: "Deshabilitar  esta usuario",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, Deshabilitar  usuario",
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