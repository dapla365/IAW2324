<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo</title>
</head>
<body>
    <h1>Sorteo</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="participantes">Número de Participantes:</label>
        <input type="number" id="participantes" name="participantes" min="1" required>

        <button type="submit">Sortear</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $total = (int)$_POST["participantes"];

            if ($total > 0) {
                $ganador = rand(1, $total);
                echo '<p>Ganador: ' . $ganador . '</p>';
                
            } else {
                echo '<p>Por favor, introduce un número de participantes válido.</p>';
            }
        }
    ?>

</body>
</html>