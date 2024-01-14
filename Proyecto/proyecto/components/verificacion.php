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