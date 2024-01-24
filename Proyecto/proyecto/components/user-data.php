<?php
session_set_cookie_params(120);
session_start();
if(isset($_SESSION['usuario'])){
    $user_username=$_SESSION['usuario'];                

    require_once "components/conexion.php";
    $a="SELECT roles.* FROM roles, usuarios WHERE usuarios.username LIKE '$user_username' AND usuarios.rol = roles.id;";   
    $a = mysqli_query($mysqli, $a);
    $a = mysqli_fetch_assoc($a);      

    $user_rolname = $a['nombre'];                       // NOMBRE       DEL ROL
    $user_nivel = $a['nivel'];                          // NIVEL        DEL ROL
    
    $a="SELECT * FROM usuarios WHERE username = '$user_username'";     
    $a = mysqli_query($mysqli, $a);
    $a = mysqli_fetch_assoc($a);
    
    $user_id = $a['id'];                                // ID           DEL USUARIO
    $user_username = $a['username'];                    // USERNAME     DEL USUARIO
    $user_rol = $a['rol'];                              // ROL          DEL USUARIO

    $a = "SELECT COUNT(*) as total FROM `incidencias`";               
    $b = "SELECT COUNT(*) as completadas FROM `incidencias` WHERE fecha_solucion IS NOT NULL";  
    $c = "SELECT COUNT(*) as pendientes FROM `incidencias` WHERE fecha_solucion IS NULL";                            
    $a = mysqli_query($mysqli,$a);
    $b = mysqli_query($mysqli,$b);
    $c = mysqli_query($mysqli,$c);
    $total = mysqli_fetch_assoc($a)['total'];               //  NUMERO INCIDENCIAS TOTALES
    $completadas = mysqli_fetch_assoc($b)['completadas'];   //  NUMERO INCIDENCIAS COMPLETADAS
    $pendientes = mysqli_fetch_assoc($c)['pendientes'];     //  NUMERO INCIDENCIAS PENDIENTES

}
else{
    header("Location: login.php");
    session_abort();
    die();
}
?>