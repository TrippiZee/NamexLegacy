<?php
include "header.php";
?>
<div id="sidemenu">
    <ul>
        <li><a href="waybill.php">Search</a> </li>
        <li><a href="#">View All</a></li>

    </ul>
</div>
<div id="wrapper">
    <div id="searchbox">
            <h2>All Waybills:</h2>
    </div>
    <div id="table">

        <?php

        $id = '';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query_result = manifest_details($id);
            $waybill = mysqli_fetch_array($query_result);

            $manifest_id = $waybill['manifest_no'];
            $manifest_no = get_manifest_no($manifest_id);

            $manifest = mysqli_fetch_array($manifest_no);

            echo '<h2>Details:</h2>';
            echo "<table id=\"table\">";
            echo "<tr><th>Date</th><th>Manifest Number</th><th>Waybill Number</th><th>Shipper</th><th>Consignee</th><th>Qty</th><th>Weight</th><th>Type</th><th>Remarks</th></tr>";
            echo '<tr><td>' . $waybill['date'] . '</td>';
            echo '<td>' . $waybill['manifest_no'] . '</td>';
            echo '<td>' . $waybill['waybill_no'] . '</td>';
            echo '<td>' . $waybill['shipper'] . '</td>';
            echo '<td>' . $waybill['consignee'] . '</td>';
            echo '<td>' . $waybill['qty'] . '</td>';
            echo '<td>' . $waybill['weight'] . '</td>';
            echo '<td>' . $waybill['type'] . '</td>';
            echo '<td>' . $waybill['remarks'] . '</td></tr>';
            echo '<tr><td class="edit"><a href="new_pod.php?id=' . $waybill['id'] . '& shipper=' . $waybill['shipper'] . ' & consignee=' . $waybill['consignee'] . '& service=' . $waybill['type'] . '"><input type="button" value="Create POD"/></a></td></tr>';
            echo "</table>";
        }
        else {
            $query_result = waybill_all();
            $table = '<table class="table table-striped dataTable default">
                             <thead><tr><th>Waybill No</th><th>Date</th><th>Manifest No</th><th>Shipper</th><th>Consignee</th></tr>
                             </thead>
                             <tbody>';
            while($AllWaybill = mysqli_fetch_assoc($query_result)) {
                $table .= '<tr><td class="edit"><a href="waybill.php?id='.$AllWaybill['id'].'">'. $AllWaybill['waybill_no']. '</a></td>
                              <td>'.$AllWaybill['date'].'</td>
                              <td>'.$AllWaybill['manifest_no'].'</td>
                              <td>'.$AllWaybill['shipper'].'</td>
                              <td>'.$AllWaybill['consignee'].'</td></tr>';
            }
            $table.= '</tbody></table>';
            echo $table;
        }
        ?>
    </div>
</div>
<?php
include "footer.php";
?>
