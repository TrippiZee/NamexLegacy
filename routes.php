<?php

$router->define([
    '' => 'includes/controllers/customerview.php',
    'customer' => 'includes/controllers/customerview.php',
    'index' => 'includes/controllers/manifestview.php',
    'manifest' => 'includes/controllers/dashboard.php',
    'waybill' => 'includes/controllers/dashboard.php',
    'pod' => 'includes/controllers/dashboard.php',
    'tracking' => 'includes/controllers/dashboard.php',
    'costing' => 'includes/controllers/dashboard.php',
    'reports' => 'includes/controllers/dashboard.php',
    'user' => 'includes/controllers/users',
]);