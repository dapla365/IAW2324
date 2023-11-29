<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta</title>
    <style>
        li{
            margin: 5px;
        }
    </style>
</head>
<body>
<h1>Encuesta</h1>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = htmlspecialchars($_POST["nombre"]);
        $edad = htmlspecialchars($_POST["edad"]);
        $genero = htmlspecialchars($_POST["genero"]);
        $colorFavorito = htmlspecialchars($_POST["color_favorito"]);
        $hobbies = isset($_POST["hobbies"]) ? $_POST["hobbies"] : array();
        $comentario = htmlspecialchars($_POST["comentario"]);

        echo '<h2>Resumen de respuestas:</h2>';
        echo '<ul>';
        echo '<li>Nombre: ' . $nombre . '</li>';
        echo '<li>Edad: ' . $edad . ' años</li>';
        echo '<li>Género: ' . $genero . '</li>';
        echo '<li>Color Favorito: ' . $colorFavorito . '</li>';
        
        echo '<li>Hobbies:';
        echo '<ul>';
        foreach ($hobbies as $hobbie) {
            echo '<li>' . htmlspecialchars($hobbie) . '</li>';
        }
        echo '</ul>';
        echo '</li>';

        echo '<li>Comentario: ' . $comentario . '</li>';
        echo '</ul>';
        echo '<hr><br>';
    }
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <ul>
        <li>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </li>
        <li>
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required>
        </li>
        <li>
            <label>Género:</label>
            <input type="radio" id="genero-m" name="genero" value="Masculino" required>
            <label for="genero-m">Masculino</label>
            <input type="radio" id="genero-f" name="genero" value="Femenino" required>
            <label for="genero-f">Femenino</label>
        </li>
        <li>
            <label for="color_favorito">Color Favorito:</label>
            <select id="color_favorito" name="color_favorito" required>
                <option value="Rojo">Rojo</option>
                <option value="Azul">Azul</option>
                <option value="Verde">Verde</option>
                <option value="Otros">Otros</option>
            </select>
        </li>
        <li>
            <label>Hobbies:</label>
            <input type="checkbox" id="hobbie1" name="hobbies[]" value="Deportes">
            <label for="hobbie1">Deportes</label>
            <input type="checkbox" id="hobbie2" name="hobbies[]" value="Música">
            <label for="hobbie2">Música</label>
            <input type="checkbox" id="hobbie3" name="hobbies[]" value="Lectura">
            <label for="hobbie3">Lectura</label>
        </li>
        <li>
            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario"></textarea>
        </li>
    </ul>
    <button type="submit">Enviar Encuesta</button>
</form>

</body>
</html>
