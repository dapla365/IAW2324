<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Usuario: </label>
        <input type="text" id="name" name="name"/>

        <label for="password">Contraseña: </label>
        <input type="text" id="password" name="password"/>
        
        <button type="submit">Login</button>
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST["name"]);
            $pass = htmlspecialchars($_POST["password"]);

            if($name == 'admin' && $pass == 'H4CK3R4$1R')
                echo '<p>Acceso concedido</p>';
            else
                echo '<p>Acceso denegado</p>';
            
        }
    ?>
</body>
</html>