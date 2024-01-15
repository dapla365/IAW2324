
<?php include "components/header.php" ?>
<link rel="stylesheet" href="css/form.css">
<div class="body">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>Iniciar Sesión</h2>
    <p>¿Aún no tienes cuenta? <a href="https://dapla.thsite.top/proyecto/register.php">Regístrate</a></p>

    <div class="form__container">
        <div class="form__group">
            <input type="text" name="nombre" placeholder=" " required>
            <label for="nombre">Usuario:</label>
            <span class="form_line"></span>
        </div>
        <div class="form__group">
            <input type="password" name="contrasena" placeholder=" " required>
            <label for="contrasena">Contraseña:</label>
            <span class="form_line"></span>
        </div>
        <input class="form_submit" type="submit" value="Iniciar Sesión">
    </div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre=mb_strtolower(htmlspecialchars($_POST["nombre"]));
    $contrasena=htmlspecialchars($_POST["contrasena"]);
    if(!empty($nombre) && !empty($contrasena)){
        require_once 'components/conexion.php';

        $sql_usuario="SELECT * FROM `usuarios` WHERE `username` LIKE '".$nombre."'";
        $sql_contrasena="SELECT `contrasena` FROM `usuarios` WHERE `username` LIKE '".$nombre."'";

        $result_user = mysqli_query($mysqli, $sql_usuario);

        if(mysqli_num_rows($result_user)>0){
            mysqli_free_result($result_user);
            //Esta registrado

            $result_pass = mysqli_query($mysqli, $sql_contrasena);
            $contrasena_bd = mysqli_fetch_array($result_pass, MYSQLI_NUM);
        
            if(password_verify($contrasena, $contrasena_bd[0])){
                mysqli_free_result($result_pass);

                session_set_cookie_params(120);
                session_start();
                $_SESSION['usuario']=$nombre;
                header("Location: https://dapla.thsite.top/proyecto/index.php");
    
                mysqli_close($mysqli);
            }else{
                mysqli_free_result($result_pass);
                echo "<p><strong>Error: </strong>usuario o contraseña incorrecta.</p>";
            }
        }else{
            mysqli_free_result($result_user);
            echo "<p><strong>Error: </strong>usuario o contraseña incorrecta.</p>";
        }
    }
    else{
        echo "<p><strong>Error: </strong>rellene todos los campos.</p>";
    }
}
?>
</form>
</div>
<?php include "components/footer.php" ?>

