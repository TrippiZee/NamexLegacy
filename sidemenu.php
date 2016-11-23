<?php ?>
<div id="sidemenu">
<nav class="navbar">
            <ul class="nav navbar-nav">
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
