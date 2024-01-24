<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<?php 
     if(isset($_GET['eliminar']))
     {
        if($nivel > 5){      
            $a= htmlspecialchars($_GET['eliminar']);
            $a = "DELETE FROM usuarios WHERE id = {$a}"; 
            $a= mysqli_query($mysqli, $a);
        }
         header("Location: usuarios.php");
     }
?>
<?php include "components/footer.php" ?>