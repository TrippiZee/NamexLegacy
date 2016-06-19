<?php
include "header.php";
?>
<?php

$id = '';
if (isset($_POST['submit'])) {

    $user_name = strtoupper($_POST['username']);
    $password = $_POST['password'];
    $name = strtoupper($_POST['name']);
    $surname = strtoupper($_POST['surname']);
    $role = strtoupper($_POST['role']);
    $post_id = $_POST['id'];
    $safe_password = md5($password);


    $update_query  = "UPDATE users SET ";
    $update_query .= "username = '{$user_name}', ";
    $update_query .= "password = '{$safe_password}', ";
    $update_query .= "name = '{$name}', ";
    $update_query .= "surname = '{$surname}', ";
    $update_query .= "role = '{$role}' ";
    $update_query .= "WHERE id = '{$post_id}' ";
    $update_query .= "LIMIT 1";
    $result = mysqli_query($connection,$update_query);
    if ($result && mysqli_affected_rows($connection) >= 0) {
        // Success
        redirect_to("user.php?id=".$post_id);
    } else {
        die("Subject update failed.".mysqli_error($connection));

    }
}
if (isset($_GET['id'])){
    $id=$_GET['id'];

    $query = user($id);
    $user = mysqli_fetch_array($query);
    $user_role = user_role();
}
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
        <h2>Update Relevant Fields:</h2>
</div>
</form>
<div id="table">

    <form action="#" method="post">
        <table id="table">
            <tr>
                <th>Username</th><th>Password</th><th>Name</th><th>Surname</th><th>Role</th>
            </tr>
            <tr>
                <td><input type="text" name="username" value="<?php echo htmlentities($user['username']); ?>" /></td>
                <td><input type="password" name="password" value="<?php echo htmlentities($user['password']); ?>" /></td>
                <td><input type="text" name="name" value="<?php echo htmlentities($user['name']); ?>" /></td>
                <td><input type="text" name="surname" value="<?php echo htmlentities($user['surname']); ?>" /></td>
                                <td>
                                    <?php echo '<select name="role" >';
                                    while ($role_option = mysqli_fetch_array($user_role)) {
                                        echo '<option value="'.$role_option['role'].'">'.$role_option['role'].'</option>';
                                    }
                                    echo '</select>';
                                echo '</td>' ?>
                <td><input type="hidden" name="id" value="<?php echo htmlentities($user['id']); ?>" /></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit" /></td>
            </tr>
            <tr>
            <td><input Type="button" VALUE="Cancel" onClick="history.go(-1);return true;"></td>
            </tr>

        </table>

    </form>


</div>
</div>
