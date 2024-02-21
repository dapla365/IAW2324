<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<?php 
     if(isset($_GET['eliminar']))
     {
        if($user_nivel > 5){    
         $a= htmlspecialchars($_GET['eliminar']);
         $a = "DELETE FROM incidencias WHERE id = {$a}"; 
         $a= mysqli_query($mysqli, $a);
         header("Location: index.php");
        }
     }
?>
<?php include "components/footer.php" ?>