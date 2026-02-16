{{-- PASA la informacion a un componente (con el nombre breadcrumbds)
    : significa codigo php
    sin : significa texto plano
--}}
<x-admin-layout 
title="{{$bien->tipo->Tdescriocion_tipo}}"
:breadcrumbs="[
    [
        'name'=>'Menu',
        'href' => '/',
    ],
     [
        'name'=> 'Buscar',
        'href' => route('adminbien.index')
    ],
    [
        'name'=> 'Hardware',
    ]
    ]">
    @php
        $idCifrado = Crypt::encryptString($bien->PK_Hardware);
    @endphp

    <div class="flex justify-end mb-4 ">

        @if ($bien->estado->PK_estado == 1)
            @can('update-hardware')
                <a href="{{url('/admin/Editar/Hardware/'.$idCifrado)}}">
                    <button type="submit" 
                        class="text-white bg-black focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                        Editar <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </a>
            @endcan
            
        @endif


    </div>
    
    <div class="grid gap-6 md:grid-cols-3 mb-2">
        {{-- imagen --}}
        <div class="mb-4" >
                @if (!$imagen)
                    @if ($bien->FK_Hardware_TipoId ==10)
                        <br>
                        <div class="flex justify-center" >
                            <img src="https://static.wixstatic.com/media/d8609d_fd38794fcf164bcebd0e5e5423548f0b~mv2.jpg/v1/fill/w_980,h_938,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/d8609d_fd38794fcf164bcebd0e5e5423548f0b~mv2.jpg" height="240px" width="250px" alt="imagen de ecran">
                        </div>
                        <div class=" flex justify-center" >
                            <p> Estado: {{$bien->Testado_fisico_hardware}}</p>
                        </div>
                    @endif
                    @if ($bien->FK_Hardware_TipoId ==9)
                        <br>
                        <br>
                        <br>
                        <div class="flex justify-center" >
                            <img src="https://img.freepik.com/vector-premium/contorno-icono-teclado-creativo-ilustracion-vectorial-dibujos-animados_1324823-10443.jpg?semt=ais_hybrid&w=740&q=80" height="340px" width="250px" alt="imagen de teclado">
                        </div>
                        <div class=" flex justify-center" >
                            <p> Estado: {{$bien->Testado_fisico_hardware}}</p>
                        </div>
                    @endif
                    @if ($bien->FK_Hardware_TipoId ==8)
                        <br>
                        <div class="flex justify-center mb-4 " >
                            <img src="https://static.vecteezy.com/system/resources/previews/012/618/939/original/printer-cartoon-illustration-vector.jpg" height="290px" width="320px" alt="imagen de impresora">
                        </div>
                        <div class="flex justify-center" >
                            <p> Estado: {{$bien->Testado_fisico_hardware}}</p>
                        </div>
                    @endif
                    @if ($bien->FK_Hardware_TipoId ==7) 
                        <div class="flex justify-between" >
                            <img src="https://m.media-amazon.com/images/I/41it4g4TcEL._UF894,1000_QL80_.jpg " height="210px" width="310px" alt="imagen de Proyector">
                        </div>
                        <div class="flex justify-between" >
                            <p> Estado: {{$bien->Testado_fisico_hardware}}</p>                    
                        </div>
                    @endif
                    @if ($bien->FK_Hardware_TipoId ==6)
                        <div class="flex justify-between" >
                            <img src=" https://static.vecteezy.com/system/resources/previews/011/065/272/non_2x/wireless-computer-mouse-clipart-gray-computer-mouse-watercolor-style-illustration-isolated-on-white-background-simple-wireless-mouse-cartoon-hand-drawn-office-supplies-drawing-back-view-vector.jpg" height="350px" width="350px" alt="imagen de Mouse">
                        </div>
                        <div class="flex justify-between" >
                            <p> Estado: {{$bien->Testado_fisico_hardware}}</p>
                        </div>
                    @endif
                    @if ($bien->FK_Hardware_TipoId ==5)
                        <div class="flex justify-between" >
                            <img src=" https://cdn-icons-png.flaticon.com/512/5921/5921714.png" height="200px" width="200px" alt="imagen de CPU">
                        </div>
                        <div class="flex justify-between" >
                            <p> Estado: {{$bien->Testado_fisico_hardware}}</p>
                        </div>
                    @endif
                    @if ($bien->FK_Hardware_TipoId ==4)
                        <div class="flex justify-between" >
                            <img src="https://img.freepik.com/vector-premium/monitor-computadora-estilo-dibujos-animados-aislado-sobre-fondo-blanco-ilustracion-stock-simbolo-computadora_258706-337.jpg" height="200px" width="250px" alt="imagen de Monitor">
                        </div>
                        <div class="flex justify-between" >
                            <p> Estado: {{$bien->Testado_fisico_hardware}}</p>
                        </div>
                    @endif
                    @if ($bien->FK_Hardware_TipoId ==3)
                        <div class="flex justify-between" >
                            <img src="https://images.vexels.com/media/users/3/140673/isolated/preview/68ff7023a9804bb6e5e12d53f6044c4c-icono-de-dibujos-animados-de-laptop.png" height="200px" width="250px" alt="imagen de Laptop">
                        </div>
                        <div class="flex justify-between" >
                            <p> Estado: {{$bien->Testado_fisico_hardware}}</p>
                        </div>
                    @endif
                    {{-- aca falta poner una imagen x si no es ninguna de ellos --}}
                    @if ($bien->FK_Hardware_TipoId !=1 && $bien->FK_Hardware_TipoId !=2 && $bien->FK_Hardware_TipoId !=3 && $bien->FK_Hardware_TipoId !=4 && $bien->FK_Hardware_TipoId !=5 && $bien->FK_Hardware_TipoId !=6 && $bien->FK_Hardware_TipoId !=7 && $bien->FK_Hardware_TipoId !=8 && $bien->FK_Hardware_TipoId !=9 && $bien->FK_Hardware_TipoId !=10 )
                        <img src="https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg" height="200px" width="250px" alt="imagen de Laptop">
                        <p> Estado: {{$bien->Testado_fisico_hardware}}</p>
                    @endif
                    
                @else
                    <div class="mb-4" >
                        <img src="{{ Storage::url($imagen->Tpath_imagenes) }}" height="450px" width="440px" alt="imagen del bien">
                        <p> Estado: {{$bien->Testado_fisico_hardware}}</p>
                    </div>
                    
                @endif
        </div>
        
        <div class="md:col-span-2 bg-green-200 p-4">
            <div class="grid gap-6 md:grid-cols-3">
                
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Sede</label>    
                    <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->sede->UK_Nombre_sede}}" disabled>
                        
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Área</label>
                    <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->area->UK_Nombre_area}}" disabled>
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Tipo de hardware</label>
                    <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->tipo->Tdescriocion_tipo}}" disabled>
                </div>
               
                
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Marca</label>    
                    <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->marca->UK_Nombre_marca}}" disabled>        
                </div>        
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Modelo</label>    
                    <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->Tmodelo_hardware}}" disabled>        
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Serie</label>    
                    <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->Tserie_hardware}}" disabled>        
                </div>
                 <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black  ">Fecha de adquisicion</label>
                    <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->Dadquisicion_hardware}}" disabled>
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Codigo</label>    
                    <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$bien->UK_Hardware_Codigo}}" disabled>
                        
                </div>
                @if ($bien->estado->PK_estado == 2)
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fecha de baja:</label>    
                        <input type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$ultimoBaja->created_at->toDateString()}}" disabled>        
                    </div>
                @else
                    
                @endif
            </div>

        </div>

    </div>  
    <div class="">  
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Descripcion</label>
        <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>{{$bien->Tdescripcion_hardware}}</textarea>
    </div>
    <br>
        @if ($bien->estado->PK_estado == 1)
            @if ($comentarios->isEmpty())
             {{-- si no hay comentarios no te deberia dar de baja pero creo q lo dejare  --}}
                <div class="grid gap-6 mb-4 md:grid-cols-2">
                    {{-- <div>
                        @can('bajar-hardware')
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal" 
                                class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" 
                                type="submit">
                                Dar de Baja <i class="fa-solid fa-circle-down"></i>
                            </button>
                        @endcan
                        
                    </div> --}}
                    <div class="grid gap-6 mb-4 md:grid-cols-2">
                        @if ($bajas->count() >=1)
                            @can('read-comentario')
                                <a href="{{url('/admin/buscar/historial/bajas/'.$idCifrado)}}">
                                    <button type="submit" 
                                        class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                                        Historial de bajas  <i class="fa-solid fa-folder"></i>
                                    </button>
                                </a>
                            @endcan                                    
                        @endif

                    </div>
                    <div>
                        @if ($bien->estado->PK_estado == 1)

                            {{-- mostrar los prestamos del bien --}}
                            @if (!$prestamos->isEmpty())
                                <div class="flex justify-end">
                                    <a href="/admin/Prestamo/historial/{{$bien->PK_Hardware}}">
                                        <button type="submit" 
                                            class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                                            Prestamos  <i class="fa-solid fa-handshake"></i>
                                        </button>
                                    </a>

                                </div>
                            @endif
                            
                        @else
                            <div class="flex justify-end">
                                <a href="/admin/baja/{{$bien->PK_Hardware}}/pdf">
                                    <button type="submit" 
                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                        Ver baja <i class="fa-solid fa-eye"></i>
                                    </button>
                                </a> 
                                {{-- ojo aca --}}
                            </div>
                        @endif
                    </div>

                </div>
        
            @else
                <div class="grid gap-6 mb-4 md:grid-cols-2" >

                    {{-- <div>
                        @can('bajar-hardware')
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal" 
                                class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" 
                                type="submit">
                                Dar de Baja <i class="fa-solid fa-circle-down"></i>
                            </button>
                        @endcan
                        
                    </div> --}}

                    @if ($bajas->isEmpty())
                            <div>
                                @can('read-comentario')
                                    <a href="{{url('/admin/buscar/historial/'.$idCifrado)}}">
                                        <button type="submit" 
                                            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                                            Historial <i class="fa-solid fa-folder"></i>
                                        </button>
                                    </a>
                                @endcan
                            </div>
                    @else
                            <div class="grid gap-6 mb-4 md:grid-cols-2" >

                                <div>
                                    @can('read-comentario')
                                        <a href="{{url('/admin/buscar/historial/'.$idCifrado)}}">
                                            <button type="submit" 
                                                class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                                                Historial <i class="fa-solid fa-folder"></i>
                                            </button>
                                        </a>
                                    @endcan
                                </div>
                                <div>
                                    @can('read-comentario')
                                        <a href="{{url('/admin/buscar/historial/bajas/'.$idCifrado)}}">
                                            <button type="submit" 
                                                class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                                                Historial de bajas  <i class="fa-solid fa-folder"></i>
                                            </button>
                                        </a>
                                    @endcan    
                                </div>

                            </div>

                    @endif


                    {{-- mostrar los prestamos del bien --}}
                        @if (!$prestamos->isEmpty())
                        <div class="flex justify-end">
                            <a href="/admin/Prestamo/historial/{{$bien->PK_Hardware}}">
                                <button type="submit" 
                                    class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                                    Prestamos  <i class="fa-solid fa-handshake"></i>
                                </button>
                            </a>

                        </div>
                    @endif
                </div>   
                
            @endif            

        @endif
        @if ($bien->estado->PK_estado == 2)
                
                @if ($comentarios->isEmpty())
                    <div class="grid gap-6 mb-4 md:grid-cols-3" >

                        <div>
                            @can('bajar-hardware')
                                <button data-modal-target="default-modal-cancelar" data-modal-toggle="default-modal-cancelar"
                                        class="block text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800"
                                        type="submit">
                                    Revertir baja <i class="fa-solid fa-circle-up"></i>
                                </button>
                            @endcan
                            
                        </div>
                        @if ($bajas->isEmpty())
                            <div>
                            </div>
                            
                            @else
                            <div>
                                @can('read-comentario')
                                    <a href="{{url('/admin/buscar/historial/bajas/'.$idCifrado)}}">
                                        <button type="submit" 
                                            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                                            Historial de bajas  <i class="fa-solid fa-folder"></i>
                                        </button>
                                    </a>
                                @endcan
                                
                            </div>
                        @endif
                        <div class="flex justify-end">
                            <a href="/admin/baja/{{$bien->PK_Hardware}}/pdf">
                                <button type="submit" 
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    Ver baja <i class="fa-solid fa-eye"></i>
                                </button>
                            </a>
                        </div>
                        
                    </div>     
                @else
                    <div class="grid gap-6 mb-4 md:grid-cols-3" >
                        <div>
                            @can('bajar-hardware')
                                <button data-modal-target="default-modal-cancelar" data-modal-toggle="default-modal-cancelar"
                                        class="block text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800"
                                        type="submit">
                                    Revertir baja <i class="fa-solid fa-circle-up"></i>
                                </button>
                            @endcan

                        </div>
                        
                        @if ($bajas->isEmpty())
                            <div>
                                @can('read-comentario')
                                    <a href="{{url('/admin/buscar/historial/'.$idCifrado)}}">
                                        <button type="submit" 
                                            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                                            Historial <i class="fa-solid fa-folder"></i>
                                        </button>
                                    </a>
                                @endcan
                            </div>
                            
                        @else
                            <div class="grid gap-6 mb-4 md:grid-cols-2" >
                                @can('read-comentario')
                                    <a href="{{url('/admin/buscar/historial/'.$idCifrado)}}">
                                        <button type="submit" 
                                            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                                            Historial <i class="fa-solid fa-folder"></i>
                                        </button>
                                    </a>
                                @endcan
                                @can('read-comentario')
                                    <a href="{{url('/admin/buscar/historial/bajas/'.$idCifrado)}}">
                                        <button type="submit" 
                                            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                                            Historial de bajas  <i class="fa-solid fa-folder"></i>
                                        </button>
                                    </a>
                                @endcan                                    

                            </div>
                        @endif
                        <div class="flex justify-end">
                            <a href="/admin/baja/{{$bien->PK_Hardware}}/pdf">
                                <button type="submit" 
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    Ver baja <i class="fa-solid fa-eye"></i>
                                </button>
                            </a>
                        </div>
                    </div>   

                    
                @endif


        @endif

    <!-- Main modal -->
                        <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                                            DAR DE BAJA AL BIEN
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-black" data-modal-hide="default-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body y formulario -->
                                    <form action="/admin/Bajar/{{$bien->UK_Hardware_Codigo}}"
                                            class="delete-form">
                                        @csrf
                                        <div class="p-4 md:p-5 space-y-4">
                                            <label for="T_Motivo_Baja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Motivo:</label>
                                            <textarea  name="T_Motivo_Baja" id="miTextarea" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escriba el motivo de la baja">{{old('T_Motivo_Baja')}}</textarea>
                                            <p>Letras restantes: <span id="contador">120</span></p>
                                            @error('T_Motivo_Baja')
                                                    <p class="text-red-600">*{{$message}}</p>
                                            @enderror
                                            <input hidden name="PK_Hardware" type="text" value="{{$bien->PK_Hardware}}">
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button data-modal-hide="default-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Dar de baja</button>
                                            <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-black dark:hover:bg-gray-700">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    <!-- Main modal de revertir baja -->
                        <div id="default-modal-cancelar" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                                            REVERTIR BAJA DEL BIEN
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-black" data-modal-hide="default-modal-cancelar">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body y formulario   -->
                                    <form action="/admin/Bajar/revertir/{{$bien->PK_Hardware}}"
                                            class="delete-form">
                                        @csrf
                                        <input hidden name="tipo" type="text" value="1">
                                        <div class="p-4 md:p-5 space-y-4">
                                            <label for="T_Motivo_Activar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Motivo:</label>
                                            <textarea required name="T_Motivo_Activar" id="miTextarea2" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" maxlength="200" placeholder="Escriba el motivo de la reversión de la baja">{{old('T_Motivo_Activar')}}</textarea>
                                            {{-- <p>Letras restantes: <span id="contador2">120</span></p> --}}
                                            @error('T_Motivo_Activar')
                                                    <p class="text-red-600">*{{$message}}</p>
                                            @enderror
                                        
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button data-modal-hide="default-modal-cancelar" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Revertir baja</button>
                                            <button data-modal-hide="default-modal-cancelar" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-black dark:hover:bg-gray-700">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


    

@push('js')
    <script>
        const textarea = document.getElementById("miTextarea");
        const contador = document.getElementById("contador");
        const limite = 120; // máximo de letras/caracteres permitidos
        textarea.addEventListener("input", () => {
        let restantes = limite - textarea.value.length;
        if (restantes < 0) {
            textarea.value = textarea.value.substring(0, limite); // corta el texto
            restantes = 0;
        }

        contador.textContent = restantes;
        });
    </script>
    {{-- <script>
        const textarea2 = document.getElementById("miTextarea2");
        const contador2 = document.getElementById("contador2");
        const limite = 120; // máximo de letras/caracteres permitidos
        textarea2.addEventListener("input", () => {
        let restantes = limite - textarea2.value.length;
        if (restantes < 0) {
            textarea2.value = textarea2.value.substring(0, limite); // corta el texto
            restantes = 0;
        }

        contador2.textContent = restantes;
        });
    </script> --}}
    
@endpush




    
</x-admin-layout>