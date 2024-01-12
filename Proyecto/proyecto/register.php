<?php include "components/header.php" ?>

<h2>Registro</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nombre">Nombre de Usuario:</label>
    <input type="text" name="nombre" required><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" required><br>

    <input type="submit" value="Registrarse">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once "components/conexion.php";

    $nombre = mb_strtolower(htmlspecialchars($_POST["nombre"]));
    $contrasena =  htmlspecialchars($_POST["contrasena"]);

    // Hash de la contraseña
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar usuario en la base de datos
    $sql = "INSERT INTO usuarios (username, contrasena) VALUES ('$nombre', '$contrasena_hash')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Registro exitoso";
        header("Refresh:3; url=https://dapla.thsite.top/proyecto/login.php");
    } else {
        echo "Error en el registro: " . $mysqli->error;
    }

    $mysqli->close();
}
?>

<?php include "components/footer.php" ?>
