<?php
include "header.php";
?>
<?php

$id = '';
if (isset($_POST['submit'])) {

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
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $getship = $_GET['shipper'];
    $getconsignee = $_GET['consignee'];
    $getservice = $_GET['service'];
}
$query = manifest_details($id);

$edit_row = mysqli_fetch_array($query);
$customer_full = customer_full();
$customer_full1 = customer_full();
$services = services();

?>

<div id="sidemenu">
    <ul>
        <li><a href="includes/views/pod.php">Search</a> </li>
        <li><a href="includes/views/waybill.php">Add New</a></li>
        <li><a href="#">View All</a></li>

    </ul>
</div>
<div id="wrapper">
<div id="searchbox">
    <form id="search" name="search">
        <h2>Enter New Information:</h2>
</div>
</form>
<div id="table">
    <form action="#" method="post">
        <table id="table">
            <tr><th>POD Number</th><th>Date</th><th>Shipper</th><th>Consignee</th><th>Qty</th></tr>
            <tr><td><input type="text" name="number" value="<?php echo htmlentities($edit_row['waybill_no']); ?>" /></td>
                <td><input type="date" name="date" value="<?php echo htmlentities($edit_row['date']); ?>" required="required"/></td>
                <td><input type="text" name="shipper" value="<?php echo htmlentities($getship); ?>" /></td>
                <td><input type="text" name="consignee" value="<?php echo htmlentities($getconsignee); ?>" /></td>
                <td><input type="text" name="qty" value="<?php echo htmlentities($edit_row['qty']); ?>" /></td></tr>
            <tr><th>Weight</th><th>Type</th><th>Remarks</th><th>Delivery Date</th><th>Signed By</th><th>Time</th></tr>
            <tr>  <td><input type="text" name="weight" value="<?php echo htmlentities($edit_row['weight']); ?>" /></td>
                <td><input type="text" name="type" value="<?php echo htmlentities($getservice); ?>" /></td>
                <td><input type="text" name="remarks" value="<?php echo htmlentities($edit_row['remarks']); ?>" /></td>
                <td><input type="date" name="deldate" value="" required="required"/></td>
                <td><input type="text" name="signed" value="" required="required"/></td>
                <td><input type="time" name="time" value="" required="required"/></td></tr>

            <tr> <td><input type="submit" name="submit" value="Submit" /></td>
            </tr>
            <td><input Type="button" VALUE="Cancel" onClick="history.go(-1);return true;"></td>

        </table>

    </form>
</div>
</div>