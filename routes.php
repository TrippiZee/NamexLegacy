<?php

$router->define([
    'namexlegacy' => 'includes/controllers/dashboard.php',
    'namexlegacy/index.php' => 'includes/controllers/customerview.php',
    'namexlegacy/customer.php' => 'includes/controllers/customers.php',
    'manifest' => 'includes/controllers/manifests',
    'waybill' => 'includes/controllers/waybills',
    'pod' => 'includes/controllers/pods',
    'tracking' => 'includes/controllers/tracking',
    'costing' => 'includes/controllers/costing',
    'reports' => 'includes/controllers/reports',
    'user' => 'includes/controllers/users',
]);