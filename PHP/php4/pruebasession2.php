<?php
session_start();

// Verifica si se ha enviado una solicitud para cerrar la sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cerrar_sesion'])) {
    // Destruye todas las variables de sesión
    session_unset();
    $_SESSION = array();
    

    // Finaliza la sesión
    session_destroy();

    echo 'Sesión cerrada exitosamente';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Pruebasession2</title>
</head>
<body>
    <h1>Pruebasession2</h1>
    <button id="cerrarSesion">Cerrar sesion</button>

    <?php
        session_start();

        echo "<p> Tu nombre es: ". $_SESSION['nombre'] . "</p>";
        echo "<p> Tu correo es: ". $_SESSION['correo'] . "</p>";
        echo "<p> Tu id es: ". session_id() . "</p>";

    ?>

<script>
    $(document).ready(function() {
        $("#cerrarSesion").click(function() {
            // Envía una solicitud al servidor para cerrar la sesión
            $.ajax({
                url: '<?php echo $_SERVER['PHP_SELF']; ?>',
                method: 'POST',
                data: {cerrar_sesion: true},
                success: function(response) {
                    // Manejar la respuesta del servidor
                    console.log(response);
                    
                    // Puedes redirigir a otra página después de cerrar la sesión si es necesario
                    setTimeout(function() {
                        window.location.href = 'pruebasession.php';
                    }, 3000);
                },
                error: function(error) {
                    console.error('Error al cerrar sesión: ', error);
                }
            });
        });
    });
</script>
</body>
</html>