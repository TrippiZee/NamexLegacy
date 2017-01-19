<?php
require("includes/bootstrapper.php");
$router = new Router;
require 'routes.php';
$uri = trim($_SERVER['REQUEST_URI'],'/');
var_dump($_SERVER['REQUEST_URI']);

if (logged_in()) {
//    redirect_to('includes/views/dashboard.php');
    include $router->redirect($uri);
} else {
    include "loginform.php";

}

?>
