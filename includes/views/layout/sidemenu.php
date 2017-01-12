<?php ?>
<div class="row">
<div id="sidemenu" class="col-sm-1">
<nav class="navbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="dashboard.php">Home</a> </li>
                <li><a href="customer.php">Customer</a> </li>
                <li><a href="manifest.php">Manifest</a></li>
                <li><a href="waybill.php">Waybill</a></li>
                <li><a href="pod.php">POD</a></li>
                <li><a href="tracking.php">Tracking</a></li>
                <?php
                if (getuserfield('role') == 'admin'){
                    echo '<li><a href="reports.php">Reports</a></li>';
                    echo '<li><a href="costing.php">Costing</a></li>';
                    echo '<li><a href="user.php">User</a></li>';
                }
                ?>
</ul>
</nav>
</div>
<!--</div>-->
