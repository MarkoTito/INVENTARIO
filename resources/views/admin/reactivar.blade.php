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

    <div class="grid gap-6 mb-4 md:grid-cols-2">

        {{-- <div>
            <h3>Codigo: {{$code}}</h3>
        </div> --}}

    </div>

    <form action="/admin/Bajar/revertir/{{$code}}" class="delete-form">
        @csrf
        <div class="p-4 md:p-5 space-y-4">
            <label for="T_Motivo_Activar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Motivo:</label>
            <textarea  name="T_Motivo_Activar" id="T_Motivo_Activar" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escriba el motivo de la reversión de la baja">{{old('T_Motivo_Activar')}}</textarea>
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