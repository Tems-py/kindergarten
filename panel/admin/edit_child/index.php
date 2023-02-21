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
    <link rel="stylesheet" href="../../../css/edit_child.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" defer></script>
    <script src="../../../scripts/edit_child.js" defer></script>
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
                <h1>Edit child</h1>
                <form action="" method="POST">
                Select child: <select name="child" id="child">
                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM `children`");

                        while ($row = mysqli_fetch_array($query)){
                            echo "<option value='{$row['id']}'>{$row['name']} {$row['familyName']} ({$row['id']})</option>";
                        }
                    ?>
                </select>
                    <div id="info">
                         <label>
                            Name:
                            <input type="text" id="i_name" name="name">
                        </label>
                        <label>
                            Surname:
                            <input type="text" id="i_surname" name="surname">
                        </label>
                        <label>
                            Birthdate:
                            <input type="date" id="i_birthdate" name="birthdate">
                        </label>
                        <label>
                            Group:
                            <select id="i_group" name="group">
                                <?php
                                $query = mysqli_query($conn, "SELECT groupId as id, groupName as name from `GROUPS`");

                                while ($row = mysqli_fetch_array($query)){
                                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                                }
                                ?>
                            </select>
                        </label>
                        <input type="submit" value="Update">
                    </div>
                </form>
                    <?php
                        if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birthdate']) && isset($_POST['group'])){
                            $name = $_POST['name'];
                            $surname = $_POST['surname'];
                            $birthdate = $_POST['birthdate'];
                            $group = $_POST['group'];
                            $id = $_POST['child'];

                            $query = mysqli_query($conn, "UPDATE `children` SET `name` = '$name', `familyName` = '$surname', `birthdate` = '$birthdate', `groupId` = '$group' WHERE `children`.`id` = $id;");
                        }
                    ?>
                <div id="parents" class="flex_column">
                    <h1>Assign parents</h1>
                    <div>
                        <select name="" id="parent">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM `accounts` where accountType = 'parent'");

                            while ($row = mysqli_fetch_array($query)){
                                echo "<option value='{$row['accountId']}'>{$row['name']} {$row['familyName']} ({$row['accountId']})</option>";
                            }
                            ?>
                        </select> <input type="button" value="Add" id="add_parent">
                    </div>
                    <div>
                        <ul id="p_list">

                        </ul>
                        <input type="button" value="Update parents" id="p_add">
                    </div>
                </div>
            </div>
        </div>
</body>
</html>