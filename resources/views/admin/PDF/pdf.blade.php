{{-- resources/views/reports/purchase-detail.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de SOFTWARE</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; margin: 20px; }
        .title { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; text-align: center;}
        th, td { border: 1px solid #ccc; padding: 6px 8px; text-align: left;border: 1px solid #ccc;padding: 8px; }
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
        <strong>Codigo:</strong> {{$bien->UK_Codigo_Pratimonial ?? '—' }}<br>
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
    
    {{-- <div class="section" style="text-align: right;">
        <strong>Total: S/ {{ number_format($purchase->total, 2) }}</strong>
    </div> --}}
 
</body>
</html>