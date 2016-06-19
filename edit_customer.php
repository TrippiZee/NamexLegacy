<?php
include "header.php";
?>
<?php

$id = '';
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
    $post_id = $_POST['id'];

    $update_query  = "UPDATE customers SET ";
    $update_query .= "comp_name = '{$comp_name}', ";
    $update_query .= "address1 = '{$address1}', ";
    $update_query .= "address2 = '{$address2}', ";
    $update_query .= "city = '{$city}', ";
    $update_query .= "country = '{$country}', ";
    $update_query .= "codet = '{$codet}', ";
    $update_query .= "tel = '{$tel}', ";
    $update_query .= "codef = '{$codef}', ";
    $update_query .= "fax = '{$fax}', ";
    $update_query .= "vat = '{$vat}' ";
    $update_query .= "WHERE id = '{$post_id}' ";
    $update_query .= "LIMIT 1";
    $result = mysqli_query($connection,$update_query);
    if ($result && mysqli_affected_rows($connection) >= 0) {
        // Success
        redirect_to("customer.php?id=".$post_id);
    } else {
        die("Subject update failed.".mysqli_error($connection));

    }
}
if (isset($_GET['id'])){
    $id=$_GET['id'];

$edit = customer($id);

$edit_row = mysqli_fetch_array($edit);
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
        <h2>Update Relevant Fields:</h2>
</div>
</form>
<div id="table">

    <form action="#" method="post">
        <table id="table">
            <tr>
                <th>Company Name</th><th>Address</th><th>Address2</th><th>City</th><th>Country</th>
            </tr>
            <tr>
                <td><input type="text" name="name" value="<?php echo htmlentities($edit_row['comp_name']); ?>" /></td>
                <td><input type="text" name="address1" value="<?php echo htmlentities($edit_row['address1']); ?>" /></td>
                <td><input type="text" name="address2" value="<?php echo htmlentities($edit_row['address2']); ?>" /></td>
                <td><input type="text" name="city" value="<?php echo htmlentities($edit_row['city']); ?>" /></td>
                <td><input type="text" name="country" value="<?php echo htmlentities($edit_row['country']); ?>" /></td>
            </tr>
            <tr>
                <th>Tel Code</th><th>Tel</th><th>Fax Code</th><th>Fax</th><th>Vat No</th>
            </tr>
            <tr>
                <td><input type="text" name="codet" value="<?php echo htmlentities($edit_row['codet']); ?>" /></td>
                <td><input type="text" name="telno" value="<?php echo htmlentities($edit_row['tel']); ?>" /></td>
                <td><input type="text" name="codef" value="<?php echo htmlentities($edit_row['codef']); ?>" /></td>
                <td><input type="text" name="faxno" value="<?php echo htmlentities($edit_row['fax']); ?>" /></td>
                <td><input type="text" name="vat" value="<?php echo htmlentities($edit_row['vat']); ?>" /></td>
                <td><input type="hidden" name="id" value="<?php echo htmlentities($edit_row['id']); ?>" /></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit" /></td>
            </tr>
            <td><input Type="button" VALUE="Cancel" onClick="history.go(-1);return true;"></td>

        </table>

    </form>


</div>
</div>
