<?php
    include "../../auth.php";
    $conn = mysqli_connect("localhost", "root", "", "kindergarten");
    auth("educator");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kindergarten</title><link rel='icon' type='image/x-icon' href='../../img/logo.svg'>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/educator.css">
</head>
<body>
    <div id="container">
        <?php
        include "../../navbar.php";
        navbar();
        ?>
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
                    <div class="stat_num">

                    <?php

                    $query = mysqli_query($conn, "SELECT * FROM `accounts` WHERE email like '$email'");
                    $row = mysqli_fetch_array($query);
                    $accId = $row['accountId'];
                    $count = 0;
                    $query = mysqli_query($conn, "SELECT groupId FROM `groups` where caretakerId = '$accId'");
                    $row = mysqli_fetch_array($query);
                    $grId = $row['groupId'];
                    $query = mysqli_query($conn, "SELECT groupId FROM `groups` where caretakerId = '$accId'");
                    while($row=mysqli_fetch_array($query)){
                        $count = $count + 1;
                    }
                    if($count>0){
                        echo $grId;
                    }
                    else{
                        echo "N/A";
                    }
                    ?>

                    </div>
                    <img src="../../img/crowd-of-users.png" alt="">
                </div>
                <div class="stat flex_column">
                    <h3>Children</h3>
                    <div class="stat_num">

                    <?php

                    $count = 0;
                    $query = mysqli_query($conn, "SELECT * FROM `accounts` WHERE email like '$email'");
                    $row = mysqli_fetch_array($query);
                    $accId = $row['accountId'];
                    $query = mysqli_query($conn, "SELECT groupId FROM `groups` where caretakerId = '$accId'");
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
                        $query = mysqli_query($conn, "SELECT * FROM `children` JOIN groups ON children.groupId = groups.groupId where caretakerId = '$accId'");
                        while($row=mysqli_fetch_array($query)){
                            $count = $count + 1;
                            echo "Name: ".$row['name']." ".$row['familyName']."<hr class='child'> birthdate: ".$row["birthdate"]."<hr class='child'> Group Id: ".$row["groupId"]."<hr>";
                        }
                    
                    ?>
            
                </div>
            </div>
             <div id="payments">
                        <h2>To be paid:</h2>
                        <?php
                       
                        $query = mysqli_query($conn, "SELECT * FROM `children` JOIN groups ON children.groupId = groups.groupId where caretakerId = '$accId'");
                        while($row=mysqli_fetch_array($query)){
                            echo "<h1> Child: ".$row['name']." ".$row['familyName']."</h1>";
                            $id = $row['id'];
                            $query2 = mysqli_query($conn, "SELECT * FROM `paymentnotice` WHERE childId = $id");
                            while($row2=mysqli_fetch_array($query2)){
                                echo "Payment due to: ".$row2['dateDue']."<hr class='child1'> Cost: ".$row2["cost"]."<hr class='child1'> Objectives: ".$row2["objectives"];
                                echo "<hr class='child'>";
                            }
                            echo "<hr>";
                        }
                        ?>
                        <hr class="paydiv">
                        <h2>Paid:</h2>
                        <?php
                       
                        $query = mysqli_query($conn, "SELECT * FROM `children` JOIN groups ON children.groupId = groups.groupId where caretakerId = '$accId'");
                        while($row=mysqli_fetch_array($query)){
                            echo "<h1> Child: ".$row['name']." ".$row['familyName']."</h1>";
                            $id = $row['id'];
                            $query2 = mysqli_query($conn, "SELECT * FROM `payments` WHERE childId = $id");
                            while($row2=mysqli_fetch_array($query2)){
                                echo "Payment of date : ".$row2['dateDue']."<hr class='child1'> Cost: ".$row2["cost"]."<hr class='child1'> Objectives: ".$row2["objectives"];
                                echo "<hr class='child'>";
                            }
                            echo "<hr>";
                        }
                        ?>
            </div>
        </div>
</body>
</html>