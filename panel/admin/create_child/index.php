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
                <div id="button"><a href="galery">Gallery</a></div>
                <div id="button">Contact</div>
                <div id="button">Terms and contidions</div>
            </div>
            <div id="profile"><img src="https://robohash.org/tt?set=set4" alt=""> {pph}</div>
        </div>
        <div id="content">
            <div id="sidebar">
                <a href="new_child">Add new child</a>
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
                        $query = mysqli_query($conn, "SELECT id, name from GROUP");

                        while ($row = mysqli_fetch_array($query)){
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                        
                    ?>
                    
                </select>
                </form>
            </div>
        </div>
    </div>
</body>
</html>