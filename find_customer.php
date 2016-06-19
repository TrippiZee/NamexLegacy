<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/core.php"); ?>


<?php
if (isset($_GET['q'])) {
    $search_customer = $_GET['q'];
}
if (!empty($search_customer)) {
    $result = customer_search($search_customer);
    echo '<ul id="result">';
    while ($customer = mysqli_fetch_assoc($result)) {
        echo $selected = '<a href="customer.php?id='.$customer['id'].'">'. '<li>'.$customer['comp_name'].'</li>';
    }
    echo '</ul>';
}
else {
    echo '<h1>'.'Please type customer name'.'</h1>';
}
?>