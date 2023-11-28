<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>While</title>
    <style>
        td {
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>While</h1>
    <?php   
        $i = 1;
        echo '<table>';
        echo '<tr><th>Números</th></tr>';

        while ($i <= 10) {
            echo '<tr><td>' . $i . '</td></tr>';
            $i++;
        }

        echo '</table>';
    ?>
</body>
</html>