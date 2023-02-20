<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kindergarten</title><link rel='icon' type='image/x-icon' href='img/logo.svg'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    
    $conn = mysqli_connect("localhost",'root','','kindergarten');
    
    ?>
    <div id="container">
        <?php
        include "navbar.php";
        navbar();
        ?>
        </div>
        <div id="content">
        <div class="flex_row"><h1>Welcome to Kids Park, your kindergarten!</h1><img src="img/logo.svg" alt=""></div>
        <div class="flex_row" id="stat">
            <div class="stat flex_column">
                <h3>Children</h3>
                <div class="stat_num">

                <?php

                $query = mysqli_query($conn, "SELECT * FROM `children`");
                $child_amount = 0;

                while($row = mysqli_fetch_array($query)){
                $child_amount = $child_amount + 1;
                }
                echo $child_amount;
                ?>

                </div>
                <img src="img/mortarboard.png" alt="">
            </div>
            <div class="stat flex_column">
                <h3>Parents</h3>
                <div class="stat_num">
                <?php

                $query = mysqli_query($conn, "SELECT * FROM `accounts` WHERE accountType = 'parent'");
                $child_amount = 0;

                while($row = mysqli_fetch_array($query)){
                $child_amount = $child_amount + 1;
                }
                echo $child_amount;
                ?>
                </div>
                <img src="img/user.png" alt="">
            </div>
            <div class="stat flex_column">
                <h3>Groups</h3>
                <div class="stat_num">
                    <?php

                    $query = mysqli_query($conn, "SELECT * FROM `groups`");
                    $child_amount = 0;

                    while($row = mysqli_fetch_array($query)){
                        $child_amount = $child_amount + 1;
                    }
                    echo $child_amount;
                    ?>
                </div>
                <img src="img/crowd-of-users.png" alt="">
            </div>
        </div>
        <div class="flex_row desc">Welcome to KidsPark, a premier kindergarten dedicated to providing a safe, nurturing, and enriching environment for young children. At KidsPark, we believe that every child deserves the best possible start in life, and we are committed to fostering their development through play-based learning and age-appropriate activities.<br><br>

        Our program is designed to promote creativity, socialization, and cognitive development, with a focus on building foundational skills that will serve your child well throughout their academic and personal journey. We understand that every child is unique, which is why our experienced and passionate teachers work closely with parents to develop personalized learning plans tailored to each child's individual needs and interests.<br><br>

        As one of the most trusted kindergartens in the community, KidsPark has a proven track record of success in preparing children for academic excellence and lifelong learning. Many of our alumni have gone on to achieve great success in various fields, including business, medicine, and the arts. Our graduates have also been recognized for their outstanding achievements, including scholarships, awards, and acceptance into prestigious universities.<br><br>

        Among the famous children that have attended KidsPark are the children of renowned musicians, actors, and athletes. Our kindergarten has served as a launchpad for the talents and aspirations of these young individuals, providing them with the tools and resources they need to realize their full potential.<br><br>

        The story of KidsPark began over two decades ago, when a group of passionate educators came together with a shared vision of creating a kindergarten that would provide the highest quality of education for young children. Since then, we have grown into a vibrant community of teachers, parents, and children who are dedicated to making a positive impact on the world.<br><br>

        We invite you to experience the difference that KidsPark can make in your child's life. Contact us today to schedule a tour of our facilities and learn more about our innovative programs and personalized approach to learning. We look forward to welcoming you and your child to our KidsPark family!<br><br>
        </div>
        </div>
</body>
</html>