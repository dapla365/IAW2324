<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FileGetContents</title>
</head>
<body>
    <h1>FileGetContents</h1>
    <?php
        $url = 'http://dapla.thsite.php';
        $contenido = file_get_contents($url);

        if ($contenido === false) {
            echo "Error al obtener el contenido desde $url";
        } else {
            echo $contenido;
        }
    ?>
</body>
</html>