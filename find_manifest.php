<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/core.php"); ?>


<?php
if (isset($_GET['q'])) {
    $search_manifest = $_GET['q'];
}
if (!empty($search_manifest)) {
    $result = manifest_search($search_manifest);
    echo '<ul id="result">';
    while ($manifest = mysqli_fetch_assoc($result)) {
        echo $selected = '<a href="manifest.php?id='.$manifest['id'].'">'. '<li>'.$manifest['manifest_no'].'</li>';
    }
    echo '</ul>';
}
else {
    echo '<h1>'.'Please type manifest number'.'</h1>';
}
?>