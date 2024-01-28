<?php include "components/user-data.php" ?>
<header>
  <div class="centro">
    <div class="nav1">
      <div class="izquierda">
        <a href="usuarios.php"><i class="bi bi-person-fill"></i><span> <?php echo "$user_username"?></span></a>
      </div>
    <a href="index.php"><h1>Incidencias AM</h1></a>
      <div class="derecha">
        <a href="user.php"><i class="bi bi-gear"></i></a>
        <a href="components/darkmode.php"><i class="<?php
                if($_SESSION['darkmode'] == 'dark'){
                    echo 'bi bi-brightness-high-fill';
                }else{
                    echo 'bi bi-moon-fill';
                }
            ?>"></i></a>
        <a href="login.php" id="salir">Salir</a>
      </div>
    </div>
    <div class="nav2">
      <ul>
        <li><a href="incidencias_completadas.php"><i class="bi bi-clipboard-check"></i><span> Incidencias completadas</span> (<?php echo $completadas; ?>)</a></li>
        <li><a href="create.php"><i class="bi bi-clipboard-plus"></i><span> Crear Incidencia</span></a></li>
        <li><a href="incidencias_pendientes.php"><i class="bi bi-clipboard-x"></i><span> Incidencias pendientes</span> (<?php echo $pendientes; ?>)</a></li>
      </ul>
    </div>
  </div>
</header>
