{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="Subir archivos"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
    [
        'name'=> 'Ingresar Archivos',
    ]
    ]">
   

    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @endpush
    
    @if (!$idCifrado)
        <!-- Para subir -->
        <H2>Agregar Archivo</H2>
        {{-- imagen --}}
        <div class="mb-4" >
           
            <form action="{{ route('admindigital.dropzone',$idCifrado)}}" class="dropzone" id="my-dropzone" method="POST" enctype="multipart/form-data">
            @csrf
            </form>
            
        </div>
    @elseif (!$VALOR)
        <!-- para cancelar -->
        <H2>Agregar archivo para cancelar</H2>
        {{-- imagen --}}
        <div class="mb-4" >
           
            <form action="/admin/digital/cancel/dropzone/{{$idCifrado}}" class="dropzone" id="my-dropzone" method="POST" enctype="multipart/form-data">
            @csrf
            </form>
            
        </div>
    @else
        <!-- para agregar -->
        <H2>Agregar Archivo</H2>
        {{-- imagen --}}
        <div class="mb-4" >
        
            <form action="/admin/digital/add/dropzone/{{$idCifrado}}" class="dropzone" id="my-dropzone" method="POST" enctype="multipart/form-data">
            @csrf
            </form>
            
        </div>
        
    @endif
   

    
    @push('js')
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <script>
            Dropzone.options.myDropzone = {
                    maxFiles: 3,
                    acceptedFiles: '.pdf,.doc,.docx,.xls,.xlsx,.txt',
                    dictDefaultMessage: "Arrastra los archivos al recuadro para subirla",
                    success: function(file, response) {
                        Swal.fire({
                            icon: 'success',
                            title: '¡PASO 2 COMPLETADO!',
                            text: response.message
                        });
                        
                    },

                    init: function() {
                        this.on("success", function(file, response) {
                            // Espera un poquito para mostrar el mensaje y luego redirige
                            setTimeout(function() {
                                window.location.href = "{{ route('admindigital.index') }}";
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