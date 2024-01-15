<?php include "components/header.php" ?>
<link rel="stylesheet" href="css/form.css">

<div class="body">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>Registro</h2>
    <p>¿Ya tienes cuenta? <a href="https://dapla.thsite.top/proyecto/login.php">Iniciar sesión</a></p>

    <div class="form__container">
        <div class="form__group">
            <input type="text" name="nombre" placeholder=" " required>
            <label for="nombre">Usuario:</label>
            <span class="form_line"></span>
        </div>
        <div class="form__group">
            <input type="password" name="contrasena_uno" placeholder=" " required>
            <label for="contrasena_uno">Contraseña:</label>
            <span class="form_line"></span>
        </div>
        <div class="form__group">
            <input type="password" name="contrasena_dos" placeholder=" " required>
            <label for="contrasena_dos">Repite contraseña:</label>
            <span class="form_line"></span>
        </div>
        <input class="form_submit" type="submit" value="Regístrate">
    </div>
    
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "components/conexion.php";

    $nombre = mb_strtolower(htmlspecialchars($_POST["nombre"]));
    $contrasena_uno = htmlspecialchars($_POST["contrasena_uno"]);
    $contrasena_dos = htmlspecialchars($_POST["contrasena_dos"]);

    $sql_usuario="SELECT * FROM `usuarios` WHERE `username` LIKE '".$nombre."'";
    $result_user = mysqli_query($mysqli, $sql_usuario);

    if(mysqli_num_rows($result_user)>0){
        mysqli_free_result($result_user);
        //Esta registrado
        echo "<p><strong>Error: </strong>el usuario ya está registrado.</p>";
    }else{
        mysqli_free_result($result_user);
        if($contrasena_uno == $contrasena_dos){
            // Hash de la contraseña
            $contrasena_hash = password_hash($contrasena_uno, PASSWORD_DEFAULT);

            // Insertar usuario en la base de datos
            $sql = "INSERT INTO usuarios (username, contrasena) VALUES ('$nombre', '$contrasena_hash')";

            if ($mysqli->query($sql) === TRUE) {
                echo "<p> Registro exitoso. Redirigiendo...</p>";
                echo "<p> Si no redirige puedes hacer <a href='https://dapla.thsite.top/proyecto/index.php'>click aquí</a></p>";

                session_set_cookie_params(120);
                session_start();
                $_SESSION['usuario']=$nombre;

                header("Refresh:3; url=https://dapla.thsite.top/proyecto/index.php");
            } else {
                echo "Error en el registro: " . $mysqli->error;
            }

            $mysqli->close();
        }else{
            echo "<p><strong>Error: </strong>las contraseñas no coinciden.</p>";
        }
    }
}
?>
</form>
</div>
<?php include "components/footer.php" ?>
