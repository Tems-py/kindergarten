<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kindergarden</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div id="container">
        <div id="navbar">
            <div id="buttons">
                <div id="button"><a href="galery">Gallery</a></div>
                <div class="button">Contact</div>
                <div class="button">Terms and contidions</div>
            </div>
            <div id="profile"><img src="https://robohash.org/tt?set=set4" alt=""> {pph}</div>
        </div>
        <div id="content">
            <div>
                <form method="post" id="loginDiv">
                    Email:<input type="text" name="email" class="loginInput" placeholder="example@example.example"><br>
                    Password:<input type="text" name="password" class="loginInput" placeholder="example_pasword"><br>
                    <input type="submit" value="Login" class="loginInput">
                </form>
                <?php
                
                $conn = mysqli_connect('localhost','root','','kindergarten');
                if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["email"])){
                    $query = mysqli_query($conn, "SELECT name, password from accounts WHERE email = '{$_POST['email']}'");
                    $row = mysqli_fetch_row($conn);
                    if ($row['password'] == $_POST["password"]){
                        header("Location: http://localhost/kindergarten/panel/admin");
                        die();
                    }
                }

                ?>
            </div>
        </div>
    </div>
</body>
</html>