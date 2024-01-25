<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<h2 class="text-center m-3">Cambiar contraseña</h2>
<div class="centrar">
  <div class="contenedor">
    <form action="" method="post">
        <div class="form-group">
            <label for="user" class="form-label">Usuario</label>
            <input type="text" name="user" class="form-control" value="<?php echo "$user_username";?>" disabled>
        </div>
        <div class="form-group">
            <label for="rol" class="form-label">Rol</label>
            <input type="text" name="rol" class="form-control" value="<?php echo "$user_rolname";?>" disabled>
        </div>
        <div class="form-group">
            <label for="contrasena_uno">Contraseña:</label>
            <input type="password" name="contrasena_uno" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contrasena_dos">Repite contraseña:</label>
            <input type="password" name="contrasena_dos" class="form-control" required>
        </div>
      <div class="form-group">
        <input type="submit" name="cambiar" class="btn btn-primary mt-2" value="Cambiar">
      </div>
<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $contrasena_uno = htmlspecialchars($_POST["contrasena_uno"]);
    $contrasena_dos = htmlspecialchars($_POST["contrasena_dos"]);

    if($contrasena_uno == $contrasena_dos){
        // Hash de la contraseña
        $contrasena_hash = password_hash($contrasena_uno, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET contrasena = '{$contrasena_hash}' WHERE username = '{$user_username}'";
          
        if ($mysqli->query($sql) === TRUE) {
            echo "<p> Contraseña cambiada correctamente. Redirigiendo...</p>";
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
?>
    </form> 
  </div>
  </div>
  <div class="container text-center mt-5">
    <a href="index.php" class="btn btn-warning mt-5"> Volver </a>
  </div>

  <?php include "components/footer.php" ?>