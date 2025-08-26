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
        'name'=> 'Ingresar',
    ]
    ]"> 

    <br>
    <br>
            
            
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
    
 


        








{{-- 
    
    <div class="grid gap-6 mb-4 md:grid-cols-2" id="radios">
        <div style="width:180px; height:500px; background:white; border:3px solid black; border-radius:50px;">
            <br>
            <br>  
            <br> 
            <div>
                agregar tipo de bien
                <div class="flex items-center mb-4">
                    <input id="default-radio-1" type="radio" value="1" name="ingresar" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Agregar Tipo de Bien</label> 
                </div>
                <br>
                <br>
                agregar tipo de sistema
                <div class="flex items-center mb-4 ">
                    <input  id="default-radio-2" type="radio" value="2" name="ingresar" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label  for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Agregar Sistema</label>
                </div>
                <br>
                <br>
                <br>
                agregar area
                <div class="flex items-center mb-4 ">
                    <input  id="default-radio-2" type="radio" value="3" name="ingresar" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label  for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Agregar Area</label>
                </div>
                <br>
                <br>
                <br>
            
                agregar usuario
                <div class="flex items-center mb-4 ">
                    <input  id="default-radio-2" type="radio" value="4" name="ingresar" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label  for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Agregar Usuario</label>
                </div>
               
                
            </div>
        </div>
        
        <div class="flex justify-center" id="agrBien" style="display: none;">
            formulario para agregar tipo
            <form class="max-w-sm mx-auto" action="{{route('admintipos.store')}}" method="POST" >
                <br>
                <br>    
                @csrf
                <H2>Formulario Para Agregar Tipos de Bienes</H2>
                <br>
                <div class="mb-4">
                    <div class="mb-5">
                        <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresar Nombre:</label>
                        <input name="Tdescriocion_tipo" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa el nombre del bien" required />
                    </div>
                </div>
                <br>
                <br>
                <div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Agregar <i class="fa-solid fa-plus"></i></button>
                </div>
            </form>
        </div>
        <div class="flex justify-center" id="agrSistem" style="display: none;">
            formulario para agregar sistema
            <form class="max-w-sm mx-auto" action="{{route('adminsistemas.store')}}" method="POST" >
                <br>
                <br> 
                @csrf
                <H2>Formulario Para Agregar Sistemas</H2>
                <br>
                <div class="mb-4">
                    <div class="mb-5">
                        <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresar Nombre:</label>
                        <input name="Tdescripcion_sistema" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa el nombre del Sistema" required />
                    </div>
                </div>
                <br>
                <br>
                <div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Agregar <i class="fa-solid fa-plus"></i></button>
                </div>
            </form>
        </div>
        <div class="flex justify-center" id="agrArea" style="display: none;">
            formulario para agregar areas
            <form class="max-w-sm mx-auto" action="{{route('adminarea.store')}}" method="POST" >
                <br>
                <br> 
                @csrf
                <H2>Formulario Para Agregar Area</H2>
                <br>
                <div class="mb-4">
                    <div class="mb-5">
                        <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresar Area:</label>
                        <input name="UK_Nombre_area" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa el nombre del Area" required />
                        @error('UK_Nombre_area')
                            <p class="text-red-600">*{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <br>
                <br>
                <div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Agregar <i class="fa-solid fa-plus"></i></button>
                </div>
            </form>
        </div>
        <div class="flex justify-center" id="agrUsuario" style="display: none;">
            formulario para agregar sistema
            <form class="max-w-sm mx-auto" action="{{route('adminusuario.store')}}" method="POST" > 
                 @csrf
                <H2>Formulario Para Agregar Usuario</H2>
                <br>
                <div class="mb-5">
                        <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresar Nombre:</label>
                        <input name="name" type="codigo" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa el nombre del Usuario" required />
                        @error('name')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingresar Email:</label>
                    <input name="email" type="email" id="email" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="name@flowbite.com" required />
                    @error('email')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingresar Contraseña:</label>
                    <input  name="password" type="password" id="password" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                    @error('password')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar Contraseña:</label>
                    <input name="password_confirmation" type="password" id="repeat-password" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                </div>

                
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
                
                
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear Usuario</button>
            </form>




            
           
            
        </div>
        


    </div> --}}

   
@push('js')
        <script>
            document.querySelectorAll('input[name="ingresar"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                // ocultar todos los inputs
                document.getElementById('agrBien').style.display = 'none';
                document.getElementById('agrSistem').style.display = 'none';
                document.getElementById('agrArea').style.display = 'none';
                document.getElementById('agrUsuario').style.display = 'none';
                

                // mostrar solo el correspondiente
                if (this.value === '1') {
                    document.getElementById('agrBien').style.display = 'block';
                    
                } else if (this.value === '2') {
                    document.getElementById('agrSistem').style.display = 'block';
                }else if (this.value === '3') {
                    document.getElementById('agrArea').style.display = 'block';
                }
                else{
                    document.getElementById('agrUsuario').style.display = 'block';
                }
               

                });
            });
        </script>
        
    @endpush
    

    
</x-admin-layout>