<?php

//$router->define([
//    '' => $basePath.'includes/controllers/dashboard.php',
//    'customer' => $basePath.'includes/controllers/customerview.php',
////    'index.php' => $basePath.'includes/controllers/customerview.php',
//    'manifest' => $basePath.'includes/controllers/manifestview.php',
//    'waybill' => $basePath.'includes/controllers/waybillview.php',
//    'pod' => $basePath.'includes/controllers/podview.php',
//    'tracking' => $basePath.'includes/controllers/dashboard.php',
//    'costing' => $basePath.'includes/controllers/dashboard.php',
//    'reports' => $basePath.'includes/controllers/dashboard.php',
//    'user' => $basePath.'includes/controllers/userview.php',
//    'logout' => $basePath.'includes/views/logout.php',
//    'ajaxCustomer' => $basePath.'includes/controllers/customers.php',
//    'ajaxManifest' => $basePath.'includes/controllers/manifests.php',
//    'ajaxPods' => $basePath.'includes/controllers/pods.php',
//    'ajaxWaybills' => $basePath.'includes/controllers/waybills.php',
//    'ajaxUsers' => $basePath.'includes/controllers/users.php',
//]);

$router->get('',$basePath.'includes/controllers/dashboard.php');
$router->get('customer',$basePath.'includes/controllers/customerview.php');
$router->get('manifest',$basePath.'includes/controllers/manifestview.php');
$router->get('waybill',$basePath.'includes/controllers/waybillview.php');
$router->get('pod',$basePath.'includes/controllers/podview.php');
$router->get('tracking',$basePath.'includes/controllers/dashboard.php');
$router->get('costing',$basePath.'includes/controllers/dashboard.php');
$router->get('reports',$basePath.'includes/controllers/dashboard.php');
$router->get('user',$basePath.'includes/controllers/userview.php');
$router->get('logout',$basePath.'includes/controllers/logout.php');
$router->get('print_manifest',$basePath.'includes/print_manifest.php');
$router->post('ajaxCustomer',$basePath.'includes/controllers/customers.php');
$router->post('ajaxManifest',$basePath.'includes/controllers/manifests.php');
$router->post('ajaxPods',$basePath.'includes/controllers/pods.php');
$router->post('ajaxWaybills',$basePath.'includes/controllers/waybills.php');
$router->post('ajaxUsers',$basePath.'includes/controllers/users.php');
