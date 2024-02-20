<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<?php 
     if(isset($_GET['eliminar']))
     {
        $a= htmlspecialchars($_GET['eliminar']);
        if($user_nivel > 5 && $user_id != $a){      
           
            $c= "DELETE FROM usuarios WHERE id = '{$a}'"; 
            $b= "DELETE FROM incidencias WHERE usuario = '{$a}'"; 
            $b= mysqli_query($mysqli, $b);
            $c= mysqli_query($mysqli, $c);
            
        }
        header("Location: usuarios.php");
     }
?>
<?php include "components/footer.php" ?>