<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweets</title>
    <style>
        .tweet {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
        }

        .usuario {
            font-weight: bold;
        }

        .contenido {
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h1>Tweets</h1>    
    <?php
        $tweets = array(
            array("usuario" => "Usuario1", "contenido" => "Ejemplo 1.", "id" => "1"),
            array("usuario" => "Usuario2", "contenido" => "Ejemplo 2.", "id" => "2"),
            array("usuario" => "Usuario3", "contenido" => "Ejemplo 3.", "id" => "3"),
        );

        function crearTweet($usuario, $contenido, $id) {
            echo '<div class="tweet" id="' . $id . '">';
            echo '<p class="usuario">' . $usuario . '</p>';
            echo '<p class="contenido">' . $contenido . '</p>';
            echo '<img width="20px" onclick="eliminar(`' . $id .'`)" src="https://cdn-icons-png.flaticon.com/512/58/58326.png" alt="papelera">';
            echo '</div>';
        }

        foreach ($tweets as $tweet) {
            crearTweet($tweet['usuario'], $tweet['contenido'], $tweet['id']);
        } 
    ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
        function eliminar(id) {
            $("#"+id).remove();
        }
    </script>

</body>
</html>
