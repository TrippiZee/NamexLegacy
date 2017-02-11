<?php

$router->get('','CustomerController@allCustomers');
$router->get('customer','CustomerController@allCustomers');
$router->get('manifest','CustomerController@allCustomers');
$router->get('waybill','CustomerController@allCustomers');
$router->get('pod','CustomerController@allCustomers');
$router->get('tracking','CustomerController@allCustomers');
$router->get('costing','CustomerController@allCustomers');
$router->get('reports','CustomerController@allCustomers');
$router->get('user','CustomerController@allCustomers');
$router->get('logout','CustomerController@allCustomers');
$router->get('print_manifest','CustomerController@allCustomers');
$router->post('ajaxCustomer','CustomerController@filterCustomers');
$router->post('ajaxManifest','CustomerController@allCustomers');
$router->post('ajaxPods','CustomerController@allCustomers');
$router->post('ajaxWaybills','CustomerController@allCustomers');
$router->post('ajaxUsers','CustomerController@allCustomers');
