<?php

//require("../bootstrapper.php");
require ("../core.php");
require ("../db_connection.php");
require ("../models/Customers.php");
require ("../models/Connection.php");
$config = require ("../../config.php");
$pdo = Connection::connect($config['database']);

$tableRequest = $_REQUEST;

$columns = array(
    0 => 'waybill_no',
    1 => 'date',
    2 => 'manifest_no',
    3 => 'shipper',
    4 => 'consignee',
);
$searchTerm = $_REQUEST['search']['value'];

$totalRows = $pdo->query('select count(*) from manifest_details')->fetchColumn();
list($tableData,$rowCount) = getAllWaybills($pdo,$columns,$tableRequest,$searchTerm);

$waybills = array();

foreach ($tableData as $row){
    $nestedData = array();
    $nestedData[] = "<a href='waybill.php?id=".$row->id."'>".$row->waybill_no."</a>";
    $nestedData[] = $row->date;
    $nestedData[] = $row->manifest_no;
    $nestedData[] = $row->shipper;
    $nestedData[] = $row->consignee;

    $waybills[] = $nestedData;
}

$totalFiltered = $rowCount;

$json_data = array(
    "draw"            => intval( $tableRequest['draw'] ),
    "recordsTotal"    => intval( $totalRows ),
    "recordsFiltered" => intval( $totalFiltered ),
    "data"            => $waybills
);

echo json_encode($json_data);
