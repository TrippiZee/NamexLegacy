<?php

namespace Includes\Controllers;

class CustomerController {

    public function allCustomers(){
        $basepath = __DIR__.'/../';

        require $basepath.'/views/customer.view.php';
    }

    public function filterCustomers($pdo){

        $tableRequest = $_REQUEST;
//var_dump($tableRequest);
        $columns = array(
            0 => 'comp_name',
            1 => 'acc_no',
            2 => 'address1',
            3 => 'city',
            4 => 'country',
        );
        $searchTerm = $_REQUEST['search']['value'];

        $totalRows = $pdo->query('select count(*) from customers')->fetchColumn();
        list($tableData,$rowCount) = getAllCustomers($pdo,$columns,$tableRequest,$searchTerm);

        $customers = array();

        foreach ($tableData as $row){
            $nestedData = array();
            $nestedData[] = "<a href='customer?id=".$row->id."'>".$row->comp_name."</a>";
            $nestedData[] = $row->acc_no;
            $nestedData[] = $row->address1;
            $nestedData[] = $row->city;
            $nestedData[] = $row->country;

            $customers[] = $nestedData;
        }

        $totalFiltered = $rowCount;

        $json_data = array(
            "draw"            => intval( $tableRequest['draw'] ),
            "recordsTotal"    => intval( $totalRows ),
            "recordsFiltered" => intval( $totalFiltered ),
            "data"            => $customers
        );

        echo json_encode($json_data);

    }
}
