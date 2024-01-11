<?php
if($_SERVER['HTTP_REFERER'] == "login.php"){
    echo '<p>LLega bien</p>';
}else{
    echo '<p>LLega mal</p>';
    //header('Location:login.php')
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>llega</h1>
</body>
</html>