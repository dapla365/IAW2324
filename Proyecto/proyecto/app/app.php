<?php

if($_SERVER['HTTP_REFERER'] == 'https://dapla.thsite.top/proyecto/login.php'){

}else{
    header("Location: https://dapla.thsite.top/proyecto/login.php");
}

?>

<?php include "../components/header.php" ?>

<h1>APP</h1>

<?php include "../components/footer.php" ?>