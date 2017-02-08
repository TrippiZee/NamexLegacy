<?php
$basePath = __DIR__.'/../';
require($basePath."vendor/autoload.php");
require($basePath."includes/bootstrapper.php");
use Includes\Router;
use Includes\Request;
$router = new Router;
require $basePath.'routes.php';
//$uri = trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/');

//$router = Router::load($basePath.'routes.php');

if (logged_in()) {
//    require $router->redirect(Request::uri(), Request::method());
    Router::load($basePath.'routes.php')->redirect(Request::uri(),Request::method());

} else {
    include $basePath."/loginform.php";

}

