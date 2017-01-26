<?php
$basePath = __DIR__.'/../';

require($basePath."includes/bootstrapper.php");
$router = new Router;
require $basePath.'routes.php';
$uri = trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/');

if (logged_in()) {
    include $router->redirect($uri);

} else {
    include $basePath."/loginform.php";

}

