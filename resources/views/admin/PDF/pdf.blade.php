{{-- resources/views/reports/purchase-detail.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Baja de hardware</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; margin: 20px; }
        .title { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 20px; }
        h3{
            text-align: center;
        }
        h5{
            text-align: start;
        }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { 
            border: 1px solid #ccc; 
            padding: 8px; 
            text-align: center; /* Centrar contenido de celdas */
            vertical-align: middle; /* Opcional: centrar verticalmente */
        }
        th { background-color: #f0f0f0; }
        .section { margin-top: 20px; }
    </style>

</head>
<body> 
    <table  style="width: 100%;">
        <tr>
            <td style="border: none">
                <img src="data:image/png;base64,{{ $logoBase64 }}" height="50" width="50" alt="Logo institucional">
            </td>
            <td style="border: none">
                <span style="text-decoration: underline; font-size: 19px; font-weight: bold; color: #000;">
                    ACTA DE BAJA DE BIEN N° {{$baja->PK_Bajas-2}}  {{-- se resta 2 xq ya se hicieron 2 pruebas --}}
                </span> 
            </td>
            <td style="border: none">
                 <h3></h3>
            </td>
        </tr>
    </table>
    <br>
 
    {{-- <div class="title">ACTA DE BAJA DE BIEN</div> --}}
 
    <div>
        <table>
            <tbody>
                <tr>
                    <td  align="center" >
                        <strong>Sede:</strong> {{ $bien->sede->UK_Nombre_sede ?? '—' }} <br>
                        <strong>Area:</strong> {{ $bien->area->UK_Nombre_area ?? '—' }} <br>
                        <strong>Tipo:</strong> {{ $bien->tipo->Tdescriocion_tipo ?? '—' }} <br>
                        <strong>Fecha de Adquisicion:</strong> {{ \Carbon\Carbon::parse($bien->Dadquisicion_hardware)->format('d/m/Y') }} <br>
                        <strong>Codigo Patrimonial:</strong> {{$bien->UK_Hardware_Codigo ?? '—' }} <br>
                        <strong>Nombre:</strong>{{ $baja->Tusuario_baja ?? '—' }}<br>
                        <strong>Cargo:</strong>{{ $baja->Tcargo_baja ?? '—' }}<br>
                        <strong>Tipo de contrato:</strong>{{ $baja->Tcontrato_baja ?? '—' }}<br>
                    </td>
                    <td  align="center" >
                        <span>MARCA:</span> {{ $bien->marca->UK_Nombre_marca ?? '—' }} <br>
                        <span>SERIE:</span> {{ $bien->Tserie_hardware}} <br>
                        {!! str_replace(',', '<br>', $bien->Tdescripcion_hardware) !!}
                        {{-- 
                        <strong>MODELO:</strong> {{ $bien->Tmodelo_hardware ?? '—' }} <br>
                        <strong>SERIE:</strong> {{ $bien->Tserie_hardware}} <br> --}}
                    </td>
                </tr>                
            </tbody>
        </table>
       
    </div>

    <div class="section">
        <table>
            <thead>
                <tr>
                    <th>MOTIVO DE BAJA</th>
                    <th>FECHA DE BAJA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $baja->Tdescripcion_baja}}</td>
                    <td>{{ $baja->created_at}}</td>
                    
                </tr>                
            </tbody>
        </table>
    </div>
    <div class="section">
        <h3>Historial del Bien:</h3>
        <table>
            <thead>
                <tr>
                    <th>Agente</th>
                    <th>Comentario</th>
                    <th>Fecha de Publicacion</th>
                </tr>
            </thead>
            <tbody>
                @if ($comentarios->isEmpty())
                    <tr>
                        <td>No hay comentario</td>
                        <td>No hay comentario</td>
                        <td>No hay comentario</td>
                    </tr>
                    
                @else
                    @foreach ($comentarios as $comentario)
                        <tr>
                            <td>{{ $comentario->usuario->name }}</td>
                            <td>{{ $comentario->Tdescripcion_comentario }}</td>
                            <td>{{ \Carbon\Carbon::parse($comentario->created_at)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    
    
    <h2 style="display:inline-block; margin:0 100px 0 0;">______________</h2>
    <h2 style="display:inline-block; margin:0;">__________________</h2>
    <h3 style="display:inline-block; margin:0 128px 0 4;"> Jefe del área usuaria</h3>
    <h3 style="display:inline-block; margin:0;">Jefe de la ODTIE</h3>
    
    <h4>Tecnico responsable: {{ $baja->usuarioBaja->name}} {{ $baja->usuarioBaja->lastname}}</h4>


</body>

</html>