<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<div class="container">
<h1 class="text-center m-3" >Incidencias</h1>
<a href="incidencias_completadas.php" id="incidencias_completadas" class='btn btn-outline-dark mb-2'> <i class="bi bi-clipboard-check"></i> Incidencia resueltas (<?php echo $completadas; ?>)</a>
<a href="incidencias_pendientes.php" id="incidencias_pendientes" class='btn btn-outline-dark mb-2'> <i class="bi bi-clipboard-x"></i> Incidencias pendientes (<?php echo $pendientes; ?>)</a>    
<a href="create.php" id="incidencias_create" class='btn btn-outline-dark mb-2'> <i class="bi bi-clipboard-plus"></i></a>  

      <table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th class="text-center" scope="col">Planta</th>
              <th class="text-center" scope="col">Aula</th>
              <th class="text-center" scope="col">Descripción</th>
              <th class="text-center" scope="col">Fecha alta</th>
              <th class="text-center" scope="col">Fecha revisión</th>
              <th class="text-center" scope="col">Fecha solución</th>
              <th class="text-center" scope="col">Comentario</th>
              <th class="text-center" scope="col">Usuario</th>
              <th class="text-center" scope="col" colspan="3">Operaciones</th>
            </tr>  
          </thead>
            <tbody>

 
          <?php

            $query="SELECT * FROM `incidencias`";               
            $vista_incidencias= mysqli_query($mysqli,$query);

            while($row = mysqli_fetch_assoc($vista_incidencias)){
              $id = $row['id'];                
              $planta = $row['planta'];        
              $aula = $row['aula'];         
              $descripcion = $row['descripcion'];        
              $fecha_alta = $row['fecha_alta'];        
              $fecha_rev = $row['fecha_revision'];        
              $fecha_sol = $row['fecha_solucion'];        
              $comentario = $row['comentario']; 
              $usuario = $row['usuario']; 

              /* DAR FORMATO FECHA */
              if($fecha_alta != ""){
                $fecha_alta_array = explode("-",$fecha_alta);
                $fecha_alta = $fecha_alta_array[2].'/'.$fecha_alta_array[1].'/'.$fecha_alta_array[0];
              }
              if($fecha_rev != ""){
                $fecha_rev_array = explode("-",$fecha_rev);
                $fecha_rev = $fecha_rev_array[2].'/'.$fecha_rev_array[1].'/'.$fecha_rev_array[0];
              }
              if($fecha_sol != ""){
                $fecha_sol_array = explode("-",$fecha_sol);
                $fecha_sol = $fecha_sol_array[2].'/'.$fecha_sol_array[1].'/'.$fecha_sol_array[0];
              }

              echo "<tr>";
              echo " <td > {$planta}</td>";
              echo " <td > {$aula}</td>";
              echo " <td >{$descripcion} </td>";
              echo " <td >{$fecha_alta} </td>";
              echo " <td >{$fecha_rev} </td>";
              echo " <td >{$fecha_sol} </td>";
              echo " <td >{$comentario} </td>";
              echo " <td >{$usuario} </td>";
              echo " <td class='text-center'> <a href='view.php?incidencia_id={$id}' class='btn btn-primary'> <i class='bi bi-eye'></i> Ver</a> </td>";
              echo " <td class='text-center' > <a href='update.php?editar&incidencia_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar</a> </td>";
              echo " <td class='text-center'>  <a href='delete.php?eliminar={$id}' class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</a> </td>";
              echo " </tr> ";
                  }  
                 ?>
              </tr>  
            </tbody>
        </table>
  </div>
<?php include "components/footer.php" ?>