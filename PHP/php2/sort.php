<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort</title>
</head>
<body>
    <h1>sort</h1>
    <?php
        $colores = array(
            "azul", "blue",
            "rojo", "red",
            "blanco", "white",
            "negro", "black",
            "amarillo", "yellow"
        );

        sort($colores);
        
        echo '<ul>';
        foreach ($colores as $color) {
            echo '<li>' . $color . '</li>';
        }
        echo '</ul>';
    ?>
</body>
</html>