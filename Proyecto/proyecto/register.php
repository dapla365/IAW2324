<?php include "components/header.php" ?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>Registro</h2>
    <p>¿Ya tienes cuenta? <a href="https://dapla.thsite.top/proyecto/login.php">Login</a></p>

    <div class="form_container">
        <div class="form_group">
            <input type="text" name="nombre" placeholder=" " required>
            <label for="nombre">Usuario:</label>
            <span class="form_line"></span>
        </div>
        <div class="form_group">
            <input type="password" name="contrasena_uno" placeholder=" " required>
            <label for="contrasena_uno">Contraseña:</label>
            <span class="form_line"></span>
        </div>
        <div class="form_group">
            <input type="password" name="contrasena_dos" placeholder=" " required>
            <label for="contrasena_dos">Repite contraseña:</label>
            <span class="form_line"></span>
        </div>
        <input class="form_submit" type="submit" value="Regístrate">
    </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = mb_strtolower(htmlspecialchars($_POST["nombre"]));
    $contrasena_uno =  htmlspecialchars($_POST["contrasena_uno"]);
    $contrasena_dos =  htmlspecialchars($_POST["contrasena_dos"]);

    if($contrasena_uno == $contrasena_dos){
        require_once "components/conexion.php";
        // Hash de la contraseña
        $contrasena_hash = password_hash($contrasena_uno, PASSWORD_DEFAULT);

        // Insertar usuario en la base de datos
        $sql = "INSERT INTO usuarios (username, contrasena) VALUES ('$nombre', '$contrasena_hash')";

        if ($mysqli->query($sql) === TRUE) {
            echo "Registro exitoso";
            header("Refresh:3; url=https://dapla.thsite.top/proyecto/login.php");
        } else {
            echo "Error en el registro: " . $mysqli->error;
        }

        $mysqli->close();
    }else{
        echo "<p><strong>Error: </strong>usuario o contraseña incorrecta.</p>";
    }

}
?>

<?php include "components/footer.php" ?>
