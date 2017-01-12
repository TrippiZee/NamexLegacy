<?php ?>

<!-- ----------------------------Customer------------------------------------------- -->
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

<!---------------------------------------------------------Waybill------------------------------------------------------------>

<div id="createPOD" class="modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create POD</h4>
            </div>
            <div class="modal-body">
                <form action="#" method="post">

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">POD Number</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="number" value="<?php echo htmlentities($waybill['waybill_no'])?>">
                        </div>
                        <label for="date" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="date" value="<?php echo htmlentities($waybill['date'])?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="shipper" class="col-sm-2 col-form-label">Shipper</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="shipper" value="<?php echo htmlentities($waybill['shipper'])?>">
                        </div>
                        <label for="consignee" class="col-sm-2 col-form-label">Consignee</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="consignee" value="<?php echo htmlentities($waybill['consignee'])?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="qty" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="qty" value="<?php echo htmlentities($waybill['qty'])?>">
                        </div>
                        <label for="weight" class="col-sm-2 col-form-label">Weight</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="weight" value="<?php echo htmlentities($waybill['weight'])?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="type" value="<?php echo htmlentities($waybill['type'])?>">
                        </div>
                        <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="remarks" value="<?php echo htmlentities($waybill['remarks'])?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deldate" class="col-sm-2 col-form-label">Delivery Date</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control date" name="deldate" value="">
                        </div>
                        <label for="signed" class="col-sm-2 col-form-label">Signed</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="signed" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="time" class="col-sm-2 col-form-label">Time</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control time" name="time" value="">
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <div class="form-group row">
                    <input type="submit" name="createPOD" value="Create POD" />
                    <input Type="button" VALUE="Cancel" data-dismiss="modal">

                </div>
            </div>
            </form>

        </div>
    </div>
</div>
