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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    
    $conn = mysqli_connect("localhost",'root','','kindergarten');
    
    ?>
    <div id="container">
        <div id="navbar">
            <div id="buttons">
                <div id="button"><a href="gallery">Gallery</a></div>
                <div id="button">Contact</div>
                <div id="button">Terms and contidions</div>
            </div>
            
                <?php

                if (isset($_SESSION['email'])) {
                    echo '<div id="profile"><img src="https://robohash.org/'.$_SESSION['email'].'?set=set4" alt="">  ';
                    echo '<a href="panel">Panel</a>  ';
                    echo '<a href="logout">Logout</a>';
                }
                else {
                    echo '<a href="login">Login</a>';
                }
                ?>
            </div>
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
                echo $child_amount
                ?>

                </div>
                <img src="" alt="">
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
                echo $child_amount
                ?>
                </div>
                <img src="" alt="">
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
                    echo $child_amount
                    ?>
                </div>
                <img src="" alt="">
            </div>
        </div>
        </div>
    </div>
</body>
</html>