<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="usuario">Usuario: </label>
        <input type="text" id="usuario" name="usuario"  placeholder="usuario" required>

        <label for="pass">Contraseña: </label>
        <input type="text" id="pass" name="pass" required>
        <button type="submit">Enviar</button>
    </form>

    <?php
        include 'config.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = htmlspecialchars($_POST["usuario"]);
            $pass = htmlspecialchars($_POST["pass"]);


            if($usuario == $admin && $pass == $pass_admin)
                echo '<p>Acceso concedido</p>';
            else
                echo '<p>Acceso denegado</p>';
        }
    ?>
</body>
</html>