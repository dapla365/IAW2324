<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<div class="container">
<h2 class="text-center m-3" >Incidencias (<?php echo $total;?>)</h2>
      <table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th class="text-center" scope="col">Planta</th>
              <th class="text-center" scope="col">Aula</th>
              <th class="text-center" scope="col">Descripción</th>
              <th class="text-center" scope="col"><a href='index.php?orden=fecha_alta'> Fecha alta</a></th>
              <th class="text-center" scope="col">Fecha revisión</th>
              <th class="text-center" scope="col"><a href='index.php?orden=fecha_solucion'>Fecha solución</a></th>
              <th class="text-center" scope="col">Comentario</th>
              <th class="text-center" scope="col">Usuario</th>
              <?php
              if($user_nivel >= 5){
                echo "<th class='text-center' scope='col' colspan='3'>Operaciones</th>";
              }
              ?>
            </tr>  
          </thead>
            <tbody>

 
          <?php
            $q="SELECT * FROM incidencias"; 
            if (isset($_GET['orden'])) {
              $a = htmlspecialchars($_GET['orden']); 
             // echo $a;
              $a="SELECT * FROM `incidencias` ORDER BY `incidencias`.`{$a}` DESC";  
              $q= mysqli_query($mysqli,$a);            
            }else{
              $q= mysqli_query($mysqli, $q);
            }

            while($row = mysqli_fetch_assoc($q)){
              $u = $row['usuario'];
              $j="SELECT * FROM usuarios WHERE id='$u'";               
              $j= mysqli_query($mysqli, $j);
              while($rowb = mysqli_fetch_assoc($j)){
                $usuario = $rowb['correo']; 
              }

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
                $a = explode("-",$fecha_alta);
                $fecha_alta = $a[2].'/'.$a[1].'/'.$a[0];
              }
              if($fecha_rev != ""){
                $b = explode("-",$fecha_rev);
                $fecha_rev = $b[2].'/'.$b[1].'/'.$b[0];
              }
              if($fecha_sol != ""){
                $c = explode("-",$fecha_sol);
                $fecha_sol = $c[2].'/'.$c[1].'/'.$c[0];
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

              if($user_nivel >= 5){
                echo " <td class='text-center'> <a href='view.php?incidencia_id={$id}' class='btn btn-primary'> <i class='bi bi-eye'></i> Ver</a> </td>";
                echo " <td class='text-center' > <a href='update.php?editar&incidencia_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar</a> </td>";
              }
              if($user_nivel > 5){
                echo " <td class='text-center'>  <a href='delete.php?eliminar={$id}' class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</a> </td>";
              }
              echo " </tr> ";
                  }  
                 ?>
              </tr>  
            </tbody>
        </table>
  </div>
<?php include "components/footer.php" ?>