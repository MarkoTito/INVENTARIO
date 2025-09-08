{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Activar"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
    [
        'name'=> 'Activar hardware',
    ]
    ]">

    <div class="border-2 border-black rounded-3xl p-6">
         <div class="flex justify-center mb-4" >
            <h3>DATOS DE LA BAJA</h3>
            
        </div>
        <div class="grid gap-6 mb-4 md:grid-cols-2">
           <div>
                {{-- motivo --}}
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Usuario:</label>    
                <input disabled type="text" name="" id="" aria-label="" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$baja->usuarioBaja->name}}" >          
                
            </div>
            <div>
                {{-- fehca --}}
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fecha:</label>    
                <input disabled type="text" name="" id="" aria-label="" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$baja->created_at}}" >          
                
            </div>
    
        </div>
        <div class="mb-4">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Motivo de Baja</label>
            <textarea disabled id="" name="Tdescripcion_hardware" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$baja->Tdescripcion_baja}}</textarea>
    
        </div> 

    </div>

    <form action="/admin/Bajar/revertir/{{$code}}" class="delete-form">
        @csrf
        <input name="PK_baja" type="text" hidden value="{{$baja->PK_Bajas}}">
        <input hidden name="tipo" type="text" value="0">
        <div class="p-4 md:p-5 space-y-4">
            <label for="T_Motivo_Activar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Motivo:</label>
            <textarea required  name="T_Motivo_Activar" id="miTextarea" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escriba el motivo de la reversión de la baja (no mayor a 180 letras)">{{old('T_Motivo_Activar')}}</textarea>
            <p>Letras restantes: <span id="contador">180</span></p>
            @error('T_Motivo_Activar')
                <p class="text-red-600">*{{$message}}</p>
            @enderror                            
        </div>
        <div class="flex justify-center mt-4">
            <button type="submit" 
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Reactivar
            </button>

        </div>

                          
    </form>


   

    @push('js')
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


        <script>
        //que seleciona todos esos formularios que tengan ese nombre de delete-form 
            forms = document.querySelectorAll('.delete-form')
            //que recorra todos los formularios
            forms.forEach(form => {
                //que se ponga al escucha de ese formulario con el evento submit
                form.addEventListener('submit',function(e){ //e es el evento en si
                    //previne el evento 
                    e.preventDefault('');
                        Swal.fire({
                            title: "Reactivar este bien?",
                            text: "",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, activar bien",
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