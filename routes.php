<?php

$router->define([
    '' => 'includes/controllers/dashboard.php',
    'customer' => 'includes/controllers/customerview.php',
    'index.php' => 'includes/controllers/dashboard.php',
    'manifest' => 'includes/controllers/manifestview.php',
    'waybill' => 'includes/controllers/waybillview.php',
    'pod' => 'includes/controllers/podview.php',
    'tracking' => 'includes/controllers/dashboard.php',
    'costing' => 'includes/controllers/dashboard.php',
    'reports' => 'includes/controllers/dashboard.php',
    'user' => 'includes/controllers/userview.php',
    'logout' => 'includes/views/logout.php',
    'ajaxCustomer' => 'includes/controllers/customers.php',
    'ajaxManifest' => 'includes/controllers/manifests.php',
    'ajaxPods' => 'includes/controllers/pods.php',
    'ajaxWaybills' => 'includes/controllers/waybills.php',
    'ajaxUsers' => 'includes/controllers/users.php',
]);