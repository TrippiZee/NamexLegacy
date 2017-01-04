<?php
require ("includes/core.php");
require ("includes/db_connection.php");
require ("includes/models/Connection.php");
require ("includes/models/Customers.php");
require ("includes/models/Waybills.php");
require ("includes/models/Manifest.php");
require ("includes/models/Pod.php");
require ("includes/models/User.php");
$pdo = Connection::connect();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Namibia Express Transport Doc Management System</title>
    <link href="stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/dataTables.bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="container-fluid">
    <div id="head" class="row">
        <div class="col-sm-12">
        <div id="logo"></div>
<!--        <nav class="navbar">-->
<!--            <ul class="nav navbar-nav">-->
<!--                <li><a href="customer.php">Customer</a> </li>-->
<!--                <li><a href="manifest.php">Manifest</a></li>-->
<!--                <li><a href="waybill.php">Waybill</a></li>-->
<!--                <li><a href="pod.php">POD</a></li>-->
<!--                --><?php
//                if (getuserfield('role') == 'admin'){
//                    echo '<li><a href="reports.php">Admin</a></li>';
//                }
//                ?>
<!--            </ul>-->
<!--        </nav>-->
<!--        <div id="menu">-->
<!--            <ul>-->
<!--                <li><a href="customer.php">Customer</a> </li>-->
<!--                <li><a href="manifest.php">Manifest</a></li>-->
<!--                <li><a href="waybill.php">Waybill</a></li>-->
<!--                <li><a href="pod.php">POD</a></li>-->
<!--                --><?php
//                if (getuserfield('role') == 'admin'){
//                    echo '<li><a href="user.php">User</a></li>';
//                    echo '<li><a href="reports.php">Admin</a></li>';
//                }
//                ?>
<!--            </ul>-->
<!--        </div>-->

        <div id="user">Welcome: <?php echo getuserfield('name').' '.getuserfield('surname') ?> <br/>
            <a href="logout.php">Logout</a>
        </div>
        </div>
    </div>
<?php
include "sidemenu.php";
?>
