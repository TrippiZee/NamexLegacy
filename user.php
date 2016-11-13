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
    <form id="search" name="search">
        <h2>Search for a User by Name:</h2>
        <input type="text" name="search" autocomplete="off" onkeyup="search_user(this.value)">
        <div id='result'></div>

</div>
</form>
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
        while($AllUser = mysqli_fetch_assoc($query_result)) {
            echo "<table>";
            echo "<tr><th>Username</th><th>Password</th><th>Name</th><th>Surname</th><th>Role</th></tr>";
            echo '<tr><td class="edit"><a href="user.php?id='.$AllUser['id'].'">'. $AllUser['username']. '</a></td>';
            echo '<td>'.$AllUser['password'].'</td>';
            echo '<td>'.$AllUser['name'].'</td>';
            echo '<td>'.$AllUser['surname'].'</td>';
            echo '<td>'.$AllUser['role'].'</td></tr>';
        }
    }
    ?>

</div>
</div>

