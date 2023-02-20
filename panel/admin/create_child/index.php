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
                Name:    
                <input type="text" name="name">
                Surname:
                <input type="text" name="surname">
                Birthdate:
                <input type="date" name="birthdate">
                Group (leave empty if needed):
                <select name="group" id="">
                    <option disabled selected value> -- select an option -- </option>
                    <?php
                        $query = mysqli_query($conn, "SELECT groupId as id, groupName as name from `GROUPS`");

                        while ($row = mysqli_fetch_array($query)){
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                    ?>
                    
                </select><br>
                <input type="submit" value="Add">
                    <?php
                    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birthdate'])){
                        $name = $_POST['name'];
                        $surname = $_POST['surname'];
                        $birthdate = $_POST['birthdate'];
                        $group = $_POST['group'] ?? "";

                        $query = mysqli_query($conn, "INSERT INTO `children` (`id`, `name`, `familyName`, `birthdate`, `groupId`) VALUES (NULL, '$name', '$surname', '$birthdate', '$group');");
                        echo "Added new child!";
                    }
                    ?>
                </form>
            </div>
        </div>
</body>
</html>