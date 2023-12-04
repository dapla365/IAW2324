<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebasession2</title>
</head>
<body>
    <h1>Pruebasession2</h1>
    <button onclick="cerrarSesion()">Cerrar sesion</button>

    <?php
        session_start();

        echo "<p> Tu nombre es: ". $_SESSION['nombre'] . "</p>";
        echo "<p> Tu correo es: ". $_SESSION['correo'] . "</p>";

        function cerrarSesion(){
            // Elimina todas las variables de sesión
            session_unset();
            
            // Destruye la sesión
            session_destroy();
            
            // Redirige a una página de inicio de sesión o cualquier otra página deseada
            header("Location: pruebasession.php");
            exit();
        }
    ?>
</body>
</html>