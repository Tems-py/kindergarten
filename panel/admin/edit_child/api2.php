<?php 
    session_start();

    if (!isset($_SESSION["name"])){
        header("Location: http://localhost/kindergarten");
        die();
    }
    $email = $_SESSION['email'];
    $conn = mysqli_connect("localhost", "root", "", "kindergarten");
    $query = mysqli_query($conn, "SELECT * FROM `accounts` where email = '$email'");
    $row = mysqli_fetch_array($query);
    if ($row['accountType'] != "admin"){
        header("Location: http://localhost/kindergarten");
        die();
    }
    $parents = $_POST["parents"];
    $child = $_POST['child'];
    $split = explode(" ", $parents);
    mysqli_query($conn, "DELETE FROM `relations` WHERE childId = $child");
    for ($i = 0; $i<count($split) - 1; $i++){
        mysqli_query($conn, "INSERT INTO `relations`(`childId`, `accountId`) VALUES ('$child','{$split[$i]}')");
        echo "INSERT INTO `relations`(`childId`, `accountId`) VALUES ('$child','{$split[$i]}')"."<br>";
    }


