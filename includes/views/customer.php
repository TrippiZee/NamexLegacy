<?php
include "layout/header.php";
?>
<div class="col-sm-11 main">
    <div class="row">
        <div class="col-sm-3">
            <br>
            <button data-toggle="modal" data-target="#addCustomer" class="btn btn-success col-xs-12 btn-narrow">Add New Customer</button>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-12">
        <?php

        if (isset($_POST['add'])) {

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

        if (isset($_POST['edit'])) {

            $comp_name = strtoupper($_POST['name']);
            $address1 = strtoupper($_POST['address1']);
            $address2 = strtoupper($_POST['address2']);
            $city = strtoupper($_POST['city']);
            $country = strtoupper($_POST['country']);
            $accno = $_POST['acc_no'];
            $codet = $_POST['codet'];
            $tel = $_POST['telno'];
            $codef = $_POST['codef'];
            $fax = $_POST['faxno'];
            $vat = $_POST['vat'];
            $post_id = $_POST['id'];

            $update_query  = "UPDATE customers SET ";
            $update_query .= "comp_name = '{$comp_name}', ";
            $update_query .= "acc_no = '{$accno}', ";
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
//                redirect_to("customer.php");
            } else {
                die("Subject update failed.".mysqli_error($connection));

            }
        }


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
//            echo '<tr><td class="edit"><a href="edit_customer.php?id='.$customer['id'].'"><input type="button" value="Edit"/></a></td>';
            echo '<tr><td class="edit"><button data-toggle="modal" data-target="#editCustomer" class="btn btn-success col-xs-12 btn-narrow">Edit Customer</button></td>';
            if (getuserfield('role') == 'admin'){
                echo '<td class="edit"><a href="../../del_customer.php?id=' .$customer['id'].'" onclick="return confirm(\'Really Delete?\');"><button class="btn btn-success col-xs-12 btn-narrow">Delete</button></a></td>';}
            echo "</tr>";
            echo '</table>';

        }
        else {
            echo '<h2>All Customers:</h2>';
            echo '<table class="table table-striped dataTable customers">
                    <thead>
                    <tr><th>Name</th><th>Account Number</th><th>Address</th><th>City</th><th>Country</th></tr>
                    </thead></table>';
        }
        ?>

            <div id="addCustomer" class="modal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add New Customer</h4>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="post">

                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Company Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <label for="acc_no" class="col-sm-2 col-form-label">Account Number</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="acc_no" name="acc_no">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address1" class="col-sm-2 col-form-label">Address1</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="address1" name="address1">
                                    </div>
                                    <label for="address2" class="col-sm-2 col-form-label">Address2</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="address2" name="address2">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="city" class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="city" name="city">
                                    </div>
                                    <label for="country" class="col-sm-2 col-form-label">Country</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="country" name="country">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="codet" class="col-sm-2 col-form-label">Tel Code</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="codet" name="codet">
                                    </div>
                                    <label for="telno" class="col-sm-2 col-form-label">Tel Number</label>
                                    <div class="col-sm-4">
                                        <input type="tel" class="form-control" id="telno" name="telno">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="codef" class="col-sm-2 col-form-label">Fax Code</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="codef" name="codef">
                                    </div>
                                    <label for="faxno" class="col-sm-2 col-form-label">Fax Number</label>
                                    <div class="col-sm-4">
                                        <input type="tel" class="form-control" id="faxno" name="faxno">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="vat" class="col-sm-2 col-form-label">VAT number</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="vat" name="vat">
                                    </div>
                                </div>
                        </div>

                        <div class="modal-footer">
                            <div class="form-group row">
                                <input type="submit" name="add" value="Add" />
                                <input Type="button" VALUE="Cancel" data-dismiss="modal">

                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>

            <div id="editCustomer" class="modal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add New Customer</h4>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="post">

                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Company Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlentities($customer['comp_name'])?>">
                                    </div>
                                    <label for="acc_no" class="col-sm-2 col-form-label">Account Number</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="acc_no" name="acc_no" value="<?php echo htmlentities($customer['acc_no'])?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address1" class="col-sm-2 col-form-label">Address1</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="address1" name="address1" value="<?php echo htmlentities($customer['address1'])?>">
                                    </div>
                                    <label for="address2" class="col-sm-2 col-form-label">Address2</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="address2" name="address2" value="<?php echo htmlentities($customer['address2'])?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="city" class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlentities($customer['city'])?>">
                                    </div>
                                    <label for="country" class="col-sm-2 col-form-label">Country</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="country" name="country" value="<?php echo htmlentities($customer['country'])?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="codet" class="col-sm-2 col-form-label">Tel Code</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="codet" name="codet" value="<?php echo htmlentities($customer['codet'])?>">
                                    </div>
                                    <label for="telno" class="col-sm-2 col-form-label">Tel Number</label>
                                    <div class="col-sm-4">
                                        <input type="tel" class="form-control" id="telno" name="telno" value="<?php echo htmlentities($customer['tel'])?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="codef" class="col-sm-2 col-form-label">Fax Code</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="codef" name="codef" value="<?php echo htmlentities($customer['codef'])?>">
                                    </div>
                                    <label for="faxno" class="col-sm-2 col-form-label">Fax Number</label>
                                    <div class="col-sm-4">
                                        <input type="tel" class="form-control" id="faxno" name="faxno" value="<?php echo htmlentities($customer['fax'])?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="vat" class="col-sm-2 col-form-label">VAT number</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="vat" name="vat" value="<?php echo htmlentities($customer['vat'])?>">
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo htmlentities($customer['id'])?>">
                                    </div>
                                </div>
                        </div>

                        <div class="modal-footer">
                            <div class="form-group row">
                                <input type="submit" name="edit" value="Edit" />
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
include "layout/footer.php";
?>
