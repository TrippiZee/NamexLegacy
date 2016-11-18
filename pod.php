<?php
include "header.php";
?>
<div id="wrapper">
    <div id="searchbox">
        <form id="search" name="search">
            <h2>All POD:</h2>
    </div>
    <div>

        <?php

        $id = '';
        if (isset($_GET['id'])){
            $id=$_GET['id'];

            $query_result = pod($id);
            $pod = mysqli_fetch_array($query_result);

            echo '<h2>Details:</h2>';
            echo '<table class="table dataTable default">';
            echo "<tr><th>POD Number</th><th>Date</th><th>Shipper</th><th>Consignee</th><th>Qty</th><th>Weight</th><th>Type</th><th>Remarks</th><th>Delivery Date</th><th>Signed By</th><th>Time</th></tr>";
            echo '<tr><td>'. $pod['pod_no']. '</td>';
            echo '<td>'.$pod['date'].'</td>';
            echo '<td>'.$pod['shipper'].'</td>';
            echo '<td>'.$pod['consignee'].'</td>';
            echo '<td>'.$pod['qty'].'</td>';
            echo '<td>'.$pod['weight'].'</td>';
            echo '<td>'.$pod['type'].'</td>';
            echo '<td>'.$pod['remarks'].'</td>';
            echo '<td>'.$pod['delivery_date'].'</td>';
            echo '<td>'.$pod['signed_by'].'</td>';
            echo '<td>'.$pod['time'].'</td></tr>';
            echo '<tr><td class="edit"><a href="edit_pod.php?id='.$pod['id'].'"><input type="button" value="Edit"/></a></td>';
            if (getuserfield('role') == 'admin'){
                echo '<td class="edit"><a href="del_pod.php?id='.$pod['id'].'" onclick="return confirm(\'Really Delete?\');"><input type="button" value="Delete"/></a></td>';}
            echo "</tr>";
            echo "</table>";
        }
        else {
            $pods = getAllPod($pdo);
            echo '<table class="table table-striped dataTable default">
                    <thead>
                    <tr><th>POD Number</th><th>Date</th><th>Shipper</th><th>Consignee</th></tr>
                    </thead>
                    <tbody>';
            foreach($pods as $pod) {
                echo '<tr><td class="edit"><a href="pod.php?id='.$pod->id.'">' . $pod->pod_no . '</a></td>';
                echo '<td>'.$pod->date.'</td>';
                echo '<td>'.$pod->shipper.'</td>';
                echo '<td>'.$pod->consignee.'</td></tr>';
            }
            echo '</tbody></table>';
        }
        ?>
    </div>
</div>
<?php
include "footer.php";
?>
