<?php include "components/user-data.php" ?>

<header>
    <div class="centro">
        <h1><a href="index.php">Incidencias</a></h1>
        <div class="nav">
            <li><a href="usuarios.php"><i class="bi bi-person-fill"></i> <?php echo "$user_username"?></a></li>
            <li><i id="darkmode" class="<?php
                if($_SESSION['darkmode'] == 'dark'){
                    echo 'bi bi-brightness-high-fill';
                }else{
                    echo 'bi bi-moon-fill';
                }
            ?>"></i></li>
            <li><a href="login.php">Salir <i class="bi bi-box-arrow-in-right"></i></a></li>
            <div class="toggle_btn"><i class="bi bi-list"></i></div>
        </div>
        <div class="dropdown_menu">
            <li><a href="index.php"><?php echo "$user_username"?></a></li>
            <li><i id="darkmode2" class="<?php
                if($_SESSION['darkmode'] == 'dark'){
                    echo 'bi bi-brightness-high-fill';
                }else{
                    echo 'bi bi-moon-fill';
                }
            ?>" ></i></li>
            <li><a href="login.php">Salir</a></li>
        </div>
    </div>
</header>


