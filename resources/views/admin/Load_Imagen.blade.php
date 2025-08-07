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
        'name'=> 'Ingresar Imagen',
    ]
    ]">
   <H2>Ingresar Imagen del bien</H2>

    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @endpush

   

    {{-- imagen --}}
    <div class="mb-4" >
       
        <form action="{{ route('adminbien.dropzone')}}" class="dropzone" id="my-dropzone" method="POST" enctype="multipart/form-data">
        @csrf
        
    </div>
    <div>
        <h2>
            *Este campo No es Obligatorio
        </h2>
    </div>

    @push('js')
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <script>
            Dropzone.options.myDropzone = {
                success: function(file, response) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Bien hecho!',
                        text: response.message
                    });
                    
                },

                error: function(file, response) {
                    let message = response;

                    // Si es un objeto (como un JSON), extrae el mensaje
                    if (typeof response === "object" && response.error) {
                        message = response.error;
                    } else if (typeof response === "object") {
                        message = response.message || "Error desconocido";
                    }

                    // Mostrar en Dropzone visualmente
                    file.previewElement.classList.add("dz-error");
                    const _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                    for (let i = 0, len = _ref.length; i < len; i++) {
                        _ref[i].textContent = message;
                    }

                    // También mostrar con SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: '¡Ups!',
                        text: message
                    });
                    
                }
                //limitaciones
                dictDefaultMessage: "Arraste una imagen al recuadro para subirlo",
                acceptedFiles : "image/*",



            };
        </script>                                
    @endpush
    
</x-admin-layout>