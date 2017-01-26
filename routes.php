<?php

$router->define([
    '' => $basePath.'includes/controllers/dashboard.php',
    'customer' => $basePath.'includes/controllers/customerview.php',
    'index.php' => $basePath.'includes/controllers/dashboard.php',
    'manifest' => $basePath.'includes/controllers/manifestview.php',
    'waybill' => $basePath.'includes/controllers/waybillview.php',
    'pod' => $basePath.'includes/controllers/podview.php',
    'tracking' => $basePath.'includes/controllers/dashboard.php',
    'costing' => $basePath.'includes/controllers/dashboard.php',
    'reports' => $basePath.'includes/controllers/dashboard.php',
    'user' => $basePath.'includes/controllers/userview.php',
    'logout' => $basePath.'includes/views/logout.php',
    'ajaxCustomer' => $basePath.'includes/controllers/customers.php',
    'ajaxManifest' => $basePath.'includes/controllers/manifests.php',
    'ajaxPods' => $basePath.'includes/controllers/pods.php',
    'ajaxWaybills' => $basePath.'includes/controllers/waybills.php',
    'ajaxUsers' => $basePath.'includes/controllers/users.php',
]);