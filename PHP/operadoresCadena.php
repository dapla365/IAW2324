<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores cadena</title>
</head>
<body>
    <h1>Operadores cadena</h1>
    <?php
        $cadena1 = "Hola";
        $cadena2 = "Mundo";

        $concatenacion = $cadena1 . " " . $cadena2;
        echo "Concatenación: $concatenacion<br>";

        $cadena1 .= " PHP";
        echo "Concatenación abreviada: $cadena1<br>";

        $longitud = strlen($concatenacion);
        echo "Longitud de la cadena: $longitud<br>";

        $mayusculas = strtoupper($concatenacion);
        echo "Mayúsculas: $mayusculas<br>";

        $minusculas = strtolower($mayusculas);
        echo "Minúsculas: $minusculas<br>";

        $subcadena = substr($concatenacion, 0, 4);
        echo "Subcadena: $subcadena<br>";

        $nuevaCadena = str_replace("Hola", "Saludos", $concatenacion);
        echo "Reemplazar parte de la cadena: $nuevaCadena<br>";
    ?>
</body>
</html>