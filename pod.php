<?php
include "header.php";
?>
<div id="sidemenu">
    <ul>
        <li><a href="pod.php">Search</a> </li>
        <li><a href="waybill.php">Add New</a></li>
        <li><a href="#">View All</a></li>

    </ul>
</div>
<div id="wrapper">
<div id="searchbox">
    <form id="search" name="search">
        <h2>Search for a POD by Number:</h2>
        <input type="text" name="search" autocomplete="off" onkeyup="search_pod(this.value)">
        <div id='result'></div>

</div>
</form>
<div id="table">

    <?php

    $id = '';
    if (isset($_GET['id'])){
        $id=$_GET['id'];

        $query_result = pod($id);
        $pod = mysqli_fetch_array($query_result);

        echo '<h2>Details:</h2>';
        echo "<table id=\"table\">";
        echo "<tr><th>POD Number</th><th>Date</th><th>Shipper</th><th>Consignee</th><th>Qty</th><th>Weight</th></tr>";
        echo '<tr><td>'. $pod['pod_no']. '</td>';
        echo '<td>'.$pod['date'].'</td>';
        echo '<td>'.$pod['shipper'].'</td>';
        echo '<td>'.$pod['consignee'].'</td>';
        echo '<td>'.$pod['qty'].'</td>';
        echo '<td>'.$pod['weight'].'</td></tr>';
        echo "<tr><th>Type</th><th>Remarks</th><th>Delivery Date</th><th>Signed By</th><th>Time</th></tr>";
        echo '<tr><td>'.$pod['type'].'</td>';
        echo '<td>'.$pod['remarks'].'</td>';
        echo '<td>'.$pod['delivery_date'].'</td>';
        echo '<td>'.$pod['signed_by'].'</td>';
        echo '<td>'.$pod['time'].'</td></tr>';
        echo '<tr><td class="edit"><a href="edit_pod.php?id='.$pod['id'].'"><input type="button" value="Edit"/></a></td></tr>';
        if (getuserfield('role') == 'admin'){
            echo '<tr><td class="edit"><a href="del_pod.php?id='.$pod['id'].'" onclick="return confirm(\'Really Delete?\');"><input type="button" value="Delete"/></a></td>';}
        echo "</tr>";
        echo "</table>";
    }
    else {
        $query_result = pod_All();
        while($AllPod = mysqli_fetch_assoc($query_result)) {
            echo "<table>";
            echo "<tr><th>POD Number</th><th>Date</th><th>Shipper</th><th>Consignee</th></tr>";
            echo '<tr><td class="edit"><a href="pod.php?id='.$AllPod['id'].'">'. $AllPod['pod_no']. '</a></td>';
            echo '<td>'.$AllPod['date'].'</td>';
            echo '<td>'.$AllPod['shipper'].'</td>';
            echo '<td>'.$AllPod['consignee'].'</td>';
        }
    }
    ?>

</div>
</div>
