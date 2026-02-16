<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Acta de Recepción / Entrega</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .container {
            width: 100%;
            border: 1px solid black;
            padding: 10px;
            box-sizing: border-box;
        }
        .section {
            border: 1px solid black;
            padding: 5px;
            margin-top: 8px;
        }
        .section-title {
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .flex {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .flex-space {
            display: flex;
            justify-content: space-between;
            gap: 5px;
        }
        input {
            border: 1px solid black;
            padding: 2px;
            width: 95%;
            height: 1cm;
            box-sizing: border-box;
        }
        textarea {
            border: 1px solid black;
            padding: 2px;
            width: 95%;
            box-sizing: border-box;
        }
        textarea {
            resize: none;
        }
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .checkbox-group label {
            white-space: nowrap;
        }
        .small-input {
            width: 150px;
            height: 0.5cm;
        }
    </style>
</head>
<body>

    <div class="container">
        
        <table style="width: 100%;">
            <tr>
                <td >
                    <img src="data:image/png;base64,{{ $logoBase64 }}" height="100" width="100" alt="Logo institucional">
                </td>
                <th align="center" >
                    <span style="text-decoration: underline; font-size: 24px; font-weight: bold; color: #000;">
                        ACTA DE PRESTAMO
                    </span>
                </th>
                <th align="end-2">
                   <input type="text" value="Entrega Nº{{$numero}}-{{$año}}" class="small-input">
                </th>
            </tr>
        </table>

        <h3>Fecha: {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}</h3>
        
        <!-- Equipo -->
        <div class="section">
            <div class="section-title">Equipo</div>
            <div class="flex">
                <label><strong>Tipo:</strong></label> {{$bien->tipo->Tdescriocion_tipo}}
            </div>
            <div class="flex">
                <label><strong>Codigo:</strong></label> {{$bien->UK_Hardware_Codigo}}
            </div>
            <div class="flex">
                <label><strong>Estado Actual del Bien:</strong></label> {{$prestamo->Testado_fisico_prestamo}}
            </div>

            <div class="flex">
                <label><strong>Marca:</strong></label> {{$bien->marca->UK_Nombre_marca}}
            </div>

            @if ($bien->Tmodelo_hardware== 'null')
                
                <div class="flex">
                    <label><strong>Modelo:</strong></label> 
                </div>
            @else
                <div class="flex">
                    <label><strong>Modelo:</strong></label> {{$bien->Tmodelo_hardware}}
                </div>
            @endif

            <div class="section">
                <div class="section-title">descripción de Bien</div>
                <textarea rows="3">{{$bien->Tdescripcion_hardware}}</textarea>
            </div>

            
            <div class="flex" style="margin-top: 3px;">
                <label><strong>Órgano y/o unidad orgánica:</strong></label>
                <input value="OFICINA DE DESARROLLO DE TECNOLOGÍAS DE LA INFORMACIÓN Y ESTADÍSTICA"  type="text">
            </div>



     


        </div>

        <!-- Oficina de Procedencia -->
        <div class="section">
            <div class="section-title">Areá prestatario</div>
            <div class="flex" style="margin-top: 3px;">
                <label><strong>Usuario:</strong></label>
                <input value="{{$prestamo->Tresponsable_prestamo}}"  type="text">
            </div>
            <div class="flex" style="margin-top: 3px;">
                <label><strong>Cargo:</strong></label>
                <input value="{{$prestamo->Tcargo_prestamo}}"  type="text">
            </div>
            <div class="flex" style="margin-top: 3px;">
                <label><strong>Areá de destino:</strong></label>
                <input value="{{$area->UK_Nombre_area}}"  type="text">
            </div>
        </div>
        <!-- Motivo de prestamo-->
        <div class="section">
            <div class="section-title">Motivo de prestamo</div>
            <textarea rows="3">{{$prestamo->Tmotivo_prestamo}}</textarea>
        </div>

        <!-- Observacion -->
        @if (!$prestamo->Tobservaciones_prestamo)
            <div class="section">
                <div class="section-title">Observaciones</div>
                <textarea rows="2">No se agregaron Observaciones</textarea>
            </div>
            
        @else
            <div class="section">
                <div class="section-title">Observaciones</div>
                <textarea rows="2">{{$prestamo->Tobservaciones_prestamo}}</textarea>
            </div>
            
        @endif

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h2 style="display:inline-block; margin:0 280px 0 40;">______________</h2>
    <h2 style="display:inline-block; margin:0;">__________________</h2>

    <h3 style="display:inline-block; margin:0 350px 0 70;">Usuario</h3>
    <h3 style="display:inline-block; margin:0;">V.B Jefe de la ODTIE</h3>
    
    


    <h4>Tecnico responsable: {{$nombre->name}} {{$nombre->lastname}}</h4>


</body>
</html>
