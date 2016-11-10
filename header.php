<?php
require ("includes/core.php");
require ("includes/db_connection.php");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Namibia Express Transport Doc Management System</title>
    <link href="stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
    <link href="scripts/bootstrap.min.js" media="all" rel="stylesheet" type="text/css" />
    <link href="scripts/dataTables.bootstrap.min.js" media="all" rel="stylesheet" type="text/css" />
    <link href="scripts/jquery-ui-1.12.1/jquery-ui.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="scripts/jquery-3.1.1.min.js"></script>
    <script src="scripts/functions.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/dataTables.bootstrap.min.js"></script>
    <script src="scripts/jquery-ui-1.12.1/jquery-ui.min.js"></script>

</head>
<body>
<div id="container">
    <div id="head">
        <div id="logo"></div>
        <div id="menu">
            <ul>
                <li><a href="customer.php">Customer</a> </li>
                <li><a href="manifest.php">Manifest</a></li>
                <li><a href="waybill.php">Waybill</a></li>
                <li><a href="pod.php">POD</a></li>
                <?php
                if (getuserfield('role') == 'admin'){
                echo '<li><a href="user.php">User</a></li>';
                }
                ?>
            </ul>
        </div>

        <div id="user">Welcome: <?php echo getuserfield('name').' '.getuserfield('surname') ?> <br/>
            <a href="logout.php">Logout</a>
        </div>
    </div>

