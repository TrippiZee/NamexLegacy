<?php
include "header.php";

?>
<div id="sidemenu">
    <ul>
        <li><a href="manifest.php">Search</a> </li>
        <li><a href="new_manifest.php">Add New</a></li>
        <li><a href="#">View All</a></li>

    </ul>
</div>
<div id="wrapper">
<div id="searchbox">
    <form id="search" name="search">
        <h2>Search for a Manifest by Number:</h2>
        <input type="text" name="search" autocomplete="off" onkeyup="search_manifest(this.value)">
        <div id='result'></div>

</div>
</form>
<div id="table">

    <?php

    if (isset($_GET['id'])){
        $id=$_GET['id'];

        $query_result = manifest($id);
        $manifest = mysqli_fetch_array($query_result);


        echo '<h2>Details:</h2>';
        echo "<table>";
        echo "<tr><th>Date</th><th>Manifest No</th><th>Driver</th><th>Co-Driver</th><th>Reg No</th></tr>";

        echo '<tr><td>'. $manifest['date']. '</td>';
        echo '<td>'.$manifest['manifest_no'].'</td>';
        echo '<td>'.$manifest['driver'].'</td>';
        echo '<td>'.$manifest['co_driver'].'</td>';
        echo '<td>'.$manifest['reg_no'].'</td></tr>';
        if ($manifest['finalised'] == '0') {
        echo '<tr><td class="edit"><a href="edit_manifest.php?id='.$manifest['id'].'"><input type="button" value="Edit"/></a></td></tr>';
    if (getuserfield('role') == 'admin'){
        echo '<tr><td class="edit"><a href="del_manifest.php?id='.$manifest['id'].'" onclick="return confirm(\'Really Delete?\');"><input type="button" value="Delete"/></a></td>';
    }
        echo "</tr>";}


        $manifest_id = $manifest['id'];

        $query = 'SELECT * ';
        $query .= 'FROM manifest_details ';
        $query .= "WHERE manifest_no = {$manifest_id}";

        $manifest_query_details = mysqli_query($connection,$query);

        $sum_qty = quantity($manifest_id);
        $qty = mysqli_fetch_array($sum_qty);
        $sum_weight = weight($manifest_id);
        $weight = mysqli_fetch_array($sum_weight);
        $sum_overnight = overnight($manifest_id);
        $overnight = mysqli_fetch_array($sum_overnight);
        $sum_budget = budget($manifest_id);
        $budget = mysqli_fetch_array($sum_budget);
        $sum_consol = consol($manifest_id);
        $consol = mysqli_fetch_array($sum_consol);
        $sum_economy = economy($manifest_id);
        $economy = mysqli_fetch_array($sum_economy);

        echo '<table >';
        echo '<tr><td style="width:470px"></td><td><a href="new_waybill.php?id='.$manifest_id.'"><input type="button" value="Add New Waybill"/></a> </td></tr>';
        echo '<tr><br /></tr>';
        echo "</table></tr>";

        echo "<tr><table id='subtable'>";
        echo '<h2>Waybills:</h2>';

        echo "<tr><th>Waybill Number</th><th>Shipper</th><th>Consignee</th><th>Qty</th><th>Weight</th><th>Type</th><th>Remarks</th></tr>";
        while ($manifest_details = mysqli_fetch_assoc($manifest_query_details)) {

            echo '<tr><td>'. $manifest_details['waybill_no']. '</td>';
            echo '<td>'.$manifest_details['shipper'].'</td>';
            echo '<td>'.$manifest_details['consignee'].'</td>';
            echo '<td>'.$manifest_details['qty'].'</td>';
            echo '<td>'.$manifest_details['weight'].'</td>';
            echo '<td>'.$manifest_details['type'].'</td>';
            echo '<td>'.$manifest_details['remarks'].'</td></tr>';
            echo '<tr><td class="edit"><a href="edit_waybill.php?id='.$manifest_details['id'].'& shipper='.$manifest_details['shipper'].'& type='.$manifest_details['type'].'"><input type="button" value="Edit"/></a></td>';
            if (getuserfield('role') == 'admin'){
                echo '<td class="edit"><a href="del_waybill.php?id='.$manifest_details['id'].'" onclick="return confirm(\'Really Delete?\');"><input type="button" value="Delete"/></a></td>';}
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td class="edit"><a href="new_pod.php?id='.$manifest_details['id'].'& shipper='.$manifest_details['shipper'].' & consignee='.$manifest_details['consignee'].'& service='.$manifest_details['type'].'"><input type="button" value="Create POD"/></a></td>';
        }

        echo "<table>";
        echo '<h2>Seal Numbers:</h2>';
        echo "<tr><th>Seal1</th><th>Seal2</th><th>Seal3</th><th>Seal4</th></tr>";

        echo '<tr><td>'.$manifest['seal1']. '</td>';
        echo '<td>'.$manifest['seal2'].'</td>';
        echo '<td>'.$manifest['seal3'].'</td>';
        echo '<td>'.$manifest['seal4'].'</td></tr>';
        echo '<tr><td class="edit"><a href="sealnumbers.php?id='.$manifest['id'].'"><input type="button" value="Add/Edit Seal Nr"/></a></td></tr>';

        echo '</table>';

    echo '<table>';
            echo '<tr><th>Total Quantity</th><th>Total Weight</th><th>Overnight</th><th>Budget</th><th>Consolidated</th><th>Economy</th></tr>';
            echo '<tr><td>'.$qty['SUM(qty)'].'</td><td>'.$weight['SUM(weight)'].'</td><td>'.$overnight['SUM(weight)'].'</td><td>'.$budget['SUM(weight)'].'</td><td>'.$consol['SUM(weight)'].'</td><td>'.$economy['SUM(weight)'].'</td></tr>';

            echo '<tr></tr>';
            echo '<tr></tr>';
            echo '<tr></tr>';

            echo '<tr><td><a href="print_manifest.php?print_id='.$manifest_id.'" target="_BLANK"><input type="button" value="PRINT"/></a> </td></tr>';
            echo '<tr><br /></tr>';
            echo '<tr><br /></tr>';
            echo '<tr><br /></tr>';
            echo "</table>";

    }
     else {
        $query_result = manifest_All();
        while($AllManifest = mysqli_fetch_assoc($query_result)) {
            echo "<table>";
            echo "<tr><th>Date</th><th>Manifest No</th><th>Driver</th><th>Co-Driver</th><th>Reg No</th></tr>";

            echo '<tr><td class="edit"><a href="manifest.php?id='.$AllManifest['id'].'">'. $AllManifest['date']. '</a></td>';
            echo '<td>'.$AllManifest['manifest_no'].'</td>';
            echo '<td>'.$AllManifest['driver'].'</td>';
            echo '<td>'.$AllManifest['co_driver'].'</td>';
            echo '<td>'.$AllManifest['reg_no'].'</td></tr>';
        }
    }

    ?>
</div>
</div>