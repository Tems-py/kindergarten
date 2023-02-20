<?php
    include "../../../auth.php";
    auth("admin");
    $conn = mysqli_connect("localhost", "root", "", "kindergarten");

    $parent = $_POST['account'];
    $query = mysqli_query($conn, "SELECT `accountId`, `email`, `name`, `familyName`, `accountType` FROM `accounts` WHERE accountId = {$parent}");
    $row = mysqli_fetch_array($query);
    echo json_encode($row);


