<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<?php
  require_once 'components/conexion.php';

   if(isset($_GET['incidencia_id']))
    {
      $incidenciaid = htmlspecialchars($_GET['incidencia_id']); 
    }
      
      $query="SELECT * FROM incidencias WHERE id = $incidenciaid ";
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
        }
 
    if(isset($_POST['editar'])) 
    {
      $planta = htmlspecialchars($_POST['planta']);
      $aula = htmlspecialchars($_POST['aula']);
      $descripcion = htmlspecialchars($_POST['descripcion']);
      $fecha_alta = htmlspecialchars($_POST['fecha_alta']);
      $fecha_rev = htmlspecialchars($_POST['fecha_rev']);
      $fecha_sol = htmlspecialchars($_POST['fecha_sol']);
      $comentario = htmlspecialchars($_POST['comentario']);
      if($fecha_rev != ""){
        if($fecha_sol != ""){
          $query = "UPDATE incidencias SET planta = '{$planta}' , aula = '{$aula}' , descripcion = '{$descripcion}', fecha_alta = '{$fecha_alta}', fecha_revision = '{$fecha_rev}', fecha_solucion = '{$fecha_sol}', comentario = '{$comentario}' WHERE id = {$id}";
      
        }else{
          $query = "UPDATE incidencias SET planta = '{$planta}' , aula = '{$aula}' , descripcion = '{$descripcion}', fecha_alta = '{$fecha_alta}', fecha_revision = '{$fecha_rev}', comentario = '{$comentario}' WHERE id = {$id}";
        }
      }else{
        $query = "UPDATE incidencias SET planta = '{$planta}' , aula = '{$aula}' , descripcion = '{$descripcion}', fecha_alta = '{$fecha_alta}', comentario = '{$comentario}' WHERE id = {$id}";
      }
      
      $incidencia_actualizada = mysqli_query($mysqli, $query);
      if (!$incidencia_actualizada)
        echo "Se ha producido un error al actualizar la incidencia.";
      else
        echo "<script type='text/javascript'>alert('¡Datos de la incidencia actualizados!')</script>";
        header("Refresh:3; url=index.php");
      } 
      
      
      if(isset($_POST['editar'])) 
    {
        $planta = htmlspecialchars($_POST['planta']);
        $aula = htmlspecialchars($_POST['aula']);
        $descripcion = htmlspecialchars($_POST['descripcion']);
        $fecha_alta = htmlspecialchars($_POST['fecha_alta']);
        $fecha_rev = htmlspecialchars($_POST['fecha_rev']);
        $fecha_sol = htmlspecialchars($_POST['fecha_sol']);
        $comentario = htmlspecialchars($_POST['comentario']);

          /* REVISA LAS FECHAS POR SI SON NULL */
          /* FECHA ALTA */
          if($fecha_alta == ""){
            $fecha_alta = 'NULL';
          }else{
            $fecha_alta = "'".$fecha_alta."'";
          }
          /* FECHA REVISION */
          if($fecha_rev == ""){
            $fecha_rev = 'NULL';
          }else{
            $fecha_rev = "'".$fecha_rev."'";
          }
          /* FECHA SOLUCION */
          if($fecha_sol == ""){
            $fecha_sol = 'NULL';
          }else{
            $fecha_sol = "'".$fecha_sol."'";
            if($fecha_rev == "" || $fecha_rev == 'NULL'){
              $fecha_rev = $fecha_sol;
            }
            if($fecha_alta == "" || $fecha_alta == 'NULL'){
              $fecha_alta = $fecha_sol;
            }
          }

        if($planta == "" || $aula == "" || $descripcion == "" || $fecha_alta == "" || $fecha_alta == 'NULL'){
          echo "<script type='text/javascript'>alert('¡Tiene que completar los campos obligatorios!')</script>";
        }else{
          $query = "UPDATE incidencias SET planta = '{$planta}' , aula = '{$aula}' , descripcion = '{$descripcion}', fecha_alta = ".$fecha_alta.", fecha_revision = ".$fecha_rev.", fecha_solucion = ".$fecha_sol.", comentario = '{$comentario}' WHERE id = {$id}";
          $resultado = mysqli_query($mysqli,$query);
          if (!$resultado) {
              echo "Algo ha ido mal añadiendo la incidencia: ". mysqli_error($mysqli);
          }
          else
          {
            header("Refresh:3; url=index.php");
            echo "<script type='text/javascript'>alert('¡Incidencia añadida con éxito!')</script>";
          }   
        }      
    }
?>

<h1 class="text-center m-3">Actualizar incidencia</h1>
  <div class="container ">
    <form action="" method="post">
      <div class="form-group">
        <label for="planta" >Planta</label>
        <input type="text" name="planta" class="form-control" value="<?php echo $planta  ?>">
      </div>
      <div class="form-group">
        <label for="aula" >Aula</label>
        <input type="text" name="aula" class="form-control" value="<?php echo $aula  ?>">
      </div>
      <div class="form-group">
        <label for="descripcion" >Descripción</label>
        <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion  ?>">
      </div>
      <div class="form-group">
        <label for="fecha_alta" >Fecha alta</label>
        <input type="date" name="fecha_alta" class="form-control" value="<?php echo $fecha_alta  ?>">
      </div>
      <div class="form-group">
        <label for="fecha_rev" >Fecha revisión</label>
        <input type="date" name="fecha_rev" class="form-control" value="<?php echo $fecha_rev  ?>">
      </div>
      <div class="form-group">
        <label for="fecha_sol" >Fecha solución</label>
        <input type="date" name="fecha_sol" class="form-control" value="<?php echo $fecha_sol  ?>">
      </div>
      <div class="form-group">
        <label for="comentario" >Comentario</label>
        <input type="text" name="comentario" class="form-control" value="<?php echo $comentario  ?>">
      </div>
      <div class="form-group">
         <input type="submit" name="editar" class="btn btn-primary mt-2" value="editar">
      </div>
    </form>    
  </div>

    <div class="container text-center mt-5">
      <a href="index.php" class="btn btn-warning mt-5"> Volver </a>
  </div>

<?php include "components/footer.php" ?>