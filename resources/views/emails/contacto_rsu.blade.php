<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo ?? 'Nuevo mensaje de contacto' }}</title>
</head>
<body>
    <h2>{{ $titulo ?? 'Nuevo mensaje de contacto' }}</h2>
    <p><strong>Correo electrónico:</strong> {{ $email }}</p>
    <p><strong>Asunto:</strong> {{ $asunto }}</p>
    <p><strong>Mensaje:</strong></p>
    <p>{{ $mensaje }}</p>
</body>
</html>
