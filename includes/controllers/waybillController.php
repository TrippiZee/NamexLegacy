<?php

namespace Includes\Controllers;
use Includes\App;
use Includes\Models\Waybills;
use Includes\Models\Services;

class WaybillController{

    public function allWaybills(){
        $pdo = App::get('pdo');
        $services = new Services();
        $getServices = $services->getServices($pdo);

        return view('waybill',['services'=>$getServices]);
    }


    public function filterWaybills(){

        $pdo = App::get('pdo');
        $waybill = new Waybills();

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
        list($tableData,$rowCount) = $waybill->getAllWaybills($pdo,$columns,$tableRequest,$searchTerm);

        $waybills = array();

        foreach ($tableData as $row){
            $nestedData = array();
            $nestedData[] = "<a href='waybill?id=".$row->id."'>".$row->waybill_no."</a>";
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

    }
}