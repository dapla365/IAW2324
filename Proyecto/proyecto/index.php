<?php include "header.php" ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nombre">Nombre: </label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>

    <label for="password">Contraseña: </label>
    <input type="password" id="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Iniciar sesión</button>
</form>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = htmlspecialchars($_POST["nombre"]);
        $password = htmlspecialchars($_POST["password"]);

        /* COMPROBAR BD USUARIO */
        
        
        
        /*session_start();
            
        $_SESSION["nombre"] = $nombre;
        $_SESSION["correo"] = $correo;
        echo "Sesion creada y valores añadidos.<br><br>";

        echo session_id();

        header("refresh:5;url=pruebasession2.php");*/

    }
?>

<?php include "footer.php" ?>