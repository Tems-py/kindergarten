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
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/admin.css">
    <link rel="stylesheet" href="../../../css/create_child.css">
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
                <a href="">Add new child</a>
                <a href="edit_child">Edit child</a>
                <a href="edit_parent">Edit parent</a>
            </div>
            <div id="data">
                <form action="" method="POST">
                Name:    
                <input type="text" name="name">
                Surname:
                <input type="text" name="surname">
                Birthdate:
                <input type="date" name="birthdate">
                Group (leave empty if needed):
                <select name="group" id="">
                    <?php
                        $query = mysqli_query($conn, "SELECT groupId as id, groupName as name from GROUPS");

                        while ($row = mysqli_fetch_array($query)){
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                    ?>
                    
                </select><br>
                <input type="submit" value="Add">
                </form>
                <?php
                    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birthdate']) && isset($_POST['group'])){
                        $name = $_POST['name'];
                        $surname = $_POST['surname'];
                        $birthdate = $_POST['birthdate'];
                        $group = $_POST['group'];

                        $query = mysqli_query($conn, "INSERT INTO `children` (`id`, `name`, `familyName`, `birthdate`, `groupId`) VALUES (NULL, '$name', '$surname', '$birthdate', '$group');");
                    }
                ?>
            </div>
        </div>
</body>
</html>