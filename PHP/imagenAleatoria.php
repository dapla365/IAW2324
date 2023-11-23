<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagen aleatoria</title>
</head>
<body>
    <h1>Imagen aleatoria</h1>
    <?php
        $imagenes = [
            'imagen1.png',
            'imagen2.png',
            'imagen3.png',
        ];
        $imagenAleatoria = $imagenes[array_rand($imagenes)];

        echo "<img src='$imagenAleatoria' alt='Imagen Aleatoria'>";
    ?>
</body>
</html>