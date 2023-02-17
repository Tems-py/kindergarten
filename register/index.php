<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kindergarten</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/register.css">
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
                <form method="post" id="registerDiv">
                    Email:<input type="text" name="email" class="registerInput" placeholder="example@example.example"><br>
                    Password:<input type="password" name="password" class="registerInput" placeholder="example_password"><br>
                    Repeat:<input type="password" name="repeatPassword" class="registerInput" placeholder="*repeat* example_password"><br>
                    Name: <input type="text" name="name" class="registerInput" placeholder="your name here"><br>
                    Surname: <input type="text" class="registerInput" placeholder="your surname here">
                    <input type="submit" value="Register" class="registerInput">
                </form>
                <?php
                
                $conn = mysqli_connect('localhost','root','','kindergarten');
                
                if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repeatPassword'])){
                    if($_POST['password']==$_POST['repeatPassword']){
                        $query = mysqli_query($conn, "INSERT INTO `accounts`(`email`, `accountType`, `password`,`name`,`familyName`) VALUES ('{$_POST['email']}','NONE','{$_POST['password']}'),'{$_POST['name']}','{$_POST['surname']}'");
                        echo "Registration successful!";
                    }
                    else{
                        echo "Passwords dont match!";
                    }
                }
                ?>
            </div>
        </div>

</body>
</html>