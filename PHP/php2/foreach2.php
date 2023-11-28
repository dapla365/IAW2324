<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foreach2</title>
</head>
<body>
    <h1>foreach 2</h1>
    <?php
        $colores = array(
            "azul" => "blue",
            "rojo" => "red",
            "blanco" => "white",
            "negro" => "black",
            "amarillo" => "yellow"
        );

        echo '<p>Total de palabras: ' . count($colores) . '</p>';
        echo '<ul>';
        foreach ($colores as $palabraEsp => $palabraIng) {
            echo '<li>' . $palabraEsp . ' - ' . $palabraIng . '</li>';
        }
        echo '</ul>';
    ?>
</body>
</html>