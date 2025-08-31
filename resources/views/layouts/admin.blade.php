{{-- aca es la plantilla del menu --}}

{{-- recibe el parametro que se le en admin.menu  --}}
@props([
    'title' => config('app.name', 'Laravel'),
    'breadcrumbs' =>[]
    ])

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{$title}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Librerías -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
       

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        

        {{-- sweetalert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- elegir --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        {{-- aca esta el font awsone de imagenes para la barra --}}
        <script src="https://kit.fontawesome.com/0dc89a789d.js" crossorigin="anonymous"></script>
        <!-- Styles -->
        @livewireStyles
        @stack('css')
        
    </head>
    <body class="font-sans antialiased bg-gray-50">
        {{-- aca  esta el menu sacado del tailan --}}
    
        {{-- llama a la cabezera --}}
        @include('layouts.include.admin.navigation');
        {{-- llama a la barra lateral --}}
        @include('layouts.include.admin.sidebar');

        {{-- contenido en el que trabajaremos --}}
        <div class="p-4 sm:ml-64">
                <div class="mt-14" >
                    {{-- contenido que varia --}}
                    @include('layouts.include.admin/breadcrumb')
                </div>
                {{$slot}}
        </div>




        

        @stack('modals')

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>


        @if (session('swal'))
            <script>
                Swal.fire(@json(session('swal')));

            </script>
            
        @endif
        
        {{-- se le dara un contenido --}}
        @stack('js')

    </body>
</html>
