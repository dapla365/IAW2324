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
        <label for="participantes">Número de participantes:</label>
        <textarea id="participantes" name="participantes" rows="4" cols="50" required></textarea>
        <br>

        <label for="premios">Número de premios:</label>
        <input type="number" id="premios" name="premios" min="1" required>

        <button type="submit">Sortear</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $participantes = explode(',', $_POST["participantes"]);
            $premios = (int)$_POST["premios"];

            $participantes = array_map('trim', $participantes); //Quitar espacios


            if (count($participantes) > 0 && $premios > 0) {
                $premiados = array_rand($participantes, min($premios, count($participantes)));

                echo "<h2>Ganadores:</h2>";
                echo "<ul>";
                if (is_array($premiados)) {
                    foreach ($premiados as $i) {
                        echo "<li>" . $participantes[$i] . "</li>";
                    }
                } else {
                    echo "<li>" . $participantes[$premiados] . "</li>";
                }
                echo "</ul>";
            } else {
                echo '<p>Por favor, introduce un número de premios y paricipantes válido.</p>';
            }
        }
    ?>

</body>
</html>