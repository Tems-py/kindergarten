<?php
function auth($type){
    session_start();
    if (!isset($_SESSION["name"])){
        header("Location: http://localhost/kindergarten");
        die();
    }
    $conn = mysqli_connect("localhost", "root", "", "kindergarten");
    $email = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM `accounts` WHERE email = '$email'");
    $row = mysqli_fetch_array($query);

    if ($row['type'] != $type) {
        header("Location: http://localhost/kindergarten");
        die();
    }
}