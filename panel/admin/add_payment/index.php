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
    <link rel="stylesheet" href="../../../css/payments.css">
    <script src="../../../scripts/payments.js" defer></script>
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
                    <label for="">
                        Who you want to ask for payment?
                        <select name="who" id="who">
                            <option value="0" disabled selected>-- Select --</option>
                            <option value="1">Everyone</option>
                            <option value="2">Children from group</option>
                            <option value="3">Select children</option>
                        </select>
                    </label>
                    <div class="hidden" id="option1">
                        <label for="">Cost: <input type="text" name="cost" class="option"></label>
                        <label for="">Date due: <input type="date" name="due" class="option"></label>
                        <label for="">Objective: <input type="text" name="objective" class="option"></label>
                        <input type="submit" value="Add">
                    </div>
                    <div class="hidden" id="option2">
                        <label for="">
                            Select group: <select name="group" id="">
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM `groups`");

                                while ($row = mysqli_fetch_array($query)){
                                    echo "<option value='{$row['groupId']}'>{$row['groupName']}</option>";
                                }
                                ?>
                            </select>
                        </label>
                        <label for="">Cost: <input type="text" name="cost" class="option"></label>
                        <label for="">Date due: <input type="date" name="due" class="option"></label>
                        <label for="">Objective: <input type="text" name="objective" class="option"></label>
                        <input type="submit" value="Add">
                    </div>
                    <div class="hidden" id="option3">

                    </div>
                    <?php
                    if (isset($_POST['who']) && isset($_POST['cost']) && isset($_POST['due']) && isset($_POST['objective']) && isset($_POST['group'])){
                        $query = mysqli_query($conn, "SELECT id FROM children WHERE groupid = {$_POST['group']}");
                        while ($row=mysqli_fetch_array($query)){
                            mysqli_query($conn, "INSERT INTO `paymentnotice`(`childId`, `cost`, `dateDue`, `objectives`) VALUES ('{$row['id']}','{$_POST['cost']}','{$_POST['due']}','{$_POST['objective']}')");
                        }
                        echo "Added payment request to group";
                    }

                    else if (isset($_POST['who']) && isset($_POST['cost']) && isset($_POST['due']) && isset($_POST['objective'])){
                        $query = mysqli_query($conn, "SELECT id FROM children");
                        while ($row=mysqli_fetch_array($query)){
                            mysqli_query($conn, "INSERT INTO `paymentnotice`(`childId`, `cost`, `dateDue`, `objectives`) VALUES ('{$row['id']}','{$_POST['cost']}','{$_POST['due']}','{$_POST['objective']}')");
                        }
                        echo "Added payment request to everyone";
                    }
                    ?>
                </form>
            </div>

        </div>
</body>
</html>