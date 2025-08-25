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
        'name'=> 'Exportar',
    ]
    ]"> 

   
   <div class="grid gap-6 mb-4 md:grid-cols-2" id="radios">
        <div style="width:180px; height:500px; background:white; border:3px solid black; border-radius:50px;">
   
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                {{-- agregar tipo de bien --}}
                <div class="flex items-center mb-4">
                    <input id="default-radio-1" type="radio" value="1" name="ingresar" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Agregar Tipo de Bien</label> 
                </div>
                <br>
                <br>
                {{-- agregar tipo de sistema --}}
                <div class="flex items-center mb-4 ">
                    <input  id="default-radio-2" type="radio" value="2" name="ingresar" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label  for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Agregar Sistema</label>
                </div>
                
               
                
            </div>
        </div>
        
        <div class="flex justify-center" id="agrBien" style="display: none;">
            {{-- formulario para agregar tipo --}}
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
            {{-- formulario para agregar sistema --}}
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
        
        


    </div> 

    @push('js')
        <script>
            document.querySelectorAll('input[name="pedido"]').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                // ocultar todos los inputs
                // document.getElementById('conFecha').style.display = 'none';
                // document.getElementById('sinFecha').style.display = 'none';
                

                // mostrar solo el correspondiente
                if (this.checked) {
                    document.getElementById('conFecha').style.display = 'block';
                    document.getElementById('sinFecha').style.display = 'none';
                } 
                else{
                    document.getElementById('sinFecha').style.display = 'block';
                    document.getElementById('conFecha').style.display = 'none';
                }
                });
            });
        </script>
        
    @endpush
    

    
</x-admin-layout>