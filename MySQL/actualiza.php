<?php
// Configuración de conexión a la base de datos
include_once 'secret.php';

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Consulta SQL para obtener un registro de la tabla usuarios
$sql = "UPDATE usuarios SET password='dsjfh234$5ddF' WHERE id='2'";
//$result = $conn->query($sql);

// Verificar si hay resultados
if ($conn->query($sql) == True) {
    // Mostrar los datos de cada fila
        echo "Nuevo registro modificado correctamente";
} else {
    echo "No se puede insertar.";
}

// Cerrar conexión
$conn->close();
?>