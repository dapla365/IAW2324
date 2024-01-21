<?php
session_start();
if($_SESSION['darkmode'] == 'dark'){
    $_SESSION['darkmode'] = 'white';
}else{
    $_SESSION['darkmode'] = 'dark';
}
//echo $_SERVER['HTTP_REFERER'];
$pagina = $_SERVER['HTTP_REFERER'];

header("Location: $pagina");
?>