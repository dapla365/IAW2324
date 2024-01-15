<?php
    session_set_cookie_params(120);
    session_start();
    if(isset($_SESSION['usuario'])){
        $usuario=$_SESSION['usuario'];
    }
    else{
        header("Location: https://dapla.thsite.top/proyecto/login.php");
        session_abort();
        die();
    }
?>

<header>
    <div class="centro">
        <h1>Incidencias</h1>
        <div class="nav">
            <li><a href="index.php"><i class="bi bi-person-fill"></i> <?php echo "$usuario"?></a></li>
            <li><i class="bi bi-moon-fill night"></i></li>
            <li><i class="bi bi-brightness-high-fill light"></i></li>
            <li><a href="login.php">Salir <i class="bi bi-box-arrow-in-right"></i></a></li>
            <div class="toggle_btn"><i class="bi bi-list"></i></div>
        </div>
        <div class="dropdown_menu">
            <li><a href="index.php"><?php echo "$usuario"?></a></li>
            <li><i class="bi bi-moon-fill"></i></li>
            <li><i class="bi bi-brightness-high-fill invisible"></i></li>
            <li><a href="login.php">Salir</a></li>
        </div>
    </div>
</header>
<script src="components/navbar.js"></script>

