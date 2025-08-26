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
            <form class="max-w-sm mx-auto" action="{{route('adminarea.store')}}" method="POST" >
                @csrf
                
                <div class="grid gap-6 mb-4 md:grid-cols-2">
                    <div>
                        {{-- <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresar Area:</label> --}}
                        <input name="UK_Nombre_area" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa el nombre del Area" required />
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
                        <input name="Tdescriocion_tipo" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa el nombre del bien" required />
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
                        <input name="Tdescripcion_sistema" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa el nombre del Sistema" required />    
                    </div>
                    <div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Agregar <i class="fa-solid fa-plus"></i></button>
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
                                
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            {{-- {{$tipos->links()}} --}}




        </div>
        {{-- usuarios --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="usuario" role="tabpanel" aria-labelledby="usuario-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">Formulario para creaciòn de usuario:</p>

            <form class="max-w-md mx-auto">
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Correo electronico</label>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-3">
                        <button data-popover-target="popover-top" data-popover-placement="top" type="button" class="text-white mb-3 me-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Nivel 1</button>
                        <div data-popover id="popover-top" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Permisos</h3>
                            </div>
                            <div class="px-3 py-2">
                                <p>Agregar, editar , dar de baja y revertir baja de cualquier bien</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
    
                        <button data-popover-target="arriba1-top" data-popover-placement="top" type="button" class="text-white mb-3 me-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Nivel 2</button>
                        <div data-popover id="arriba1-top" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Permisos</h3>
                            </div>
                            <div class="px-3 py-2">
                                <p>And here's some amazing content. It's very engaging. Right?</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
    
                        <button data-popover-target="arriba2-top" data-popover-placement="top" type="button" class="text-white mb-3 me-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Nivel 3</button>
                        <div data-popover id="arriba2-top" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Permisos</h3>
                            </div>
                            <div class="px-3 py-2">
                                <p>And here's some amazing content. It's very engaging. Right?</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                    </div>
                    
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contraseña</label>
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmar contraseña</label>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Apellido</label>
                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>
                </div>
                
            </form>
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
                               
                                
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            {{-- {{$tipos->links()}} --}}







        </div>
    </div>
    
</x-admin-layout>