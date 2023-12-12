<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ok = true;
            if ($_FILES["p_fichero"]["size"] > 2000000) {
                echo "Tu primer fichero es demasiado grande | 2MG";
                $ok = false;
            }
            if ($_FILES["p_fichero"]["size"] > 2000000) {
                echo "Tu segundo fichero es demasiado grande | 2MG";
                $ok = false;
            }
            if($ok){
                $p_fichero = htmlspecialchars($_POST["p_fichero"]);
                $s_fichero = htmlspecialchars($_POST["s_fichero"]);
                
                $ficheroNombre = $_FILES["p_fichero"]["name"];
                $ficheroTipo = $_FILES["p_fichero"]["type"];
                $ficheroTmpName = $_FILES["p_fichero"]["tmp_name"];

                $ficheroNombre2 = $_FILES["s_fichero"]["name"];
                $ficheroTipo2 = $_FILES["s_fichero"]["type"];
                $ficheroTmpName2 = $_FILES["s_fichero"]["tmp_name"];
                
                $carpetaDestino = "ficheros/"; //Carpeta dentro del servidor
                $rutaDestino = $carpetaDestino . $ficheroNombre; 
                $rutaDestino2 = $carpetaDestino . $ficheroNombre2; 

                move_uploaded_file($ficheroTmpName, $rutaDestino);
                move_uploaded_file($ficheroTmpName2, $rutaDestino2);

                echo '<p>Archivos subidos correctamente</p>';
            }
        }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="form" method="post" enctype="multipart/form-data" onsubmit="event.preventDefault(); validar();">
        <h1>Formulario de contacto</h1>

        <label for="asunto">Asunto*:</label>
        <input type="text" id="asunto" name="asunto" />
        <span class='invisible red' id="ObligaAsunto"> Este campo es obligatorio</span><br>

        <label for="dni">DNI*:</label>
        <input type="text" id="dni" name="dni" placeholder="11111111A" />
        <span class='invisible red' id="ObligaDNI"> Este campo es obligatorio</span><br>

        <label for="nombre">Nombre*:</label>
        <input type="text" id="nombre" name="nombre" />
        <span class='invisible red' id="ObligaNombre"> Este campo es obligatorio</span><br>

        <label for="p_apellido">Primer apellido*:</label>
        <input type="text" id="p_apellido" name="p_apellido" />
        <span class='invisible red' id="ObligaPrimerApellido"> Este campo es
            obligatorio</span><br>

        <label for="s_apellido">Segundo apellido:</label>
        <input type="text" id="s_apellido" name="s_apellido" /><br>

        <label for="nacimiento">Fecha nacimiento(dd/mm/yyyy)*:</label>
        <input type="date" id="nacimiento" name="nacimiento" />
        <span class='invisible red' id="ObligaNacimiento"> Este campo es
            obligatorio</span><br>

        <label for="telefono">Teléfono de contacto*:</label>
        <input type="number" id="telefono" name="telefono" />
        <span class='invisible red' id="ObligaTelefono"> Este campo es
            obligatorio</span><br>

        <label for="correo">Correo electrónico(para respuesta):</label>
        <input type="email" id="correo" name="correo" /><br>
        <span class='invisible red' id="CorreoInvalido"> DNI invalido</span><br>

        <label for="domicilio">Domicilio*:</label>
        <input type="text" id="domicilio" name="domicilio" />
        <span class='invisible red' id="ObligaDomicilio"> Este campo es
            obligatorio</span><br>

        <label for="codigo_postal">Código postal*:</label>
        <input type="number" id="codigo_postal" name="codigo_postal" />
        <span class='invisible red' id="ObligaCodigoPostal"> Este campo es
            obligatorio</span><br>

        <label for="provincia">Provincias*:</label>
        <select name="provincia" id="provincia" required>
            <option value=""></option>
            <option value="Álava/Araba">Álava/Araba</option>
            <option value="Albacete">Albacete</option>
            <option value="Alicante">Alicante</option>
            <option value="Almería">Almería</option>
            <option value="Asturias">Asturias</option>
            <option value="Ávila">Ávila</option>
            <option value="Badajoz">Badajoz</option>
            <option value="Baleares">Baleares</option>
            <option value="Barcelona">Barcelona</option>
            <option value="Burgos">Burgos</option>
            <option value="Cáceres">Cáceres</option>
            <option value="Cádiz">Cádiz</option>
            <option value="Cantabria">Cantabria</option>
            <option value="Castellón">Castellón</option>
            <option value="Ceuta">Ceuta</option>
            <option value="Ciudad Real">Ciudad Real</option>
            <option value="Córdoba">Córdoba</option>
            <option value="Cuenca">Cuenca</option>
            <option value="Gerona/Girona">Gerona/Girona</option>
            <option value="Granada">Granada</option>
            <option value="Guadalajara">Guadalajara</option>
            <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
            <option value="Huelva">Huelva</option>
            <option value="Huesca">Huesca</option>
            <option value="Jaén">Jaén</option>
            <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
            <option value="La Rioja">La Rioja</option>
            <option value="Las Palmas">Las Palmas</option>
            <option value="León">León</option>
            <option value="Lérida/Lleida">Lérida/Lleida</option>
            <option value="Lugo">Lugo</option>
            <option value="Madrid">Madrid</option>
            <option value="Málaga">Málaga</option>
            <option value="Melilla">Melilla</option>
            <option value="Murcia">Murcia</option>
            <option value="Navarra">Navarra</option>
            <option value="Orense/Ourense">Orense/Ourense</option>
            <option value="Palencia">Palencia</option>
            <option value="Pontevedra">Pontevedra</option>
            <option value="Salamanca">Salamanca</option>
            <option value="Segovia">Segovia</option>
            <option value="Sevilla">Sevilla</option>
            <option value="Soria">Soria</option>
            <option value="Tarragona">Tarragona</option>
            <option value="Tenerife">Tenerife</option>
            <option value="Teruel">Teruel</option>
            <option value="Toledo">Toledo</option>
            <option value="Valencia">Valencia</option>
            <option value="Valladolid">Valladolid</option>
            <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
            <option value="Zamora">Zamora</option>
            <option value="Zaragoza">Zaragoza</option>
        </select>
        <span class='invisible red' id="ObligaProvincia"> Este campo es
            obligatorio</span><br>

        <label for="oficina">Oficina*:</label>
        <input type="text" id="oficina" name="oficina" />
        <span class='invisible red' id="ObligaOficina"> Este campo es
            obligatorio</span><br>

        <label for="info">Información requerida*:</label>
        <input type="textbox" id="info" name="info" />
        <span class='invisible red' id="ObligaInfo"> Este campo es obligatorio</span><br>


        <label for="p_fichero">Fichero Anexo I (máximo 2MB):</label>
        <input type="file" id="p_fichero" name="p_fichero" /><br>

        <label for="s_fichero">Fichero Anexo II (máximo 2MB):</label>
        <input type="file" id="s_fichero" name="s_fichero" /><br><br><br>

        <input type="checkbox" name="terminos" id="terminos">He leído y acepto la <a href="">política de datos y normas
            de uso *</a>
        <span class='invisible red' id="ObligaTerminos"> Este campo es
            obligatorio</span><br><br><br>

        <button type="submit">Enviar</button>
    </form>

    <script src="formulario.js"></script>
</body>

</html>