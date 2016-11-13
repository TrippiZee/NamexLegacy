<?php
include "header.php";
?>
<div id="sidemenu">
    <ul>
        <li><a href="user.php">Search</a> </li>
        <li><a href="new_user.php">Add New</a></li>
        <li><a href="#">View All</a></li>

    </ul>
</div>
<div id="wrapper">
    <div id="searchbox">
            <h2>All Users:</h2>
    </div>
    <div id="table">

        <?php

        $id = '';
        if (isset($_GET['id'])){
            $id=$_GET['id'];

            $query_result = user($id);
            $user = mysqli_fetch_array($query_result);

            echo '<h2>Details:</h2>';
            echo "<table id=\"table\">";
            echo "<tr><th>Username</th><th>Password</th><th>Name</th><th>Surname</th><th>Role</th></tr>";
            echo '<tr><td>'. $user['username']. '</td>';
            echo '<td>'.$user['password'].'</td>';
            echo '<td>'.$user['name'].'</td>';
            echo '<td>'.$user['surname'].'</td>';
            echo '<td>'.$user['role'].'</td></tr>';
            echo '<tr><td class="edit"><a href="edit_user.php?id='.$user['id'].'"><input type="button" value="Edit"/></a></td></tr>';
                echo '<tr><td class="edit"><a href="del_user.php?id='.$user['id'].'" onclick="return confirm(\'Really Delete?\');"><input type="button" value="Delete"/></a></td>';
            echo "</tr>";
            echo "</table>";
        }
        else {
            $query_result = user_All();
            $table = '<table class="table table-striped dataTable default">
                      <thead><tr><th>Username</th><th>Password</th><th>Name</th><th>Surname</th><th>Role</th></tr>
                      </thead>
                      <tbody>';
            while($AllUser = mysqli_fetch_assoc($query_result)) {
                $table .= '<tr><td class="edit"><a href="user.php?id='.$AllUser['id'].'">'. $AllUser['username']. '</a></td>
                            <td>'.$AllUser['password'].'</td>
                            <td>'.$AllUser['name'].'</td>
                            <td>'.$AllUser['surname'].'</td>
                            <td>'.$AllUser['role'].'</td></tr>';
            }
            $table.= '</tbody></table>';
            echo $table;
        }
        ?>

    </div>
</div>
<?php
include "footer.php";
?>


