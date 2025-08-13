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
        <h2 style="text-align: center; font-weight: bold; text-transform: uppercase;">
            Acta de Entrega
        </h2>

        <!-- Fecha -->
        <div class="flex" style="justify-content: flex-end;">
            <label><strong>Fecha:</strong></label> 
            <input type="text" value="{{$fecha}}"  class="small-input">
        </div>

        <!-- Equipo -->
        <div class="section">
            <div class="section-title">Equipo</div>
            <div class="flex">
                <label><strong>Tipo:</strong></label> {{$bien->tipo->Tdescriocion_tipo}}
            </div>
            <div class="flex">
                <label><strong>Codigo:</strong></label> {{$bien->UK_Hardware_Codigo}}
            </div>
            <div class="flex-space" style="margin-top: 5px;">
                <div class="flex" style="flex: 1;">
                    <label><strong>Marca:</strong></label>
                    <input type="text">
                </div>
                <div class="flex" style="flex: 1;">
                    <label><strong>Modelo:</strong></label>
                    <input type="text">
                </div>
            </div>
        </div>

        <!-- Oficina de Procedencia -->
        <div class="section">
            <div class="section-title">Oficina de Procedencia</div>
            <div class="flex" style="margin-top: 3px;">
                <label><strong>Oficina / Unidad:</strong></label>
                <input value="{{$bien->area->UK_Nombre_area}}"  type="text">
            </div>
            <div class="flex" style="margin-top: 3px;">
                <label><strong>Usuario:</strong></label>
                <input type="text">
            </div>
            <div class="flex" style="margin-top: 3px;">
                <label><strong>Cargo:</strong></label>
                <input type="text">
            </div>
        </div>

        <!-- Observaciones -->
        <div class="section">
            <div class="section-title">Observaciones</div>
            <textarea rows="2">{{$comentario->Tobservacion_comentario}}</textarea>
        </div>

        <!-- Componente que presenta falla -->
        {{-- <div class="section">
            <div class="section-title">Componente que presenta falla</div>
            <div class="checkbox-group">
                <label><input type="checkbox"> Disco duro</label>
                <label><input type="checkbox"> Placa</label>
                <label><input type="checkbox"> Imagen</label>
                <label><input type="checkbox"> Red</label>
                <label><input type="checkbox"> Disco duro SSD</label>
                <label><input type="checkbox"> Memoria</label>
                <label><input type="checkbox"> Fuente</label>
                <label><input type="checkbox"> Otros</label>
                <label><input type="checkbox"> Problemas de reinicios</label>
            </div>
            <div class="flex" style="margin-top: 5px;">
                <label><strong>Detalle otros:</strong></label>
                <input type="text">
            </div>
        </div> --}}

        <!-- Acciones realizadas -->
        <div class="section">
            <div class="section-title">Acciones realizadas</div>
            <textarea rows="3">{{$comentario->Tdescripcion_comentario}}</textarea>
        </div>

        <!-- Recomendaciones -->
        <div class="section">
            <div class="section-title">Recomendaciones</div>
            <textarea rows="2">{{$comentario->Trecomendacion_comentario}}</textarea>
        </div>
    </div>
    <br>
    <br>
    <h2 style="display:inline-block; margin:0 280px 0 40;">______________</h2>
    <h2 style="display:inline-block; margin:0;">__________________</h2>

    <h3 style="display:inline-block; margin:0 330px 0 70;">{{$nombre->name}}</h3>
    <h3 style="display:inline-block; margin:0;">V.B Jefe de la ODTIE</h3>
    
    {{-- <p style="display:inline-block; margin:0;">*Tecnico Responsable*</p> --}}


</body>
</html>
