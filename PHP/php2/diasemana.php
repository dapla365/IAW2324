<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dia de la semana</title>
</head>
<body>
    <h1>Dia de la semana</h1>
    <?php
        switch(date("l")){
            case "Monday":
                echo "Hoy es Lunes";
                break;
            case "Tuesday":
                echo "Hoy es Martes";
                break;
            case "Wednesday":
                echo "Hoy es Miércoles";
                break;
            case "Tuesday":
                echo "Hoy es Jueves";
                break;
            case "Friday":
                echo "Hoy es Viernes";
                break;
            case "Saturday":
                echo "Hoy es Sábado";
                break;
            case "Sunday":
                echo "Hoy es Domingo";
                break;
        }
    ?>
</body>
</html>