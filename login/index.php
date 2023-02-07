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
                <div id="button">Gallery</div>
                <div id="button">Contact</div>
                <div id="button">Terms and contidions</div>
            </div>
            <div id="profile"><img src="https://robohash.org/tt?set=set4" alt=""> {pph}</div>
        </div>
        <div id="content">
            <div>
                <form method="post" id="loginDiv">
                    Email:<input type="text" name="email" id="loginInput" placeholder="example@example.example"><br>
                    Password:<input type="text" name="password" id="loginInput" placeholder="example_pasword"><br>
                    <input type="submit" value="Login" id="loginInput">
                </form>
                <?php
                
                $conn = mysqli_connect('localhost','root','','kindergarten');
                

                ?>
            </div>
        </div>
    </div>
</body>
</html>