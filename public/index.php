<?php
require("../bootstrap/bootstrapper.php");
$router = new Router;
require '../bootstrap/routes.php';
$uri = trim($_SERVER['REQUEST_URI'],'/');
//var_dump($uri);

if (logged_in()) {
//    redirect_to('inc/views/dashboard.php');
    include '../inc/layout/header.php';
    include $router->redirect($uri);
    include '../inc/layout/footer.php';
}
else {
    include "loginform.php";

}

?>
