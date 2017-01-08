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
    $acc_no = $_POST['acc_no'];
    $codet = $_POST['codet'];
    $tel = $_POST['telno'];
    $codef = $_POST['codef'];
    $fax = $_POST['faxno'];
    $vat = $_POST['vat'];


    $query  = "INSERT INTO customers (";
    $query .= "  comp_name, acc_no, address1, address2, city, country, codet, tel, codef, fax, vat";
    $query .= ") VALUES (";
    $query .= "  '{$comp_name}', '{$acc_no}','{$address1}', '{$address2}', '{$city}', '{$country}', '{$codet}', '{$tel}', '{$codef}', '{$fax}', '{$vat}'";
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
<div id="wrapper">
<div id="searchbox">
    <form id="search" name="search">
        <h2>Enter New Information:</h2>
</div>
</form>
<div class="col-sm-12">
    <form action="#" method="post">

        <div class="form-group row">
            <label for="name" class="col-sm-1 col-form-label">Company Name</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <label for="acc_no" class="col-sm-1 col-form-label">Account Number</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="acc_no" name="acc_no">
            </div>
            <label for="address1" class="col-sm-1 col-form-label">Address1</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="address1" name="address1">
            </div>
            <label for="address2" class="col-sm-1 col-form-label">Address2</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="address2" name="address2">
            </div>
        </div>

        <div class="form-group row">
            <label for="city" class="col-sm-1 col-form-label">City</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <label for="country" class="col-sm-1 col-form-label">Country</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="country" name="country">
            </div>
            <label for="codet" class="col-sm-1 col-form-label">Tel Code</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="codet" name="codet">
            </div>
            <label for="telno" class="col-sm-1 col-form-label">Tel Number</label>
            <div class="col-sm-2">
                <input type="tel" class="form-control" id="telno" name="telno">
            </div>
        </div>

        <div class="form-group row">
            <label for="codef" class="col-sm-1 col-form-label">Fax Code</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="codef" name="codef">
            </div>
            <label for="faxno" class="col-sm-1 col-form-label">Fax Number</label>
            <div class="col-sm-2">
                <input type="tel" class="form-control" id="faxno" name="faxno">
            </div>
            <label for="vat" class="col-sm-1 col-form-label">VAT number</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="vat" name="vat">
            </div>
        </div>

        <div class="form-group row">
            <input type="submit" name="submit" value="Submit" />
            <input Type="button" VALUE="Cancel" onClick="history.go(-1);return true;">

        </div>

<!--        <table class="table dataTable default">-->
<!--            <tr><th>Company Name</th><th>Account Number</th><th>Address1</th><th>Address2</th><th>City</th><th>Country</th>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td><input type="text" name="name" value="" required="required" /></td>-->
<!--                <td><input type="text" name="acc_no" value="0" required="required" /></td>-->
<!--                <td><input type="text" name="address1" value="" required="required" /></td>-->
<!--                <td><input type="text" name="address2" value="" /></td>-->
<!--                <td><input type="text" name="city" value="" /></td>-->
<!--                <td><input type="text" name="country" value="" /></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <th>Tel Code</th><th>Tel Number</th><th>Fax Code</th><th>Fax Number</th><th>Vat No</th>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td><input type="text" name="codet" value="" /></td>-->
<!--                <td><input type="tel" name="telno"  value="000-0000" required="required" /></td>-->
<!--                <td><input type="text" name="codef" value="" /></td>-->
<!--                <td><input type="tel" name="faxno"  value="000-0000" /></td>-->
<!--                <td><input type="text" name="vat" value="" /></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td><input type="submit" name="submit" value="Submit" /></td>-->
<!--            </tr>-->
<!--            <td><input Type="button" VALUE="Cancel" onClick="history.go(-1);return true;"></td>-->
<!---->
<!--        </table>-->

    </form>

</div>
    </div>