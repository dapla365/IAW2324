<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<h1 class="text-center m-3">Añadir incidencia</h1>
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
        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="text" name="descripcion" class="form-control">
      </div>
      <div class="form-group">
        <label for="fecha_alta" class="form-label">Fecha Alta</label>
        <input type="date" name="fecha_alta" class="form-control" max="hoy" onChange='cambiarFecha()' >
      </div>
      <div class="form-group">
        <label for="fecha_rev" class="form-label">Fecha Revisión</label>
        <input type="date" name="fecha_rev" class="form-control" max="hoy">
      </div>
      <div class="form-group">
        <label for="fecha_sol" class="form-label">Fecha Solución</label>
        <input type="date" name="fecha_sol" class="form-control" max="hoy">
      </div>
      <div class="form-group">
        <label for="comentario" class="form-label">Comentario</label>
        <input type="text" name="comentario" class="form-control">
      </div>
      <div class="form-group">
        <input type="submit" name="crear" class="btn btn-primary mt-2" value="Añadir">
      </div>
<?php 
  if(isset($_POST['crear'])) 
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
          $a = "INSERT INTO `incidencias` (`planta`, `aula`, `descripcion`, `fecha_alta`,`fecha_revision`,`fecha_solucion`,`comentario`, `usuario`) VALUES ('{$planta}','{$aula}','{$descripcion}',".$fecha_alta.", ".$fecha_rev.",". $fecha_sol.",'{$comentario}', '{$user_username}')";
          $a = mysqli_query($mysqli,$a);
          if (!$a) {
              echo "<p><strong>Error: </strong>Algo ha ido mal añadiendo la incidencia: ". mysqli_error($mysqli)."</p>";
          }
          else
          {
            header("Refresh:3; url=index.php");
            echo "<p> ¡Incidencia añadida con éxito!. Redirigiendo...</p>";
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