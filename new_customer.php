<?php
include "header.php";
?>
<?php

if (isset($_POST['submit'])) {

    $comp_name = strtoupper($_POST['name']);
    $address1 = strtoupper($_POST['address1']);
    $address2 = strtoupper($_POST['address2']);
    $city = strtoupper($_POST['city']);
    $country = strtoupper($_POST['country']);
    $codet = $_POST['codet'];
    $tel = $_POST['telno'];
    $codef = $_POST['codef'];
    $fax = $_POST['faxno'];
    $vat = $_POST['vat'];


    $query  = "INSERT INTO customers (";
    $query .= "  comp_name, address1, address2, city, country, codet, tel, codef, fax, vat";
    $query .= ") VALUES (";
    $query .= "  '{$comp_name}', '{$address1}', '{$address2}', '{$city}', '{$country}', '{$codet}', '{$tel}', '{$codef}', '{$fax}', '{$vat}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Success
        redirect_to("customer.php?id=".mysqli_insert_id($connection));
    } else {
        // Failure
        echo 'Failed';
        die("Subject update failed.".mysqli_error($connection));

    }

}

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
        <h2>Enter New Information:</h2>
</div>
</form>
<div id="table">
    <form action="#" method="post">
        <table id="table">
            <tr><th>Company Name</th><th>Address1</th><th>Address2</th><th>City</th><th>Country</th>
            </tr>
            <tr>
                <td><input type="text" name="name" value="" required="required" /></td>
                <td><input type="text" name="address1" value="" required="required" /></td>
                <td><input type="text" name="address2" value="" /></td>
                <td><input type="text" name="city" value="" /></td>
                <td><input type="text" name="country" value="" /></td>
            </tr>
            <tr>
                <th>Tel Code</th><th>Tel Number</th><th>Fax Code</th><th>Fax Number</th><th>Vat No</th>
            </tr>
            <tr>
                <td><input type="text" name="codet" value="" /></td>
                <td><input type="tel" name="telno"  value="000-0000" required="required" /></td>
                <td><input type="text" name="codef" value="" /></td>
                <td><input type="tel" name="faxno"  value="000-0000" /></td>
                <td><input type="text" name="vat" value="" /></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit" /></td>
            </tr>
            <td><input Type="button" VALUE="Cancel" onClick="history.go(-1);return true;"></td>

        </table>

    </form>

</div>
    </div>