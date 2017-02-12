<?php

$router->get('','CustomerController@allCustomers');
$router->get('customer','CustomerController@allCustomers');
$router->get('manifest','ManifestController@allManifests');
$router->get('waybill','WaybillController@allWaybills');
$router->get('pod','PodController@allPods');
$router->get('tracking','CustomerController@allCustomers');
$router->get('costing','CustomerController@allCustomers');
$router->get('reports','CustomerController@allCustomers');
$router->get('user','UserController@allUsers');
$router->get('logout','CustomerController@allCustomers');
$router->get('print_manifest','CustomerController@allCustomers');
$router->post('ajaxCustomer','CustomerController@filterCustomers');
$router->post('ajaxManifest','ManifestController@filterManifests');
$router->post('ajaxPods','PodController@filterPods');
$router->post('ajaxWaybills','WaybillController@filterWaybills');
$router->post('ajaxUsers','UserController@filterUsers');
