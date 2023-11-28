<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores numericos</title>
</head>
<body>
    <h1>Operadores numericos</h1>
    <?php
        $numero1 = 10;
        $numero2 = 5;
        
        $suma = $numero1 + $numero2;
        echo "Suma: $suma<br>";

        $resta = $numero1 - $numero2;
        echo "Resta: $resta<br>";
        
        $multiplicacion = $numero1 * $numero2;
        echo "Multiplicación: $multiplicacion<br>";

        $division = $numero1 / $numero2;
        echo "División: $division<br>";
        
        $resto = $numero1 % $numero2;
        echo "Resto al dividir: $resto<br>";
    ?>
</body>
</html>