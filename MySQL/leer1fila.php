<?php
// Configuración de conexión a la base de datos
include_once 'secret.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios LIMIT 1";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar los datos de la primera fila
    $row = $result->fetch_assoc();
    echo "ID: " . $row["id"]. " - Nombre: " . $row["username"]. " - Contraseña: " . $row["password"]. "<br>";
} else {
    echo "No se encontraron registros en la tabla usuarios.";
}
$conn->close();
?>