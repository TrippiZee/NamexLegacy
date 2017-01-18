<?php
require ("core.php");
require ("router.php");
require ("db_connection.php");
require ("models/Connection.php");
require ("models/Customers.php");
require ("models/Waybills.php");
require ("models/Manifest.php");
require ("models/Pod.php");
require ("models/User.php");
$config = require ("../../config.php");
$pdo = Connection::connect($config['database']);
