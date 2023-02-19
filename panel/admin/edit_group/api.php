<?php
    include "../../../auth.php";
    auth("admin");
    $conn = mysqli_connect("localhost", "root", "", "kindergarten");

    $group = $_POST['group'];
    $query = mysqli_query($conn, "SELECT * from `groups` where groupId = $group");
    $row = mysqli_fetch_array($query);
    echo json_encode($row);


