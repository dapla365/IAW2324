<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuadro color</title>
</head>
<body>
    <h1>Cuadro color</h1>
    <?php
        $rojo = rand(0, 255);
        $verde = rand(0, 255);
        $azul = rand(0, 255);

        $colorFinal = sprintf("#%02x%02x%02x", $rojo, $verde, $azul);

        echo "<div style='width: 300px; height: 300px; background-color: $colorFinal;'></div>";
    ?>
</body>
</html>