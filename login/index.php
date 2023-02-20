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
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div id="container">
        <?php
        include "../navbar.php";
        navbar();
        ?>
        </div>
        <div id="content">
            <div>
                <form method="post" id="loginDiv">
                    Email:<input type="text" name="email" class="loginInput" placeholder="your@email.com"><br>
                    Password:<input type="password" name="password" class="loginInput" placeholder="yourPassword"><br>

                    <?php

                    $conn = mysqli_connect('localhost','root','','kindergarten');
                    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["email"]) && isset($_POST["password"])){
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $query = mysqli_query($conn, "SELECT `name`, email, `password` as pass from accounts WHERE email = '$email'");
                        if (mysqli_num_rows($query) == 0){
                            echo "Złe dane!";
                        }
                        else {
                            $row = mysqli_fetch_array($query);
                            if ($row['pass'] == $password){
                                $_SESSION['name'] = $row['name'];
                                $_SESSION['email'] = $row['email'];
                                header("Location: /kindergarten/panel");
                                die();
                            }
                            else {
                                echo "Złe hasło!<br>";
                            }
                        }
                        

                    }

                    ?>

                    <input type="submit" value="Login" class="loginInput">
                </form>
            </div>
        </div>
</body>
</html>