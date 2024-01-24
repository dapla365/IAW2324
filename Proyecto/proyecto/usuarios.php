<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<div class="centrar">
<div class="user-container">
<h1 class="text-center m-3" >Usuarios</h1>
<table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
                <th class="text-center" scope="col">ID</th>
                <th class="text-center" scope="col">Nombre</th>
                <th class="text-center" scope="col">Rol</th>
                <th class="text-center" scope="col" colspan="3">Operaciones</th>
            </tr>  
          </thead>
            <tbody>

        <?php
            require_once "components/conexion.php";
            $query="SELECT * FROM `usuarios`";     
            $vista_usuarios = mysqli_query($mysqli, $query);

            while($row = mysqli_fetch_assoc($vista_usuarios)){
              $id = $row['id'];                
              $username = $row['username'];     
              if($usuario != $username){
                $rol = $row['rol'];  

                $query_rol="SELECT `nombre` FROM `roles` WHERE id=$rol";          
                $vista_roles = mysqli_query($mysqli, $query_rol);
                $rol_name = mysqli_fetch_assoc($vista_roles);

                $rol_name = ucfirst(mb_strtolower($rol_name['nombre']));

                echo "<tr>";
                echo "<td class='text-center'> {$id}</td>";
                echo "<td class='text-center'> {$username}</td>";
                echo "<td class='text-center'> {$rol_name}</td>";
                echo "<td class='text-center'>  <a href='delete.php?eliminar={$id}' class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</a> </td>";
                echo "<td class='text-center'>  <a href='editar_rol.php?editor_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar</a> </td>";
                echo "<td class='text-center'>  <a href='delete.php?eliminar={$id}' class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</a> </td>";
                echo "</tr> ";
                }
            }  
        ?>

            </tbody>
        </table>    
</div>
</div>

<?php include "components/footer.php" ?>