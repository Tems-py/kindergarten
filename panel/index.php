<?php

session_start();

if (!isset($_SESSION["name"])){
    header("Location: http://localhost/kindergarten");
    die();
}
$conn = mysqli_connect("localhost", "root", "", "kindergarten");

$email = $_SESSION['email'];
$query = mysqli_query($conn, "SELECT accountType from accounts where email = '{$email}'");
$row = mysqli_fetch_array($query);
if ($row['accountType'] == 'admin'){
    header("Location: admin", true, 301);
    die();
    }
else if ($row['accountType'] == 'parent'){
    header("Location: parent", true, 301);
    die();
}
else if ($row['accountType'] == 'educator'){
    header("Location: educator", true, 301);
    die();
}

?>