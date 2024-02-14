<?php require_once "conexion.php"; ?>
<?php
// Obtener el valor del primer select
$opcion = $_POST['opcion'];

// Consulta para obtener las opciones dependientes de la tabla 'aulas'

$a = "SELECT * FROM plantas WHERE planta = 'mysql_real_escape_string($opcion)'";     
$a = mysqli_query($mysqli, $a);

// Generar las opciones para el segundo select
$options = '';
if(!$a){
    $options .= '<option value="">No hay aulas disponibles</option>';
}else{
    while($row = mysqli_fetch_assoc($a)){
        $plantaid = $row['id'];
        $b = "SELECT * FROM aulas WHERE planta = '$plantaid'";     
        $b = mysqli_query($mysqli, $b);

        while($rowb = mysqli_fetch_assoc($b)){
            $planta = ucfirst(mb_strtolower($rowb['aula']));
            $options .= "<option value='$planta'>$planta</option>";
        }
    }
}
echo $options;

mysqli_close($mysqli);

?>
