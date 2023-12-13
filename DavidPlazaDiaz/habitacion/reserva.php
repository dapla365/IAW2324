<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="form" method="post" enctype="multipart/form-data" onsubmit="event.preventDefault(); validar();">
        <h1>Selecciona una habitacion</h1>

        <label for="nombre">Nombre*:</label>
        <input type="text" id="nombre" name="nombre" />
        <span class='invisible red' id="ObligaNombre"> Este campo es 
            obligatorio</span><br>

        <label for="apellidos">Apellidos*:</label>
        <input type="text" id="apellidos" name="apellidos" />
        <span class='invisible red' id="ObligaApellidos"> Este campo es
            obligatorio</span><br>

        <label for="correo">Correo electrónico*:</label>
        <input type="email" id="correo" name="correo" />
        <span class='invisible red' id="ObligaCorreo"> Este campo es 
            obligatorio</span><br>

        <label for="dni">DNI*:</label>
        <input type="text" id="dni" name="dni" placeholder="11111111A" />
        <span class='invisible red' id="ObligaDNI"> Este campo es 
            obligatorio</span><br>

        <label for="dia_entrada">Dia de entrada*:</label>
        <input type="date" id="dia_entrada" name="dia_entrada" min="2023-12-13"/>
        <span class='invisible red' id="ObligaDiaEntrada"> Este campo es 
            obligatorio</span><br>

        <label for="dias">Dia de entrada*:</label>
        <input type="number" id="dias" name="dias"/>
        <span class='invisible red' id="ObligaDias"> Este campo es 
            obligatorio</span><br>

        <label for="habitacion">Habitacion:</label>
        <select name="habitacion" id="habitacion" onChange="changeImage(this);">
            <option value="simple">simple (30€)</option>
            <option value="doble">doble (50€)</option>
            <option value="triple">triple (80€)</option>
            <option value="suite">suite (100€)</option>
        </select><br>

        <img src="images/simple.png" id="imagen" width='200px'><br>

        <button type="submit">Seleccionar</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = htmlspecialchars($_POST["nombre"]);
            $apellidos = htmlspecialchars($_POST["apellidos"]);
            $correo = htmlspecialchars($_POST["correo"]);
            $dni = htmlspecialchars($_POST["dni"]);
            $dia_entrada = htmlspecialchars($_POST["dia_entrada"]);
            $dias = htmlspecialchars($_POST["dias"]);
            $habitacion = htmlspecialchars($_POST["habitacion"]);


                echo '<hr>';
                echo '<p>Nombre: ' . $nombre . '</p>';
                echo '<p>Apellidos: ' . $apellidos. '</p>';
                echo '<p>Correo: ' . $correo. '</p>';
                echo '<p>DNI: ' . $dni. '</p>';
                echo '<p>Dia entrada: ' . $dia_entrada. '</p>';
                echo '<p>Dias: ' . $dias. '</p>';
                echo '<p>Habitacion: ' . $habitacion. '</p>';

                switch($habitacion){
                    case 'simple':
                        echo '<p>Precio: '. 30*$dias .' </p><br>';
                        echo '<img src="images/simple.png" alt="simple">';
                        break;
                    case 'doble':
                        echo '<p>Precio: '. 50*$dias .' </p><br>';
                        echo '<img src="images/doble.png" alt="simple">';
                        break;
                    case 'triple':
                        echo '<p>Precio: '. 80*$dias .' </p><br>';
                        echo '<img src="images/triple.png" alt="simple">';
                        break;
                    case 'suite':
                        echo '<p>Precio: '. 100*$dias .' </p><br>';
                        echo '<img src="images/suite.png" alt="simple">';
                        break;
                }
            
        }
        
    ?>
    <script>
        function changeImage(element) {
            document.querySelector("#imagen").src = "images/" + element.value + ".png"
        }
    </script>
    <script src="formulario.js"></script>
</body>

</html>