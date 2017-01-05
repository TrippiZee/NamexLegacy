<?php
include "header.php";
?>
<div class="col-sm-11 main">
    <div class="row">
        <div class="col-sm-2 col-sm-offset-5">
            <h2>All Waybills:</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
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
            echo '<table class="table dataTable default">';
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
            echo '<table class="table table-striped dataTable waybills">
                    <thead>
                    <tr><th>Waybill_No</th><th>Date</th><th>Manifest_No</th><th>Shipper</th><th>Consignee</th></tr>
                    </thead></table>';
        }
        ?>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
