<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<?php 
//SOLO ADMINISTRADORES PUEDEN ACCEDER A ESTA SECCION
if($user_nivel <= 5){
  $pagina = $_SERVER['HTTP_REFERER'];
  header("Location: $pagina");
}
?>
<div class="centrar">
<div class="user-container">
<h2 class="text-center m-3" >Usuarios</h2>
<table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
                <?php if($user_nivel > 5){echo '<th class="text-center" scope="col">ID</th>';}?>
                <th class="text-center" scope="col">Nombre</th>
                <th class="text-center" scope="col">Rol</th>
                <?php if($user_nivel > 5){echo "<th class='text-center' scope='col'>Incicencias</th>";}?>
                <?php if($user_nivel > 5){echo "<th class='text-center' scope='col' colspan='2'>Operaciones</th>";}?>
            </tr>  
          </thead>
            <tbody>

        <?php

            $a="SELECT * FROM `usuarios`";     
            $a = mysqli_query($mysqli, $a);

            while($row = mysqli_fetch_assoc($a)){
              $id = $row['id'];                
              $username = $row['username'];     
              if($user_username != $username){
                $rol = $row['rol'];  

                $b="SELECT `nombre` FROM `roles` WHERE id=$rol";          
                $b = mysqli_query($mysqli, $b);
                $b = mysqli_fetch_assoc($b);

                $rol = ucfirst(mb_strtolower($b['nombre']));

                echo "<tr>";
                if($user_nivel > 5){
                  echo "<td class='text-center'> {$id}</td>";
                }
                echo "<td class='text-center'> {$username}</td>";
                echo "<td class='text-center'> {$rol}</td>";

                if($user_nivel > 5){
                  $x = "SELECT COUNT(*) as total_user FROM incidencias WHERE usuario='{$id}'";  
                  $x = mysqli_query($mysqli,$x);
                  $total_user = mysqli_fetch_assoc($x)['total_user'];
                  echo "<td class='text-center'>{$total_user}</td>";
               }

                if($user_nivel > 5){
                  echo "<td class='text-center'>  <a href='editar_rol.php?editorid={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar</a> </td>";
                  echo "<td class='text-center'>  <button onClick='secureDelete(`$username`,`$id`)' class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</button> </td>";
                }
               
                echo "</tr> ";
                }
            }  
        ?>

            </tbody>
        </table>
  <?php 
  //SOLO ADMINISTRADORES PUEDEN ACCEDER A ESTA SECCION
  if($user_nivel > 5){
    echo '
    <div class="container text-center mt-5">
      <a href="addUser.php" class="btn btn-primary mt-5"> Crear usuario </a>
    </div>';
  }
  ?>    
</div>
</div>

<?php include "components/footer.php" ?>