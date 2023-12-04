<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Include</title>
</head>
<body>
    <h1>Include</h1>

    <?php
        include 'config.php';
        echo '<h2>Directorio de imágenes: '. IMG_DIR . "</h2>";
        echo '<p>Email: '. $email . "</p>";
        echo '<p>Web:  <a href="'. $web . '">Mi web</a></p>';
    ?>
</body>
</html>