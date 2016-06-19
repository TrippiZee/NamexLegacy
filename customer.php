<?php
include "header.php";
?>
<div id="sidemenu">
    <ul>
        <li><a href="customer.php">Search</a> </li>
        <li><a href="new_customer.php">Add New</a></li>
        <li><a href="#">View All</a></li>

    </ul>
</div>
<div id="wrapper">
    <div id="searchbox">
        <form id="search" name="search">
            <h2>Search for a Company by Name:</h2>
            <input type="text" name="search" autocomplete="off" onkeyup="search_customer(this.value)">
            <div id='result'></div>
            <!--<div id="add_new"><a href="new_customer.php"><h2>Add New Company</h2></a> </div>-->
    </div>
    </form>
    <div id="table">

        <?php

        $id = '';
        if (isset($_GET['id'])){
            $id=$_GET['id'];

            $query_result = customer($id);
            $customer = mysqli_fetch_array($query_result);

            echo '<h2>Details:</h2>';
            echo "<table id=\"table\">";
            echo "<tr><th>Name</th><th>Address1</th><th>Address2</th><th>City</th><th>Country</th></tr>";
            echo '<tr><td>'. $customer['comp_name']. '</td>';
            echo '<td>'.$customer['address1'].'</td>';
            echo '<td>'.$customer['address2'].'</td>';
            echo '<td>'.$customer['city'].'</td>';
            echo '<td>'.$customer['country'].'</td></tr>';
            echo "<tr><th>Tel Code</th><th>Tel No</th><th>Fax Code</th><th>Fax No</th><th>Vat No</th></tr>";
            echo '<tr><td>'.$customer['codet'].'</td>';
            echo '<td>'.$customer['tel'].'</td>';
            echo '<td>'.$customer['codef'].'</td>';
            echo '<td>'.$customer['fax'].'</td>';
            echo '<td>'.$customer['vat'].'</td>';
            echo '</tr>';
            echo '<tr><td class="edit"><a href="edit_customer.php?id='.$customer['id'].'"><input type="button" value="Edit"/></a></td></tr>';
            if (getuserfield('role') == 'admin'){
                echo '<tr><td class="edit"><a href="del_customer.php?id='.$customer['id'].'" onclick="return confirm(\'Really Delete?\');"><input type="button" value="Delete"/></a></td>';}
            echo "</tr>";
            echo "</table>";
        }

        ?>


    </div>
</div>

