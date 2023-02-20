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
    <title>Kindergarten</title>
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/admin.css">
    <link rel="stylesheet" href="../../../css/create_group.css">
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
            <div>
                <?php
                if (isset($_POST['group'])){
                    mysqli_query($conn, "DELETE FROM `groups` WHERE groupId = {$_POST['group']}");
                }
                ?>
            </div>
            <label for="">
                Group:
            <select name="group" id="group">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM `groups`");

                while ($row = mysqli_fetch_array($query)){
                    echo "<option value='{$row['groupId']}'>{$row['groupName']}</option>";
                }
                ?>
            </select>
            </label>
            <input type="submit" value="Delete">
        </form>
    </div>
</div>
</body>
</html>