<?php

$router->define([
    '' => '../inc/controllers/dashboard.php',
    'index' => '../inc/controllers/dashboard.php',
    'customer' => 'inc/controllers/customerview.php',
    'manifest' => 'inc/controllers/manifestview.php',
    'waybill' => 'inc/controllers/waybillsview.php',
    'pod' => 'inc/controllers/podview.php',
    'tracking' => 'inc/controllers/dashboard.php',
    'costing' => 'inc/controllers/dashboard.php',
    'reports' => 'inc/controllers/dashboard.php',
    'user' => 'inc/controllers/usersview',
]);