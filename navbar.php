<?php
function navbar(): void
{
    $url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $h = explode("/", $url)[3];
    $url = "http://" . $_SERVER['SERVER_NAME'] . "/" . $h;
    echo "<div id='navbar'>
        <div id='buttons'>
            <div class='button'></div>
            <div class='button'><a href='$url/gallery'>Gallery</a></div>
            <div class='button'><a href='$url/contact'>Contact</a></div>
            <div class='button'><a href='$url/tac'>Terms and contidions</a></div>
        </div>";


            if (isset($_SESSION['email'])) {
                echo '<div id="profile"><img src="https://robohash.org/'.$_SESSION['email'].'?set=set4" alt="">  ';
                echo "<a href='$url/panel'>Panel</a>  ";
                echo "<a href='$url/logout'>Logout</a>";
            }
            else {
                echo "<a href='$url/login'>Login</a>";
            }
echo "            </div>
        </div>";
}