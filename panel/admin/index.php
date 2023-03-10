<?php
    include "../../auth.php";
    $conn = mysqli_connect("localhost", "root", "", "kindergarten");
    auth("admin");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kindergarten</title><link rel='icon' type='image/x-icon' href='../../img/logo.svg'>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" defer></script>
    <script src="../../scripts/admin.js" defer></script>
</head>
<body>
    <div id="container">
        <?php
            include "../../navbar.php";
            navbar();
        ?>
        </div>
        <div id="content">
            <?php
                include "sidebar.php";
                sidebar();
            ?>
            <div id="data">
                <div class="flex_row">
                    <h1>Welcome <?php echo $_SESSION["name"]?> to your kindergarten</h1>
                    <img src="../../img/logo.svg" alt="">
                </div>
                <div class="flex_row" id="stat">
                    <div class="stat flex_column">
                        <h2>Children</h2>
                        <div class="stat_num">

                            <?php

                            $query = mysqli_query($conn, "SELECT * FROM `children`");
                            $child_amount = 0;

                            while($row = mysqli_fetch_array($query)){
                                $child_amount = $child_amount + 1;
                            }
                            echo $child_amount
                            ?>

                        </div>
                        <img src="../../img/mortarboard.png" alt="">
                    </div>
                    <div class="stat flex_column">
                        <h2>Parents</h2>
                        <div class="stat_num">
                            <?php

                            $query = mysqli_query($conn, "SELECT * FROM `accounts` WHERE accountType = 'parent'");
                            $child_amount = 0;

                            while($row = mysqli_fetch_array($query)){
                                $child_amount = $child_amount + 1;
                            }
                            echo $child_amount
                            ?>
                        </div>
                        <img src="../../img/user.png" alt="">
                    </div>
                    <div class="stat flex_column">
                        <h2>Groups</h2>
                        <div class="stat_num">
                            <?php

                            $query = mysqli_query($conn, "SELECT * FROM `groups`");
                            $child_amount = 0;

                            while($row = mysqli_fetch_array($query)){
                                $child_amount = $child_amount + 1;
                            }
                            echo $child_amount
                            ?>
                        </div>
                        <img src="../../img/crowd-of-users.png" alt="">
                    </div>
                </div>
                <canvas id="myChart"></canvas>
            </div>
            
        </div>

</body>
</html>