<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>
<?php 
      if($user_nivel <= 5){
        header("Location: usuarios.php");
      }

       if(isset($_GET['editorid']))
        {
          $editorid = htmlspecialchars($_GET['editorid']); 
        }
        $a="SELECT * FROM usuarios WHERE id=$editorid";     
        $a = mysqli_query($mysqli, $a);

        while($row = mysqli_fetch_assoc($a)){
          $id = $row['id'];                
          $username = $row['username'];     
          if($user_username != $username){
            $rol = $row['rol'];  

            $b="SELECT `nombre` FROM `roles` WHERE id=$rol";          
            $b = mysqli_query($mysqli, $b);
            $b = mysqli_fetch_assoc($b);
            $rol_name = ucfirst(mb_strtolower($b['nombre']));
          }  
        }
?>
<h2 class="text-center m-3">Editar usuario</h2>
<div class="centrar">
  <div class="contenedor">
    <form action="" method="post">
      <div class="form-group">
        <label for="user" class="form-label">Usuario</label>
        <input type="text" name="user" class="form-control" value="<?php echo "$username";?>" disabled>
      </div>

      <div class="form-group">
            <label for="rol" class="form-label">Rol</label>
            <select id="rol" name="rol" class="form-control">
                <?php 
                $a="SELECT nombre FROM roles";     
                $a = mysqli_query($mysqli, $a);
        
                echo "<option value='$rol_name'>$rol_name</option>";

                while($row = mysqli_fetch_assoc($a)){
                  $option = ucfirst(mb_strtolower($row['nombre']));
                  if($rol_name != $option){
                    echo "<option value='$option'>$option</option>";
                  }
                }
                ?>
            </select>
      </div>

      <div class="form-group">
        <label for="pass" class="form-check-label">Restablecer contraseña</label>
        <input type="checkbox" name="pass" class="form-check-input">
      </div>
      <div class="form-group">
        <input type="submit" name="editar" class="btn btn-primary mt-2" value="editar">
      </div>
<?php 

  if(isset($_POST['editar'])) 
    {
      if($user_nivel <= 5){
        echo "<p><strong>Error: </strong>¡No tienes permisos para editar al usuario!</p>";
      }else{      
        $rol = mb_strtoupper(htmlspecialchars($_POST['rol']));
        $pass = htmlspecialchars($_POST['pass']);

        $a = "SELECT id FROM roles WHERE nombre LIKE '$rol'";
        $a = mysqli_query($mysqli, $a);
        $rolnuevo = mysqli_fetch_assoc($a)['id'];
        
        $query = "UPDATE usuarios SET rol = '{$rolnuevo}' WHERE id = {$editorid}";
        if(isset($_POST['pass'])){
          $pass = $username.$editorid;
          $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

          $query = "UPDATE usuarios SET rol = '{$rolnuevo}', contrasena = '{$pass_hash}' WHERE id = {$editorid}";
        }

        $a = mysqli_query($mysqli, $query);
        if (!$a) {
            echo "<p><strong>Error: </strong>Algo ha ido mal editando al usuario: ". mysqli_error($mysqli)."</p>";
        }
        else
        {
          if(isset($_POST['pass'])){
            echo "<p> ¡Usuario editado con éxito!.</p>";
            echo "<script>alert('La nueva contraseña del usuario $username es: $pass');</script>";
          }else{
            header("Refresh:3; url=usuarios.php");
            echo "<p> ¡Usuario editado con éxito!. Redirigiendo...</p>";
            echo "<p> Si no redirige puedes hacer <a href='usuarios.php'>click aquí</a></p>";
          }
        }      
      }
    }
?>
    </form> 
  </div>
  </div>
  <div class="container text-center mt-5">
    <a href="usuarios.php" class="btn btn-warning mt-5"> Volver </a>
  </div>

  <?php include "components/footer.php" ?>