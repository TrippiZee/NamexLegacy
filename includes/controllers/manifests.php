<?php

//require("../bootstrapper.php");
//require ("../core.php");
//require ("../db_connection.php");
//require ("../models/Manifest.php");
//require ("../models/Connection.php");
//$config = require ("../../config.php");
//$pdo = Connection::connect($config['database']);

$tableRequest = $_REQUEST;

$columns = array(
    0 => 'date',
    1 => 'manifest_no',
    2 => 'driver',
    3 => 'co_driver',
    4 => 'reg_no',
);
$searchTerm = $_REQUEST['search']['value'];


$totalRows = $pdo->query('select count(*) from manifest')->fetchColumn();
list($tableData,$rowCount) = getAllManifest($pdo,$columns,$tableRequest,$searchTerm);

$manifests = array();

foreach ($tableData as $row){
    $nestedData = array();
    $nestedData[] = $row->date;
    $nestedData[] = "<a href='manifest.php?id=".$row->id."'>".$row->manifest_no."</a>";
    $nestedData[] = $row->driver;
    $nestedData[] = $row->co_driver;
    $nestedData[] = $row->reg_no;

    $manifests[] = $nestedData;
}

$totalFiltered = $rowCount;

$json_data = array(
    "draw"            => intval( $tableRequest['draw'] ),
    "recordsTotal"    => intval( $totalRows ),
    "recordsFiltered" => intval( $totalFiltered ),
    "data"            => $manifests
);

echo json_encode($json_data);
