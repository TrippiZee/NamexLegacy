<?php

$tableRequest = $_REQUEST;
$columns = array(
    0 => 'username',
    1 => 'name',
    2 => 'surname',
    3 => 'role',
);
$searchTerm = $_REQUEST['search']['value'];

$totalRows = $pdo->query('select count(*) from users')->fetchColumn();
list($tableData,$rowCount) = getAllUsersAjax($pdo,$columns,$tableRequest,$searchTerm);

$users = array();

foreach ($tableData as $row){
    $nestedData = array();
    $nestedData[] = "<a href='user?id=".$row->id."'>".$row->username."</a>";
    $nestedData[] = $row->name;
    $nestedData[] = $row->surname;
    $nestedData[] = $row->role;

    $users[] = $nestedData;
}

$totalFiltered = $rowCount;

$json_data = array(
    "draw"            => intval( $tableRequest['draw'] ),
    "recordsTotal"    => intval( $totalRows ),
    "recordsFiltered" => intval( $totalFiltered ),
    "data"            => $users
);

echo json_encode($json_data);
