{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Ingresar imagen"
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
       
        <form action="{{ route('adminbien.dropzone')}}"  class="dropzone"  id="my-dropzone"  method="POST"  enctype="multipart/form-data">
            @csrf
        </form>
    </div>

    @push('js')
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <script>
            Dropzone.options.myDropzone = {
                    maxFiles: 1,
                    acceptedFiles: 'image/*',
                    dictDefaultMessage: "Arrastra una imagen al recuadro para subirla ",
                    maxFilesize :2,

                    success: function(file, response) {
                        Swal.fire({
                            icon: 'success',
                            title: '¡PASO 2 COMPLEADO!',
                            text: response.message
                        });
                        
                    },
                    init: function() {
                        this.on("success", function(file, response) {
                            // Espera un poquito para mostrar el mensaje y luego redirige
                            setTimeout(function() {
                                window.location.href = "{{ route('adminbien.index') }}";
                            }, 1500);
                        });
                    },

                    error: function(file, response) {
                        let message = response;

                        if (typeof response === "object" && response.error) {
                            message = response.error;
                        } else if (typeof response === "object") {
                            message = response.message || "Error desconocido";
                        }

                        file.previewElement.classList.add("dz-error");
                        const _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                        for (let i = 0, len = _ref.length; i < len; i++) {
                            _ref[i].textContent = message;
                        }

                        Swal.fire({
                            icon: 'error',
                            title: '¡Ups!',
                            text: message
                        });
                    }


            };
        </script>                                
    @endpush
    
</x-admin-layout>