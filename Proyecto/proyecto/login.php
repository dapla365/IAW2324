
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h2>Iniciar Sesión</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nombre">Nombre de Usuario:</label>
    <input type="text" name="nombre" required><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" required><br>

    <input type="submit" value="Iniciar Sesión">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre=mb_strtolower(htmlspecialchars($_POST["nombre"]));
    $contrasena=htmlspecialchars($_POST["contrasena"]);
    if(!empty($nombre) && !empty($contrasena)){
        require_once 'components/conexion.php';

        $existe_usuario="SELECT * FROM `usuarios` WHERE `username` LIKE '".$nombre."'";
        //$consulta_existe=mysqli_query($mysqli,$existe_usuario);

        if ($result = mysqli_query($mysqli, $existe_usuario)) {
            echo "Returned rows are: " . mysqli_num_rows($result);
            // Free result set
            mysqli_free_result($result);
        }
        /*if(mysqli_num_rows($consulta_existe)>0){
            $query_contrasena=`SELECT PASSWORD FROM usuarios WHERE username='$nombre'`;
            $verifica_contrasena=mysqli_query($mysqli,$query_contrasena);
            $contrasena_bd=mysqli_fetch_array($verifica_contrasena);

            if(password_verify($contrasena,$contrasena_bd[0])){
                session_set_cookie_params(120);
                session_start();
                $_SESSION['usuario']=$nombre;
                header("Refresh:3; url=https://dapla.thsite.top/proyecto/app/app.php");

                mysqli_close($mysqli);
            }
            else{
                echo "<p><strong class='error_login'>Error: </strong>usuario o contraseña incorrecta.</p>";
            }
        }
        else{
            echo "<p><strong class='error_login'>Error: </strong>usuario o contraseña incorrecta.</p>";
        }*/
    }
    else{
        echo "<p><strong class='error_login'>Error: </strong>rellene todos los campos.</p>";
    }
}
?>
</body>
</html>

