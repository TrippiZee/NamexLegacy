<?php
require("inc/core.php");
require("inc/db_connection.php");

session_destroy();

redirect_to('index.php');
