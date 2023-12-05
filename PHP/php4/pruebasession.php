<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebasession</title>
</head>
<body>
    <h1>Pruebasession</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre"  placeholder="Nombre" required>

        <label for="correo">Correo: </label>
        <input type="email" id="correo" name="correo" placeholder="Correo" required>
        <button type="submit">Enviar</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $correo = htmlspecialchars($_POST["correo"]);
            $nombre = htmlspecialchars($_POST["nombre"]);


            session_start();
            $_SESSION["nombre"] = $nombre;
            $_SESSION["correo"] = $correo;
            echo "Sesion creada y valores añadidos.<br><br>";

            echo session_id();

            header("refresh:5;url=pruebasession2.php");

    }
    ?>
</body>
</html>