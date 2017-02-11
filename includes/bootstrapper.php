<?php

use Includes\Models\Connection;
use Includes\App;
require ($basePath."/includes/core.php");
require ($basePath."/includes/db_connection.php");

App::bind('config',require ($basePath."/config.php"));

App::bind('pdo',Connection::connect(App::get('config')['database']));


//$config = require ($basePath."/config.php");
//$pdo = Connection::connect($config['database']);
