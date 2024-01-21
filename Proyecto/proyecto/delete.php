<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<?php 
    require_once 'components/conexion.php';
     if(isset($_GET['eliminar']))
     {
         $id= htmlspecialchars($_GET['eliminar']);
         $query = "DELETE FROM `incidencias` WHERE `id` = {$id}"; 
         $delete_query= mysqli_query($mysqli, $query);
         header("Location: index.php");
     }
?>
<?php include "components/footer.php" ?>