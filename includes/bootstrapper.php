<?php
require ("core.php");
require ("db_connection.php");
require ("models/Connection.php");
require ("models/Customers.php");
require ("models/Waybills.php");
require ("models/Manifest.php");
require ("models/Pod.php");
require ("models/User.php");
$pdo = Connection::connect();
