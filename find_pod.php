<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/core.php"); ?>


<?php
if (isset($_GET['q'])) {
    $search_pod = $_GET['q'];
}
if (!empty($search_pod)) {
    $result = pod_search($search_pod);
    echo '<ul id="result">';
    while ($pod = mysqli_fetch_assoc($result)) {
        echo $selected = '<a href="pod.php?id='.$pod['id'].'">'. '<li>'.$pod['pod_no'].'</li>';
    }
    echo '</ul>';
}
else {
    echo '<h1>'.'Please type pod number'.'</h1>';
}
?>