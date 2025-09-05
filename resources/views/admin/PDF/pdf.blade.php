{{-- resources/views/reports/purchase-detail.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de hardware</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; margin: 20px; }
        .title { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 20px; }
        h3,h5{
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
 
    <div class="title">ACTA DE BAJA DE BIEN</div>
 
    <div>
        {{-- descripcion --}}
        <strong>Tipo:</strong> {{ $bien->tipo->Tdescriocion_tipo ?? '—' }}<br>
        <strong>Area:</strong> {{ $bien->area->UK_Nombre_area ?? '—' }}<br>
        <strong>Fecha de Adquisicion:</strong> {{ \Carbon\Carbon::parse($bien->Dadquisicion_hardware)->format('d/m/Y') }}<br>
        <strong>Codigo Patrimonial:</strong> {{$bien->UK_Hardware_Codigo ?? '—' }}<br>
       
    </div>

    <div class="section">
        <table>
            <thead>
                <tr>
                    <th>MOTIVO DE BAJA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $baja->Tdescripcion_baja}}</td>
                    
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
    <h3 style="display:inline-block; margin:0 165px 0 25;"> {{ $baja->usuarioBaja->name}}</h3>
    <h3 style="display:inline-block; margin:0;">V.B Jefe de la ODTIE</h3>
    
    <p style="display:inline-block; margin:0;">*Tecnico Responsable*</p>

    
    


</body>

</html>