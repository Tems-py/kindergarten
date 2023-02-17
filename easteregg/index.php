<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kindergarten</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
    
    $conn = mysqli_connect("localhost",'root','','kindergarten');
    
    ?>
    <div id="container">
        <?php
        include "../navbar.php";
        navbar();
        ?>
        </div>
        <div id="content">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim possimus, sed et cum amet similique libero unde quos eligendi dolor totam nostrum accusantium itaque! A maxime illo qui commodi aperiam.
        </div>   
</body>
</html>