<?php
include "header.php";
?>
<div id="wrapper">
    <div id="searchbox">
        <h2>All Customers:</h2>
    </div>
    <div>
        <?php

        $id = '';
        if (isset($_GET['id'])){
            $id=$_GET['id'];

            $query_result = customer($id);
            $customer = mysqli_fetch_array($query_result);

            echo '<h2>Details:</h2>';
            echo '<table class="table dataTable default">';
            echo "<tr><th>Name</th><th>Account Number</th><th>Address1</th><th>Address2</th><th>City</th><th>Country</th><th>Tel Code</th><th>Tel No</th><th>Fax Code</th><th>Fax No</th><th>Vat No</th></tr>";
            echo '<tr><td>'. $customer['comp_name']. '</td>';
            echo '<td>'.$customer['acc_no'].'</td>';
            echo '<td>'.$customer['address1'].'</td>';
            echo '<td>'.$customer['address2'].'</td>';
            echo '<td>'.$customer['city'].'</td>';
            echo '<td>'.$customer['country'].'</td>';
            echo '<td>'.$customer['codet'].'</td>';
            echo '<td>'.$customer['tel'].'</td>';
            echo '<td>'.$customer['codef'].'</td>';
            echo '<td>'.$customer['fax'].'</td>';
            echo '<td>'.$customer['vat'].'</td>';
            echo '</tr>';
            echo '<tr><td class="edit"><a href="edit_customer.php?id='.$customer['id'].'"><input type="button" value="Edit"/></a></td>';
            if (getuserfield('role') == 'admin'){
                echo '<td class="edit"><a href="del_customer.php?id='.$customer['id'].'" onclick="return confirm(\'Really Delete?\');"><input type="button" value="Delete"/></a></td>';}
            echo "</tr>";
            echo '</table>';

        }
        else {
            echo '<table class="table table-striped dataTable customers">
                    <thead>
                    <tr><th>Name</th><th>Account Number</th><th>Address</th><th>City</th><th>Country</th></tr>
                    </thead></table>';
        }
        ?>
    </div>
</div>
<?php
include "footer.php";
?>

