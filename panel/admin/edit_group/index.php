<?php
include "../../../auth.php";
auth("admin");
$conn = mysqli_connect("localhost", "root", "", "kindergarten");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kindergarten</title><link rel='icon' type='image/x-icon' href='../../../img/logo.svg'>
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/admin.css">
    <link rel="stylesheet" href="../../../css/edit_group.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" defer></script>
    <script src="../../../scripts/edit_group.js" defer></script>
</head>
<body>
<div id="container">
    <?php
    include "../../../navbar.php";
    navbar();
    ?>
</div>
<div id="content">
    <?php
    include "../sidebar.php";
    sidebar();
    ?>
    <div id="data">
        <form action="" method="POST">
        <?php

        if (isset($_POST['name']) && isset($_POST['caretaker']) && isset($_POST['group'])){
//                $query = mysqli_query($conn, "INSERT INTO `groups`(`groupName`, `caretakerId`) VALUES ('{$_POST['name']}','{$_POST['caretaker']}')");
            mysqli_query($conn, "UPDATE `groups` SET `groupName`='{$_POST['name']}', `caretakerId`='{$_POST['caretaker']}' WHERE groupId = {$_POST['group']}");
            $num = $_POST['group'];
            $query = mysqli_query($conn, "SELECT `id` FROM children WHERE groupId = ''");
            while ($row = mysqli_fetch_array($query)){
                if (isset($_POST[$row['id']])){
                    mysqli_query($conn, "UPDATE `children` SET `groupId` = '$num' WHERE `id` = {$row['id']}");
                }
            }
            $query = mysqli_query($conn, "SELECT `id` FROM children WHERE groupId = '{$num}'");
            while ($row = mysqli_fetch_array($query)){
                if (!isset($_POST[$row['id']])){
                    mysqli_query($conn, "UPDATE `children` SET `groupId` = '' WHERE `id` = '{$row['id']}'");
                }
            }
            echo "Successfully edited group!";
        }

        ?>
        <select name="group" id="group">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM `groups`");

            while ($row = mysqli_fetch_array($query)){
                echo "<option value='{$row['groupId']}'>{$row['groupName']}</option>";
            }
            ?>
        </select>



            <label>
                Name:
                <input type="text" name="name" id="name">
            </label>
            <label>
                Caretaker:
                <select name="caretaker" id="caretaker">
                    <?php
                    $query = mysqli_query($conn, "SELECT * from accounts WHERE accountType='educator'");

                    while ($row = mysqli_fetch_array($query)){
                        echo "<option value='{$row['accountId']}'>{$row['name']} {$row['familyName']}</option>";
                    }
                    ?>
                </select>
            </label>
            You can assign child's to this group (optional)<br><br>
            <?php
            $query = mysqli_query($conn, "SELECT * from children ORDER BY familyName, 'name'");


            while ($row = mysqli_fetch_array($query)){
                $dis = 'disabled';
                if ($row['groupId'] == ""){
                    $dis = 'enabled';
                }
                echo "<label><input type='checkbox' class='checkbox' name='{$row['id']}' {$dis}>{$row['familyName']} {$row['name']}</label>";
            }
            ?><br>
            <input type="submit" value="Edit">
        </form>
    </div>
</div>
</body>
</html>