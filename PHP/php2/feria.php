<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feria</title>
</head>
<body>
    <h1>Feria</h1>
    <?php
        $d1=strtotime("April 23 2024");
        $d2=ceil(($d1-time())/60/60/24);
        echo "Quedan " . $d2 ." dias para el 23 de abril.";
    ?>
</body>
</html>