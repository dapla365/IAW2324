<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
</head>
<body>
    <h1>Header</h1>
    <?php
        header("refresh:5;url=saludo.php");
        //header("Location: saludo.php");
    ?>

    <p>Redirigiendo a saludo.php</p>
</body>
</html>