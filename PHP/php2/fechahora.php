<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha y hora</title>
</head>
<body>
    <h1>Fecha y hora</h1>
    <?php
        echo "<p>Hoy es " . date("d/m/Y") . " a las " . date("h:i:sa")"</p>";
    ?>
</body>
</html>