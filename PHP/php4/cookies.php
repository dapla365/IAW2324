<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>
    <h1>Cookies</h1>
    <?php
        $a="ACCEPT";
        $b="ACCEPT";
        $c="ACCEPT";
        setcookie("A",$a,time()+10*60);
        setcookie("B",$b,time()+10*60);
        setcookie("C",$c,time()+10*60);
        echo "<p>Cookie A: " .$_COOKIE["A"]. "</p>";
        echo "<p>Cookie B: " .$_COOKIE["B"]. "</p>";
        echo "<p>Cookie C: " .$_COOKIE["C"]. "</p>";
    ?>
</body>
</html>