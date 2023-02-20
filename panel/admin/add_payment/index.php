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
    <script src="../../scripts/payments.js"></script>
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
                        <select name="" id="who">
                            <option value="1">Everyone</option>
                            <option value="2">Children from group</option>
                            <option value="3">Select children</option>
                        </select>
                        <div class="hidden">
                            <form action="" method="POST">
                                Cost: <input type="text" name="cost">
                                Date due: <input type="date" name="due" id="">
                                
                            </form>
                        </div>
                    </label>
                </form>
            </div>
        </div>
</body>
</html>