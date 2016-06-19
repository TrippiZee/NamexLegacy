<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/core.php"); ?>


<?php
if (isset($_GET['q'])) {
    $search_user = $_GET['q'];
}
if (!empty($search_user)) {
    $result = user_search($search_user);
    echo '<ul id="result">';
    while ($user = mysqli_fetch_assoc($result)) {
        echo $selected = '<a href="user.php?id='.$user['id'].'">'. '<li>'.$user['username'].'</li>';
    }
    echo '</ul>';
}
else {
    echo '<h1>'.'Please type pod number'.'</h1>';
}
?>