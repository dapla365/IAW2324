<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superglobales</title>
</head>
<body>
    <h1>Superglobales</h1>
    <?php
        $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'No se puede obtener IP';
        $navegador = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'No se puede obtener navegador';
        $previo = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'No hay página previa';

        echo '<p>Dirección IP: ' . $ip . '</p>';
        echo '<p>Navegador: ' . $navegador . '</p>';
        echo '<p>Página previa: ' . $previo . '</p>';
    ?>
</body>
</html>