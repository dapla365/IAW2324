<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foreach1</title>
</head>
<body>
    <h1>foreach 1</h1>
    <?php
        $refranes = array(
            "Refran 1",
            "Refran 2",
            "Refran 3",
            "Refran 4",
            "Refran 5",
        );
        
        // Utilizamos un bucle foreach para mostrar cada refrán en un párrafo
        foreach ($refranes as $refran) {
            echo '<p>' . $refran . '</p>';
        }
    ?>
</body>
</html>