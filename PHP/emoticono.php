<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emoticono</title>
</head>
<body>
    <h1>Emoticono</h1>
    <?php
        $emote = rand(128512, 128586);

        $hexEmoticon = dechex($emote);

        echo "<p>&#$emote;</p>";
    ?>
</body>
</html>