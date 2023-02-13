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
    $child = $_POST['child'];
    $query = mysqli_query($conn, "SELECT * from children where id = $child");
    $row = mysqli_fetch_array($query);
    echo json_encode($row);


