<?php
    include "../../../auth.php";
    auth("admin");
    $conn = mysqli_connect("localhost", "root", "", "kindergarten");

    $child = $_POST['child'];
    $query = mysqli_query($conn, "SELECT accounts.accountId, accounts.name, accounts.familyName from `relations` join accounts ON accounts.accountId = relations.accountId where childId = '$child'");
    $row = mysqli_fetch_all($query);
    echo json_encode($row);


