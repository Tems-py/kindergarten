<?php
    include "../../../auth.php";
    auth("admin");
    $conn = mysqli_connect("localhost", "root", "", "kindergarten");
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
    <link rel="stylesheet" href="../../../css/create_group.css">
</head>
<body>
    <div id="container">
        <div id="navbar">
            <div id="buttons">
                <div id="button"><a href="gallery">Gallery</a></div>
                <div id="button">Contact</div>
                <div id="button">Terms and conditions</div>
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
            <?php
                include "../sidebar.php";
                sidebar();
            ?>
            <div id="data">
                <h1>Add new group</h1>
                <form action="" method="POST">
                    <label>
                        Name:
                        <input type="text" name="name">
                    </label>
                    <label>
                        Caretaker:
                        <select name="caretaker" id="">
                            <?php
                                $query = mysqli_query($conn, "SELECT * from accounts WHERE accountType='educator'");

                                while ($row = mysqli_fetch_array($query)){
                                    echo "<option value='{$row['accountId']}'>{$row['name']} {$row['familyName']}</option>";
                                }
                            ?>
                        </select>
                    </label>
                    <label>
                        You can assing child's to this group (optional)<br><br>
                        <?php
                            $query = mysqli_query($conn, "SELECT * from children ORDER BY familyName, 'name'");


                            while ($row = mysqli_fetch_array($query)){
                                $dis = 'disabled';
                                if ($row['groupId'] == ""){
                                    $dis = 'enabled';
                                }
                                echo "<input type='checkbox' name='{$row['id']}' {$dis}>{$row['familyName']} {$row['name']}<br>";
                            }
                        ?>
                    </label><br>
                    <?php
                        if (isset($_POST['name']) && isset($_POST['caretaker']) && isset($_POST['child'])){
                            echo "{$_POST['child']}";
                        }
                    ?>
                    <input type="submit" value="Add">
                </form>    
            </div>
        </div>
</body>
</html>