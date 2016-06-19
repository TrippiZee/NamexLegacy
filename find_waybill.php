<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/core.php"); ?>


<?php
if (isset($_GET['q'])) {
    $search_waybill = $_GET['q'];
}
if (!empty($search_waybill)) {
    $result = waybill_search($search_waybill);
    echo '<ul id="result">';
    while ($waybill = mysqli_fetch_assoc($result)) {
        echo $selected = '<a href="waybill.php?id='.$waybill['id'].'">'. '<li>'.$waybill['waybill_no'].'</li>';
    }
    echo '</ul>';
}
else {
    echo '<h1>'.'Please type waybill number'.'</h1>';
}
?>