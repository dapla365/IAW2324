<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo</title>
    <style>
        input{
            margin: 2px;
        }
    </style>
</head>
<body>
    <h1>Correo</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <label for="destinatario">Destinatario</label>
        <input type="email" id="destinatario" name="destinatario"><br>

        <label for="asunto">Asunto</label>
        <input type="text" id="asunto" name="asunto"><br>

        <label for="texto">Mensaje</label>
        <input type="textbox" id="texto" name="texto" width="200px"><br><br>

        <button type="submit">Enviar</button>
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $destinatario = filter_var($_GET["destinatario"], FILTER_SANITIZE_EMAIL);
            $asunto = filter_var($_GET["asunto"], FILTER_SANITIZE_STRING);
            $texto = filter_var($_GET["texto"], FILTER_SANITIZE_STRING);

            $cabeceras = "From: davidplaza03@iesamachado.org";

            if (mail($destinatario, $asunto, $texto, $cabeceras)) {
                echo 'Correo enviado correctamente.';
            } else {
                echo 'Error al enviar el correo.';
            }
        }
    ?>
</body>
</html>