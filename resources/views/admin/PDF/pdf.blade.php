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
 
    <div class="title">Retiro de Bien Patrimonial</div>
 
    <div>
        {{-- descripcion --}}
        <strong>Tipo:</strong> {{ $bien->tipo->T_Descriocion ?? '—' }}<br>
        <strong>Area:</strong> {{ $bien->area->UK_Nombre_Area ?? '—' }}<br>
        <strong>Fecha de Adquisicion:</strong> {{ \Carbon\Carbon::parse($bien->D_Adquisicion)->format('d/m/Y') }}<br>
        <strong>Codigo Patrimonial:</strong> {{$bien->UK_Codigo_Pratimonial ?? '—' }}<br>
        <strong>Tecnico Responsable:</strong> {{$bien->B_User_Name_Baja ?? '—' }}<br>
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
                    <td>{{ $bien->T_Motivo_Baja}}</td>
                    
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
                            <td>{{ $comentario->T_User_Name }}</td>
                            <td>{{ $comentario->T_Descripcion_Comentario }}</td>
                            <td>{{ \Carbon\Carbon::parse($comentario->created_at)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <div>
        <h3>
            __________________
        </h3>
        <h3>
            {{$jefa->name}}
        </h3>
        
        {{-- <h5>
            Jefe de la Oficina de Desarrollo de Tecnologias de la Informacion Y Estadistica
        </h5> --}}
    </div>
    <br>
    <div>

    </div>

</body>

</html>