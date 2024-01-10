<?php
$host = 'sql204.thsite.top';   
$user = 'thsi_35476428';   
$pass = "********";   
$database = 'thsi_35476428_proyecto';     
$conn = mysqli_connect($host,$user,$pass,$database);   
if (!$conn) {                                             
    die("Conexión fallida con base de datos: " . mysqli_connect_error());     
  }
?>


