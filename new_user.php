<?php
include "header.php";
?>
<?php

if (isset($_POST['submit'])) {

    $user_name = strtoupper($_POST['username']);
    $password = strtoupper($_POST['password']);
    $name = strtoupper($_POST['name']);
    $surname = strtoupper($_POST['surname']);
    $role = strtoupper($_POST['role']);

    $safe_password = md5($password);


    $query  = "INSERT INTO users (";
    $query .= "  username, password, name, surname, role";
    $query .= ") VALUES (";
    $query .= "  '{$user_name}', '{$safe_password}', '{$name}', '{$surname}', '{$role}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Success
        redirect_to("user.php?id=".mysqli_insert_id($connection));
    } else {
        // Failure
        echo 'Failed';
        die("Subject update failed.".mysqli_error($connection));
    }
}

?>
<?php    $user_role = user_role();
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
        <h2>Enter New Information:</h2>
</div>
</form>
<div id="table">
    <form action="#" method="post">
        <table id="table">
            <tr>
                <th>Username</th><th>Password</th><th>Name</th><th>Surname</th><th>Role</th>
            </tr>
            <tr>
                <td><input type="text" name="username" value="" required="required"/></td>
                <td><input type="password" name="password" value="" required="required"/></td>
                <td><input type="text" name="name" value="" required="required"/></td>
                <td><input type="text" name="surname" value="" required="required"/></td>
                <td>
                    <?php echo '<select name="role" >';
                    while ($role_option = mysqli_fetch_array($user_role)) {
                        echo '<option value="'.$role_option['role'].'">'.$role_option['role'].'</option>';
                    }
                    echo '</select>';
                    echo '</td>' ?>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit" /></td>
            </tr>
            <td><input Type="button" VALUE="Cancel" onClick="history.go(-1);return true;"></td>

        </table>

    </form>
</div>
</div>