<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo</title>
</head>
<body>
    <h1>Saludo</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        
        <label for="name">Nombre: </label>
        <input type="text" id="name" name="name"/>

        <button type="submit">Enviar</button>
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = htmlspecialchars($_POST["name"]);
            $fecha = date("d/m/y");

            echo '<p>Hola ' . $nombre . ' hoy es ' . $fecha . '.</p>';
        }
    ?>
</body>
</html>