<?php
require ("includes/core.php");
require ("includes/db_connection.php");


if (logged_in()) {
    redirect_to('includes/views/dashboard.php');
} else {
    include "loginform.php";

}

?>
<link href="stylesheets/login.css" media="all" rel="stylesheet" type="text/css" />
