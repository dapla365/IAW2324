<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de incidencias (CRUD)</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- ESTILOS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <?php
        session_start();
        if($_SESSION['darkmode'] == 'dark'){
            echo '<link rel="stylesheet" href="css/darkmode.css">';
        }
        //echo $_SERVER['PHP_SELF'];
        if($_SERVER['PHP_SELF'] != ""){
            $url = explode("/", $_SERVER['PHP_SELF']);
            $url = $url[2];
            if($url == 'login.php' || $url == 'register.php'){
                echo '<link rel="stylesheet" href="css/form.css">';
            }
        }
    ?>
</head>
<body>
    
