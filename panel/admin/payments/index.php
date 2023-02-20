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
                
                <table>
                    <tr><th>Id</th><th>Cost</th><th>Date</th><th>Objective</th><th>Email</th></tr>
                    <?php
                        $query = mysqli_query($conn, "SELECT paymentId, cost, dateDue, objective, email FROM payments JOIN accounts ON payments.accountId = accounts.accountId");
                        while ($row = mysqli_fetch_array($query)){
                            echo "<tr><td>{$row['paymentId']}</td><td>{$row['cost']}</td><td>{$row['dateDue']}</td><td>{$row['objective']}</td><td>{$row['email']}</td></tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
</body>
</html>