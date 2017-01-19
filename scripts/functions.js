$(document).ready(function() {
    $(".customers").dataTable({
        "processing": true,
        "serverSide":true,
        "ajax":{
            url:"includes/controllers/customers.php",
            type:"post"
        }
    });
    $(".manifests").dataTable({
        "processing": true,
        "serverSide":true,
        "ajax":{
            url:"../controllers/manifests.php",
            type:"post"
        }
    });
    $(".waybills").dataTable({
        "processing": true,
        "serverSide":true,
        "ajax":{
            url:"../controllers/waybills.php",
            type:"post"
        }
    });
    $(".pods").dataTable({
        "processing": true,
        "serverSide":true,
        "ajax":{
            url:"../controllers/pods.php",
            type:"post"
        }
    });
    $(".date").datepicker({
        dateFormat:"yy-mm-dd"
    });
    $(".time").timepicker();

});