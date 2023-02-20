<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kindergarten</title><link rel='icon' type='image/x-icon' href='../img/logo.svg'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/gallery.css">
</head>
<body>
    <div id="container">
        <?php
        include "../navbar.php";
        navbar();
        ?>
        </div>
        <div id="content">
           <div class="row">
           <img src="../img/doors.png" alt="">
           <img src="../img/childroom1.png" alt="">
           <img src="../img/childroom2.png" alt="">
           </div>
           <div class="row">
           <img src="../img/childroom3.png" alt="">
           <img src="../img/childroom4.png" alt="">
           <img src="../img/childroom5.png" alt="">
            </div>
           <div class="row">
           <img src="../img/dinning1.png" alt="">
           <img src="../img/dinning2.png" alt="">
           <img src="../img/hall.png" alt="">
           </div>
           <div class="row">
           <img src="../img/movies.png" alt="">
           <img src="../img/playground1.png" alt="">
           <img src="../img/playground2.png" alt="">
        </div>
        </div>

</body>
</html>