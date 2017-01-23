<?php
require("../core/core.php");
require("../core/request/router.php");
require("../core/db_connection.php");
require("../inc/models/Connection.php");
require("../inc/models/Customers.php");
require("../inc/models/Waybills.php");
require("../inc/models/Manifest.php");
require("../inc/models/Pod.php");
require("../inc/models/User.php");
$config = require ("../config.php");
$pdo = Connection::connect($config['database']);
