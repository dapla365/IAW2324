<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<?php 

if($user_nivel <= 5){
  header("Location: index.php");
} 
?>

<div class="body">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>Añadir usuario</h2>
    <div class="form__container">
        <div class="form__group">
                <select id="rol" name="rol" class="form-control">
                    <?php 
                    $a="SELECT * FROM roles";     
                    $a= mysqli_query($mysqli, $a);
                    while($row = mysqli_fetch_assoc($a)){
                        $option = ucfirst(mb_strtolower($row['nombre']));
                        echo "<option value='$option'>$option</option>";
                    }
                    ?>
                </select>
        </div>
        <div class="form__group">
            <input type="email" name="email" placeholder=" " required>
            <label for="email">Correo:</label>
            <span class="form_line"></span>
        </div>
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
        <input class="form_submit" type="submit" value="Regístrar">
    </div>
    
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($user_nivel <= 5){
        echo "<p><strong>Error: </strong>¡No tienes permisos para editar al usuario!</p>";
    }else{ 
        $rol = mb_strtoupper(htmlspecialchars($_POST['rol']));
        $correo = mb_strtolower(htmlspecialchars($_POST["email"]));
        $nombre = mb_strtolower(htmlspecialchars($_POST["nombre"]));
        $contrasena_uno = htmlspecialchars($_POST["contrasena_uno"]);
        $contrasena_dos = htmlspecialchars($_POST["contrasena_dos"]);

        //LOGIN CON USUARIO O CORREO
        $sql_usuario="SELECT * FROM usuarios WHERE username ='$nombre'";
        $result_user = mysqli_query($mysqli, $sql_usuario);
        $sql_correo="SELECT * FROM usuarios WHERE correo = '$correo'";
        $result_correo = mysqli_query($mysqli, $sql_correo);

        if(mysqli_num_rows($result_user)>0 || mysqli_num_rows($result_correo)>0){
            mysqli_free_result($result_user);
            //Esta registrado
            echo "<p><strong>Error: </strong>el usuario ya está registrado.</p>";
        }else{
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                echo "Esta dirección de correo ($correo) no es válida.";
            }else{
                mysqli_free_result($result_user);
                if($contrasena_uno == $contrasena_dos){
                    // Hash de la contraseña
                    $contrasena_hash = password_hash($contrasena_uno, PASSWORD_DEFAULT);

                    $a = "SELECT id FROM roles WHERE nombre LIKE '$rol'";
                    $a = mysqli_query($mysqli, $a);
                    $rolnuevo = mysqli_fetch_assoc($a)['id'];

                    // Insertar usuario en la base de datos
                    $sql = "INSERT INTO usuarios (username, contrasena, correo, rol) VALUES ('$nombre', '$contrasena_hash', '$correo', '$rolnuevo')";

                    if ($mysqli->query($sql) === TRUE) {
                        echo "<p> Has añadido un usuario correctamente. Redirigiendo...</p>";
                        echo "<p> Si no redirige puedes hacer <a href='index.php'>click aquí</a></p>";


                        header("Refresh:3; url=index.php");
                    } else {
                        echo "Error en el registro: " . $mysqli->error;
                    }

                    $mysqli->close();
                }else{
                    echo "<p><strong>Error: </strong>las contraseñas no coinciden.</p>";
                }
            }
        }
    }
}
?>
</form>
</div>
<?php include "components/footer.php" ?>
