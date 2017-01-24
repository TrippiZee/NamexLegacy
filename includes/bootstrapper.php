<?php
require ("/includes/core.php");
require ("/includes/router.php");
require ("/includes/db_connection.php");
require ("/includes/models/Connection.php");
require ("/includes/models/Customers.php");
require ("/includes/models/Waybills.php");
require ("/includes/models/Manifest.php");
require ("/includes/models/Pod.php");
require ("/includes/models/User.php");
$config = require ("/config.php");
$pdo = Connection::connect($config['database']);
