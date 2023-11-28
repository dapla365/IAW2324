<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For</title>
</head>
<body>
    <h1>For</h1>
    <?php   
        echo '<table>';
        echo '<tr><th>Números</th></tr>';

        echo '<tr><td>';
        for ($i = 1;$i <= 10; $i++) {
            echo ' ' . $i;
        }
        echo '</td></tr>';
        
        echo '</table>';
    ?>
</body>
</html>