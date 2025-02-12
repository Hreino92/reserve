<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotización</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        p {
            font-size: 14px;
            line-height: 1.6;
            margin: 8px 0;
            color: #333;
        }
        .highlight {
            font-weight: bold;
            color: #333;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #4CAF50;
            margin-top: 20px;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 5px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Solicitud de Cotización</h1>

        <p><span class="highlight">Nombre:</span> {{ $nombre }}</p>
        <p><span class="highlight">Email:</span> {{ $email }}</p>
        <p><span class="highlight">Teléfono:</span> {{ $telefono }}</p>
        <p><span class="highlight">Tipo de Solicitud:</span> {{ $tipo }}</p>

        <p><span class="highlight">Opción Seleccionada:</span> {{ $opcionSeleccionada }}</p>

        @if(isset($data['ciudad_origen']) && isset($data['ciudad_destino']))
            <div class="section-title">Detalles de Boletos</div>
            <p><span class="highlight">Ciudad de Origen:</span> {{ $data['ciudad_origen'] }}</p>
            <p><span class="highlight">Ciudad de Destino:</span> {{ $data['ciudad_destino'] }}</p>
        @endif

        <div class="section-title">Fechas</div>
        <p><span class="highlight">Fecha de Inicio:</span> {{ $data['fecha_inicio'] }}</p>
        <p><span class="highlight">Fecha Final:</span> {{ $data['fecha_final'] }}</p>

        <div class="section-title">Comentarios</div>
        <p>{{ $data['comentarios'] ?? 'No hay comentarios' }}</p>
    </div>

    <div class="footer">
        <p>Si tienes alguna pregunta, no dudes en contactarnos en <a href="mailto:reserve503.travel@gmail.com">reserve503.travel@gmail.com</a></p>
    </div>
</body>
</html>
