<?php
include "header.php";
?>
<div class="col-sm-11 main">
    <div class="row">
        <div class="col-sm-12">
        <?php

        if (isset($_POST['createPOD'])) {

            $pod = $_POST['number'];
            $date = $_POST['date'];
            $shipper = strtoupper($_POST['shipper']);
            $consignee = strtoupper($_POST['consignee']);
            $qty = $_POST['qty'];
            $type = strtoupper($_POST['type']);
            $remarks = strtoupper($_POST['remarks']);
            $weight = $_POST['weight'];
            $deldate = $_POST['deldate'];
            $signed = strtoupper($_POST['signed']);
            $time = $_POST['time'];



            $query  = "INSERT INTO pod (";
            $query .= "  pod_no, date, shipper, consignee, qty, weight, type, remarks, delivery_date, signed_by, time";
            $query .= ") VALUES (";
            $query .= " '{$pod}', '{$date}', '{$shipper}', '{$consignee}', '{$qty}', '{$weight}', '{$type}', '{$remarks}', '{$deldate}', '{$signed}', '{$time}'";
            $query .= ")";
            $result = mysqli_query($connection, $query);

            if ($result) {
                // Success
                redirect_to("pod.php?id=".mysqli_insert_id($connection));
            } else {
                // Failure
                echo 'Failed';
                die("Subject update failed.".mysqli_error($connection));

            }

        }

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
//            echo '<tr><td class="edit"><a href="new_pod.php?id=' . $waybill['id'] . '& shipper=' . $waybill['shipper'] . ' & consignee=' . $waybill['consignee'] . '& service=' . $waybill['type'] . '"><input type="button" value="Create POD"/></a></td></tr>';
            echo '<tr><td class="edit"><button data-toggle="modal" data-target="#createPOD" class="btn btn-success col-xs-12 btn-narrow">Create POD</button></td></tr>';
            echo "</table>";
        }
        else {
            echo '<h2>All Waybills</h2>';
            echo '<table class="table table-striped dataTable waybills">
                    <thead>
                    <tr><th>Waybill_No</th><th>Date</th><th>Manifest_No</th><th>Shipper</th><th>Consignee</th></tr>
                    </thead></table>';
        }
        ?>

            <div id="createPOD" class="modal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Create POD</h4>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="post">

                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">POD Number</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="number" value="<?php echo htmlentities($waybill['waybill_no'])?>">
                                    </div>
                                    <label for="date" class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="date" value="<?php echo htmlentities($waybill['date'])?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="shipper" class="col-sm-2 col-form-label">Shipper</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="shipper" value="<?php echo htmlentities($waybill['shipper'])?>">
                                    </div>
                                    <label for="consignee" class="col-sm-2 col-form-label">Consignee</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="consignee" value="<?php echo htmlentities($waybill['consignee'])?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="qty" class="col-sm-2 col-form-label">Quantity</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="qty" value="<?php echo htmlentities($waybill['qty'])?>">
                                    </div>
                                    <label for="weight" class="col-sm-2 col-form-label">Weight</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="weight" value="<?php echo htmlentities($waybill['weight'])?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="type" class="col-sm-2 col-form-label">Type</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="type" value="<?php echo htmlentities($waybill['type'])?>">
                                    </div>
                                    <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="remarks" value="<?php echo htmlentities($waybill['remarks'])?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="deldate" class="col-sm-2 col-form-label">Delivery Date</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control date" name="deldate" value="">
                                    </div>
                                    <label for="signed" class="col-sm-2 col-form-label">Signed</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="signed" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="time" class="col-sm-2 col-form-label">Time</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control time" name="time" value="">
                                    </div>
                                </div>
                        </div>

                        <div class="modal-footer">
                            <div class="form-group row">
                                <input type="submit" name="createPOD" value="Create POD" />
                                <input Type="button" VALUE="Cancel" data-dismiss="modal">

                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
include "footer.php";
?>
