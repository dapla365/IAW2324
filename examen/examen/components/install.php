<?php require_once "conexion.php"; ?>
<?php

    $checkTable = "SHOW TABLES LIKE 'ejemplo'";
    $result = mysqli_query($mysqli, $checkTable);

    if (mysqli_num_rows($result) > 0) {
        echo "La tabla ya existe.";
    } else {
        $q = file_get_contents('../sql/ejemplo.sql');

        if (mysqli_query($mysqli, $q)) {
            echo "Tabla creada correctamente";
        } else {
            echo "Error al crear la tabla: " . mysqli_error($mysqli);
        }
    }
?>