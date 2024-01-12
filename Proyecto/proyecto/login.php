
<?php include "components/header.php" ?>

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

        $sql_usuario="SELECT * FROM `usuarios` WHERE `username` LIKE '".$nombre."'";
        $sql_contrasena="SELECT `contrasena` FROM `usuarios` WHERE `username` LIKE '".$nombre."'";

        $result_user = mysqli_query($mysqli, $sql_usuario);


        //echo mysqli_num_rows($result_user);
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
                header("Location: https://dapla.thsite.top/proyecto/app/app.php");
    
                mysqli_close($mysqli);
            }else{
                mysqli_free_result($result_pass);
                echo "<p><strong class='error_login'>Error: </strong>usuario o contraseña incorrecta.</p>";
            }
        }else{
            mysqli_free_result($result_user);
            echo "<p><strong class='error_login'>Error: </strong>usuario o contraseña incorrecta.</p>";
        }
    }
    else{
        echo "<p><strong class='error_login'>Error: </strong>rellene todos los campos.</p>";
    }
}
?>

<?php include "components/footer.php" ?>

