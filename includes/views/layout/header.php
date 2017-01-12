<?php
require("../bootstrapper.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Namibia Express Transport Doc Management System</title>
    <link href="../../stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../stylesheets/dataTables.bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../scripts/jquery-ui-1.12.1/jquery-ui.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="../../scripts/jquery-ui-1.12.1/jquery-ui.structure.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="../../scripts/jquery-ui-1.12.1/jquery-ui.theme.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="../../stylesheets/jquery-ui-timepicker-addon.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="../../stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="container-fluid">
    <div id="head" class="row">
        <div class="col-sm-12">
        <div id="logo"></div>
        <div id="user">Welcome: <?php echo getuserfield('name').' '.getuserfield('surname') ?> <br/>
            <a href="../../../logout.php">Logout</a>
        </div>
        </div>
    </div>
<?php
include "layout/sidemenu.php";
?>
