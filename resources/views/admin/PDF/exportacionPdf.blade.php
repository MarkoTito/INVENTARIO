{{-- resources/views/reports/purchase-detail.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Exportacion</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; margin: 20px; }
        .title { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 20px; }
        h5{
            text-align: center;
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
 
    <div class="title">Exportacion de Bienes</div>
    {{--     
    <div>
        descripcion

        <strong>Tipo:</strong> {{ $bien->tipo->Tdescriocion_tipo ?? '—' }}<br>
        <strong>Area:</strong> {{ $bien->area->UK_Nombre_area ?? '—' }}<br>
        <strong>Fecha de Adquisicion:</strong> {{ \Carbon\Carbon::parse($bien->Dadquisicion_hardware)->format('d/m/Y') }}<br>
        <strong>Codigo Patrimonial:</strong> {{$bien->UK_Hardware_Codigo ?? '—' }}<br>
       
    </div> --}}
{{--     
    <div class="section">
        <table>
            <thead>
                <tr>
                    <th>MOTIVO DE BAJA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $bien->Tmotivo_baja_hardware}}</td>
                    
                </tr>                
            </tbody>
        </table>
    </div> --}}
    <div class="section">
        <h3>Cuadro de Bienes:</h3>
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Codigo</th>
                    
                    <th>Area</th>
                    <th>Estado Fisico</th>
                    <th>Fecha de adquiscion</th>
                    <th>Fecha de Baja</th>
                    <th>Activo/Baja</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bienes as $bien)
                    <tr>
                        <td>{{ $bien->tipo->Tdescriocion_tipo}}</td>
                        <td>{{ $bien->UK_Hardware_Codigo}}</td>
                        
                        <td>{{ $bien->area->UK_Nombre_area}}</td>
                        <td>{{ $bien->Testado_fisico_hardware}}</td>
                        <td>{{ \Carbon\Carbon::parse($bien->Dadquisicion_hardware)->format('d/m/Y') }}</td>
                        <td>{{$bien->Dbaja_hardware}}</td>
                        <td>{{ $bien->estado->UK_Descripcion_estado}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>