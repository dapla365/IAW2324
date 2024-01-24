<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<div class="centrar">
<div class="user-container">
<h1 class="text-center m-3" >Usuarios</h1>
<table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
                <?php if($nivel > 5){echo '<th class="text-center" scope="col">ID</th>';}?>
                <th class="text-center" scope="col">Nombre</th>
                <th class="text-center" scope="col">Rol</th>
                <?php if($nivel > 5){echo "<th class='text-center' scope='col' colspan='2'>Operaciones</th>";}?>
                
            </tr>  
          </thead>
            <tbody>

        <?php

            $query="SELECT * FROM `usuarios`";     
            $vista_usuarios = mysqli_query($mysqli, $query);

            while($row = mysqli_fetch_assoc($vista_usuarios)){
              $id_user = $row['id'];                
              $username_user = $row['username'];     
              if($usuario != $username_user){
                $rol_user = $row['rol'];  

                $query_rol="SELECT `nombre` FROM `roles` WHERE id=$rol_user";          
                $vista_roles = mysqli_query($mysqli, $query_rol);
                $rol_user_name = mysqli_fetch_assoc($vista_roles);

                $rol_user_name = ucfirst(mb_strtolower($rol_user_name['nombre']));

                echo "<tr>";
                if($nivel > 5){
                  echo "<td class='text-center'> {$id_user}</td>";
                }
                echo "<td class='text-center'> {$username_user}</td>";
                echo "<td class='text-center'> {$rol_user_name}</td>";
                
                if($nivel > 5){
                  echo "<td class='text-center'>  <a href='editar_rol.php?editorid={$id_user}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar</a> </td>";
                  echo "<td class='text-center'>  <button onClick='secureDelete(`$username_user`,`$id_user`)' class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</button> </td>";
                }
               
                echo "</tr> ";
                }
            }  
        ?>

            </tbody>
        </table>    
</div>
</div>

<?php include "components/footer.php" ?>