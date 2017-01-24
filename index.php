<?php
require("/includes/bootstrapper.php");
$router = new Router;
require '/routes.php';
$uri = trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/');
//var_dump($_SERVER['REQUEST_URI']);

if (logged_in()) {
//    redirect_to('includes/views/dashboard.php');
//    include "header.php";
    include $router->redirect($uri);
//    include "footer.php";

} else {
    include "/loginform.php";

}

?>
