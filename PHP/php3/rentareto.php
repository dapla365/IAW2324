<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta</title>
</head>
<body>
    <h1>Renta</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <ul>
            <li>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>
            </li>
            <li>
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido" required>
            </li>
            <li>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </li>
            <li>
                <label for="dni">DNI:</label>
                <input type="text" name="dni" id="dni" required>
            </li>
            <li>
                <label for="salario">Salario Bruto:</label>
                <input type="number" name="salario" id="salario" required>
            </li>
            <li>
                <label for="colaboracion">Colaboración con ONGs (2% de exención fiscal):</label>
                <input type="checkbox" name="colaboracion" id="colaboracion">
            </li>
            <li>
                <button type="submit">Calcular</button>
            </li>
        </ul>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = htmlspecialchars($_POST["nombre"]);
        $apellido = htmlspecialchars($_POST["apellido"]);
        $email = htmlspecialchars($_POST["email"]);
        $dni = htmlspecialchars($_POST["dni"]);
        $salario = htmlspecialchars($_POST["salario"]);
        $colaboracion = isset($_POST["colaboracion"]) ? true : false;


        $tipoImpositivo = 0.15; 
        $impuesto = $salario * $tipoImpositivo;

        if ($colaboracion) {
            $exencion = 0.02; // 2% de exención fiscal
            $impuesto -= $impuesto * $exencion;
        }

        echo "<h2>Resultados:</h2>";
        echo "<p>Nombre: $nombre $apellido</p>";
        echo "<p>Email: $email</p>";
        echo "<p>DNI: $dni</p>";
        echo "<p>Salario Bruto: $salario</p>";
        echo "<p>Tipo Impositivo: " . ($tipoImpositivo * 100) . "%</p>";
        echo "<p>Colaboración con ONGs: " . ($colaboracion ? "Sí" : "No") . "</p>";
        echo "<p>Impuesto a Pagar: $impuesto</p>";
    }
    ?>
</body>
</html>
