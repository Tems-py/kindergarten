<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kindergarten</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/contacts.css">
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
                    echo '<a href="../login">Login</a>';
                }
                ?>
            </div>
        </div>
        <div id="content">
           <h1>Our contact:</h1>
           <h2>Emails:</h2>
            KidsPark@childcare.com<br>
            KidsPark@gmail.com
            <h2>Phone numbers:</h2>
            42 250 65 06<br>
            42 655 28 38
        </div>

</body>
</html>