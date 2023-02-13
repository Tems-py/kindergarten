<?php
    include "../../auth.php";
    $conn = mysqli_connect("localhost", "root", "", "kindergarten");
    auth("admin");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kindergarten</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>
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
            <div id="sidebar">
                <a href="./create_child">Add new child</a>
                <a href="edit_child">Edit child</a>
                <a href="edit_parent">Edit parent</a>
            </div>
            <div id="data">
                <div class="flex_row">
                    <h1>Welcome <?php echo $_SESSION["name"]?> to your kindergarten</h1>
                    <img src="../../img/logo.svg" alt="">
                </div>
                <div class="flex_row" id="stat">
                    <div class="stat flex_column">
                        <h2>Children</h2>
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
                        <img src="../../img/mortarboard.png" alt="">
                    </div>
                    <div class="stat flex_column">
                        <h2>Parents</h2>
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
                        <img src="../../img/user.png" alt="">
                    </div>
                    <div class="stat flex_column">
                        <h2>Groups</h2>
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
                        <img src="../../img/crowd-of-users.png" alt="">
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</body>
</html>