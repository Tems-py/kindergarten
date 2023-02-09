<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kindergarden</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <div id="container">
        <div id="navbar">
            <div id="buttons">
                <div id="button"><a href="gallery">Gallery</a></div>
                <div id="button">Contact</div>
                <div id="button">Terms and contidions</div>
            </div>
            <div id="profile"><img src="https://robohash.org/tt?set=set4" alt=""> {pph}</div>
        </div>
        <div id="content">
            <div>
                <form method="post" id="registerDiv">
                    Email:<input type="text" name="email" class="registerInput" placeholder="example@example.example"><br>
                    Password:<input type="password" name="password" class="registerInput" placeholder="example_pasword"><br>
                    Repeat:<input type="password" name="repeatPassword" class="registerInput" placeholder="*repeat* example_pasword"><br>
                    <input type="submit" value="Register" class="registerInput">
                </form>
                <?php
                
                $conn = mysqli_connect('localhost','root','','kindergarten');
                
                if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repeatPassword'])){
                    if($_POST['password']==$_POST['repeatPassword']){
                        $query = mysqli_query($conn, "INSERT INTO `accounts`(`email`, `accountType`, `password`) VALUES ('{$_POST['email']}','NONE','{$_POST['password']}')");
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>