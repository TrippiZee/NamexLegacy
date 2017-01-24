<?php

$router->define([
    '' => 'includes/controllers/dashboard.php',
    'customer' => 'includes/controllers/customerview.php',
    'index' => 'includes/controllers/manifestview.php',
    'manifest' => 'includes/controllers/manifestview.php',
    'waybill' => 'includes/controllers/waybillview.php',
    'pod' => 'includes/controllers/podview.php',
    'tracking' => 'includes/controllers/dashboard.php',
    'costing' => 'includes/controllers/dashboard.php',
    'reports' => 'includes/controllers/dashboard.php',
    'user' => 'includes/controllers/userview.php',
    'ajaxCustomer' => 'includes/controllers/customers.php',
    'ajaxManifest' => 'includes/controllers/manifests.php',
    'ajaxPods' => 'includes/controllers/pods.php',
    'ajaxWaybills' => 'includes/controllers/waybills.php',
]);