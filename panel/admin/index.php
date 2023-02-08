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
    <link rel="stylesheet" href="../../css/admin.css">
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
            <div id="sidebar">
                <a href="new_child">Add new child</a>
                <a href="edit_child">Edit child</a>
                <a href="edit_parent">Edit parent</a>
            </div>
            <div id="data">
                <div class="flex_row">
                    <h1>Welcome <?php echo $_SESSION["name"]?>to your kindergarten</h1>
                    <img src="../../img/logo.svg" alt="">
                </div>
                <div class="flex_row" id="stat">
                    <div class="stat flex_column">
                        <h3>Children</h3>
                        <div class="stat_num">
                            200
                        </div>
                        <img src="" alt="">
                    </div>
                    <div class="stat flex_column">
                        <h3>Parents</h3>
                        <div class="stat_num">
                            200
                        </div>
                        <img src="" alt="">
                    </div>
                    <div class="stat flex_column">
                        <h3>Groups</h3>
                        <div class="stat_num">
                            200
                        </div>
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>