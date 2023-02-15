
<?php 
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "kindergarten");
    $query = mysqli_query($conn, "SELECT * FROM `accounts`");
    if (!isset($_SESSION["name"])){
        header("Location: http://localhost/kindergarten");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kindergarten</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/educator.css">
</head>
<body>
    <div id="container">
        <div id="navbar">
            <div id="buttons">Ś
                <div id="button"><a href="../../gallery">Gallery</a></div>
                <div id="button">Contact</div>
                <div id="button">Terms and Conditions</div>
            </div>
            
                <?php

                if (isset($_SESSION['email'])) {
                    echo '<div id="profile"><img src="https://robohash.org/'.$_SESSION['email'].'?set=set4" alt="">  ';
                    echo '<a href="../panel">Panel</a>  ';
                    echo '<a href="../../logout">Logout</a>';
                }
                else {
                    echo '<a href="../../login">Login</a>';
                }
                ?>
            </div>
        </div>
        <div id="content">
            <div id="accountInfo">
                <?php
                    $email = $_SESSION['email'];
                    $query = mysqli_query($conn, "SELECT * FROM `accounts` WHERE email like '$email'");
                    $row = mysqli_fetch_array($query);
                    echo "Welcome: ".$row['name']." ".$row['familyName']."<hr> email: ".$row["email"];
                ?>
            </div>
            <div class="flex_row">
                <div class="stat flex_column">
                    <h3>Group:</h3>
                    <h2><?php
                        $query = mysqli_query($conn, "SELECT * FROM `accounts` WHERE email like '$email'");
                        $row = mysqli_fetch_array($query);
                        $accId = $row['accountId'];

                    ?></h2>
                    <div class="stat_num">

                    <?php

                    $query = mysqli_query($conn, "SELECT * FROM `accounts` WHERE email like '$email'");
                    $row = mysqli_fetch_array($query);
                    $accId = $row['accountId'];
                
                    $query = mysqli_query($conn, "SELECT groupId FROM `groups` where groupId = '$accId'");
                    $grId = $row;
                    echo $count;
                    ?>

                    </div>
                    <img src="../../img/user.png" alt="">
                </div>
            <div class="flex_row">
                <div class="stat flex_column">
                    <h3>Children</h3>
                    <div class="stat_num">

                    <?php

                    $count = 0;
                    $query = mysqli_query($conn, "SELECT * FROM `accounts` WHERE email like '$email'");
                    $row = mysqli_fetch_array($query);
                    $accId = $row['accountId'];
                    $query = mysqli_query($conn, "SELECT * FROM `children` JOIN relations ON children.id = relations.childId where relations.accountId = '$accId'");
                    while($row=mysqli_fetch_array($query)){
                        $count = $count + 1;
                    }
                    echo $count;
                    ?>

                    </div>
                    <img src="../../img/user.png" alt="">
                </div>
                <div id="childInfo">
                    <?php
                        $count = 0;
                        $query = mysqli_query($conn, "SELECT * FROM `accounts` WHERE email like '$email'");
                        $row = mysqli_fetch_array($query);
                        $accId = $row['accountId'];
                        $query = mysqli_query($conn, "SELECT * FROM `children` JOIN relations ON children.id = relations.childId where relations.accountId = '$accId'");
                        while($row=mysqli_fetch_array($query)){
                            $count = $count + 1;
                            echo "Name: ".$row['name']." ".$row['familyName']."<hr class='child'> birthdate: ".$row["birthdate"]."<hr class='child'> Group Id: ".$row["groupId"]."<hr>";
                        }
                    
                    ?>
            
                </div>
            </div>
        </div>
</body>
</html>