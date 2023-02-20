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
    <title>Kindergarten</title><link rel='icon' type='image/x-icon' href='../../img/logo.svg'>
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/admin.css">
    <link rel="stylesheet" href="../../../css/create_child.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" defer></script>
    <script src="../../../scripts/edit_account.js" defer></script>
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
            if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['type']) && isseT($_POST['account'])){
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $email = $_POST['email'];
                $type = $_POST['type'];
                $account = $_POST['account'];
                $query = mysqli_query($conn, "UPDATE `accounts` SET `email`='$email',`name`='$name',`familyName`='$surname',`accountType`='$type' WHERE accountId = '$account'");
                echo "Updated";
            }
        ?>
        </div>
        <select name="account" id="account">
            <?php
            $query = mysqli_query($conn, "SELECT `accountId`, `email`, `name`, `familyName`, `accountType` FROM `accounts`");

            while ($row = mysqli_fetch_array($query)){
                echo "<option value='{$row['accountId']}'>{$row['name']} {$row['familyName']}</option>";
            }
            ?>
        </select>
            <label for="">
                Name:
                <input type="text" name="name" id="name">
            </label>
            <label for="">
                Surname:
                <input type="text" name="surname" id="surname">
            </label>
            <label for="">
                Email:
                <input type="email" name="email" id="email">
            </label>
            <label for="">
                Account type:
                <select name="type" id="type">
                    <option value="admin">Admin</option>
                    <option value="parent">Parent</option>
                    <option value="educator">Educator</option>
                </select>
            </label>
            <input type="submit" value="Edit">
        </form>
    </div>
</div>
</body>
</html>