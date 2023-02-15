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
                <h1>Add new group</h1>
                <?php
                $children = '';
                if (isset($_POST['name']) && isset($_POST['caretaker'])){
                    $query = mysqli_query($conn, "INSERT INTO `groups`(`groupName`, `caretakerId`) VALUES ('{$_POST['name']}','{$_POST['caretaker']}')");
                    $query = mysqli_query($conn, "SELECT groupId from `groups` order by groupId desc limit 1");
                    $num = mysqli_fetch_array($query)["groupId"];
                    $query = mysqli_query($conn, "SELECT `id` FROM children WHERE groupId = ''");
                    while ($row = mysqli_fetch_array($query)){
                        if (isset($_POST[$row['id']])){
                            mysqli_query($conn, "UPDATE `children` SET `groupId` = '$num' WHERE `id` = {$row['id']}");
                        }
                    }
                    echo "You added new group!";
                }
                ?>
                <form action="" method="POST">
                    <label>
                        Name:
                        <input type="text" name="name">
                    </label>
                    <label>
                        Caretaker:
                        <select name="caretaker" id="">
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
                                echo "<label><input type='checkbox' name='{$row['id']}' {$dis}>{$row['familyName']} {$row['name']}</label>";
                            }
                        ?><br>
                    <input type="submit" value="Add">
                </form>    
            </div>
        </div>
</body>
</html>