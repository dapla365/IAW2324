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
?>

<h2 class="text-center m-3">Actualizar incidencia</h2>
<div class="centrar">
  <div class="contenedor">
    <form action="" method="post">
    <div class="form-group">
            <label for="planta" class="form-label">Planta</label>
            <select id="planta" name="planta" class="form-control" onChange="cambiarPlanta()">
                <option value="Baja">Baja</option>
                <option value="Primera">Primera</option>
                <option value="Segunda">Segunda</option>
            </select>
      </div>
      <div class="form-group">
            <label for="aula" class="form-label">Aula</label>
            <select id="aula" name="aula" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
      </div>
      <div class="form-group">
        <label for="descripcion" >Descripción</label>
        <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion ?>">
      </div>
      <div class="form-group">
        <label for="fecha_alta" >Fecha alta</label>
        <input type="date" name="fecha_alta" class="form-control" value="<?php echo $fecha_alta ?>" max="hoy" onChange='cambiarFecha()'>
      </div>
      <div class="form-group">
        <label for="fecha_rev" >Fecha revisión</label>
        <input type="date" name="fecha_rev" class="form-control" value="<?php echo $fecha_rev ?>" max="hoy" >
      </div>
      <div class="form-group">
        <label for="fecha_sol" >Fecha solución</label>
        <input type="date" name="fecha_sol" class="form-control" value="<?php echo $fecha_sol ?>" max="hoy">
      </div>
      <div class="form-group">
        <label for="comentario" >Comentario</label>
        <input type="text" name="comentario" class="form-control" value="<?php echo $comentario ?>">
      </div>
      <div class="form-group">
         <input type="submit" name="editar" class="btn btn-primary mt-2" value="editar">
      </div>

<?php
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
          echo "<p><strong>Error: </strong>¡Tiene que completar los campos obligatorios!</p>";
        }else{
          $query = "UPDATE incidencias SET planta = '{$planta}' , aula = '{$aula}' , descripcion = '{$descripcion}', fecha_alta = ".$fecha_alta.", fecha_revision = ".$fecha_rev.", fecha_solucion = ".$fecha_sol.", comentario = '{$comentario}' WHERE id = {$id}";
          $resultado = mysqli_query($mysqli,$query);
          if (!$resultado) {
              echo "<p><strong>Error: </strong>Algo ha ido mal actualizando la incidencia: ". mysqli_error($mysqli)."</p>";
          }
          else
          {
            header("Refresh:3; url=index.php");
            echo "<p> ¡Datos de la incidencia actualizados!. Redirigiendo...</p>";
            echo "<p> Si no redirige puedes hacer <a href='index.php'>click aquí</a></p>";
          }   
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