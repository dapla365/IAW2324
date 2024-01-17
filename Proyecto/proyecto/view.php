<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<h1 class="text-center m-3">Detalles de incidencia</h1>
  <div class="container">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
              <th scope="col">ID</th>
              <th  scope="col">Planta</th>
              <th  scope="col">Aula</th>
              <th  scope="col">Descripción</th>
              <th  scope="col">Fecha alta</th>
              <th  scope="col">Fecha revisión</th>
              <th  scope="col">Fecha solución</th>
              <th  scope="col">Comentario</th>
        </tr>  
      </thead>
        <tbody>
          <tr>
               
            <?php
              require_once 'components/conexion.php';

              if (isset($_GET['incidencia_id'])) {
                  $incidenciaid = htmlspecialchars($_GET['incidencia_id']); 
                  $query="SELECT * FROM `incidencias` WHERE `id` = {$incidenciaid} LIMIT 1";  
                  $vista_incidencias= mysqli_query($mysqli,$query);            

                  while($row = mysqli_fetch_assoc($vista_incidencias))
                  {
                    $id = $row['id'];                
                    $planta = $row['planta'];        
                    $aula = $row['aula'];         
                    $descripcion = $row['descripcion'];        
                    $fecha_alta = $row['fecha_alta'];        
                    $fecha_rev = $row['fecha_revision'];        
                    $fecha_sol = $row['fecha_solucion'];       
                    $comentario = $row['comentario'];

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


                        echo "<tr >";
                        echo " <td >{$id}</td>";
                        echo " <td > {$planta}</td>";
                        echo " <td > {$aula}</td>";
                        echo " <td >{$descripcion} </td>"; 
                        echo " <td >{$fecha_alta} </td>";
                        echo " <td >{$fecha_rev} </td>";
                        echo " <td >{$fecha_sol} </td>";
                        echo " <td >{$comentario} </td>";
                        echo " </tr> ";
                  }
                }
            ?>
          </tr>  
        </tbody>
    </table>
  </div>

  <div class="container text-center mt-5">
    <a href="index.php" class="btn btn-warning mt-5"> Volver </a>
  </div>

<?php include "components/footer.php" ?>