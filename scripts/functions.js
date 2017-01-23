$(document).ready(function() {
    $(".customers").dataTable({
        "processing": true,
        "serverSide":true,
        "ajax":{
            url:"inc/controllers/customers.php",
            type:"post"
        }
    });
    $(".manifests").dataTable({
        "processing": true,
        "serverSide":true,
        "ajax":{
            url:"inc/controllers/manifests.php",
            type:"post"
        }
    });
    $(".waybills").dataTable({
        "processing": true,
        "serverSide":true,
        "ajax":{
            url:"inc/controllers/waybills.php",
            type:"post"
        }
    });
    $(".pods").dataTable({
        "processing": true,
        "serverSide":true,
        "ajax":{
            url:"inc/controllers/pods.php",
            type:"post"
        }
    });
    $(".date").datepicker({
        dateFormat:"yy-mm-dd"
    });
    $(".time").timepicker();

});