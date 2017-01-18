<?php

$router->define([
    '' => 'includes/controllers/dashboard',
    'namexlegacy/includes/views/dashboard' => 'includes/controllers/dashboard.php',
    'customer' => 'includes/controllers/customers',
    'manifest' => 'includes/controllers/manifests',
    'waybill' => 'includes/controllers/waybills',
    'pod' => 'includes/controllers/pods',
    'tracking' => 'includes/controllers/tracking',
    'costing' => 'includes/controllers/costing',
    'reports' => 'includes/controllers/reports',
    'user' => 'includes/controllers/users',
]);