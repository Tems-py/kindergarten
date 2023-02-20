<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kindergarten</title><link rel='icon' type='image/x-icon' href='img/logo.svg'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    
    $conn = mysqli_connect("localhost",'root','','kindergarten');
    
    ?>
    <div id="container">
        <?php
        include "navbar.php";
        navbar();
        ?>
        </div>
        <div id="content">
        <div class="flex_row"><h1>Welcome to Kids Park, your kindergarten!</h1><img src="img/logo.svg" alt=""></div>
        <div class="flex_row" id="stat">
            <div class="stat flex_column">
                <h3>Children</h3>
                <div class="stat_num">

                <?php

                $query = mysqli_query($conn, "SELECT * FROM `children`");
                $child_amount = 0;

                while($row = mysqli_fetch_array($query)){
                $child_amount = $child_amount + 1;
                }
                echo $child_amount;
                ?>

                </div>
                <img src="img/mortarboard.png" alt="">
            </div>
            <div class="stat flex_column">
                <h3>Parents</h3>
                <div class="stat_num">
                <?php

                $query = mysqli_query($conn, "SELECT * FROM `accounts` WHERE accountType = 'parent'");
                $child_amount = 0;

                while($row = mysqli_fetch_array($query)){
                $child_amount = $child_amount + 1;
                }
                echo $child_amount;
                ?>
                </div>
                <img src="img/user.png" alt="">
            </div>
            <div class="stat flex_column">
                <h3>Groups</h3>
                <div class="stat_num">
                    <?php

                    $query = mysqli_query($conn, "SELECT * FROM `groups`");
                    $child_amount = 0;

                    while($row = mysqli_fetch_array($query)){
                        $child_amount = $child_amount + 1;
                    }
                    echo $child_amount;
                    ?>
                </div>
                <img src="img/crowd-of-users.png" alt="">
            </div>
        </div>
        </div>
</body>
</html>