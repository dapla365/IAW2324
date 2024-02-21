<?php require_once "conexion.php"; ?>
<?php

    $checkTable = "SHOW TABLES LIKE 'usuarios'";
    $result = mysqli_query($mysqli, $checkTable);

    if (mysqli_num_rows($result) > 0) {
        $q = file_get_contents('../sql/actualizaUsuarios.sql');
        //echo $q;
        if (mysqli_query($mysqli, $q)) {
            echo "Tabla actualizada correctamente";
        } else {
            echo "Error al actualizar la tabla: " . mysqli_error($mysqli);
        }
    } else {
        echo "La tabla no existe.";
    }
?>