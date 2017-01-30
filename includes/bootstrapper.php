<?php
require ($basePath."/includes/core.php");
//require ($basePath."/includes/router.php");
require ($basePath."/includes/db_connection.php");
//require ($basePath."/includes/models/Connection.php");
//require ($basePath."/includes/models/Customers.php");
//require ($basePath."/includes/models/Waybills.php");
//require ($basePath."/includes/models/Manifest.php");
//require ($basePath."/includes/models/Pod.php");
//require ($basePath."/includes/models/User.php");
//require ($basePath."/includes/models/UserRole.php");
//require ($basePath."/includes/models/Services.php");
$config = require ($basePath."/config.php");
$pdo = Connection::connect($config['database']);
