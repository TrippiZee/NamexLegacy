<?php
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

function logged_in() {
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
        return true;
    }else {
        return false;
    }
}

function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
}

function getuserfield($field) {
    global $connection;
    $query = "SELECT {$field} FROM users WHERE id ='". $_SESSION['user_id']."'" ;
    if ($query_run = mysqli_query($connection,$query)){
        $result = $query_run->fetch_assoc()[$field];
        return $result;
    } else {
    }
    }

function confirm_query($result_set) {
    if (!$result_set) {
        die("Database query failed.");
    }
}

function manifest ($id){
    global $connection;

    $query = 'SELECT * ';
    $query .= 'FROM manifest ';
    $query .= "WHERE id = {$id}";
    $manifest_result = mysqli_query($connection,$query);
    confirm_query($manifest_result);
    return $manifest_result;
}

function get_manifest_no ($id){
    global $connection;

    $query = 'SELECT manifest_no ';
    $query .= 'FROM manifest ';
    $query .= "WHERE id = {$id}";
    $manifest_no_result = mysqli_query($connection,$query);
    confirm_query($manifest_no_result);
    return $manifest_no_result;
}

function getAllManifest($pdo){
    $statement = $pdo->prepare('SELECT * FROM manifest');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS,'Manifest');
}

function manifest_All (){
    global $connection;

    $query = 'SELECT * ';
    $query .= 'FROM manifest ';
    $query .= 'ORDER BY date DESC ';
    $manifest_details_result = mysqli_query($connection,$query);
    confirm_query($manifest_details_result);
    return $manifest_details_result;
}

function manifest_details ($id){
    global $connection;

    $query = 'SELECT * ';
    $query .= 'FROM manifest_details ';
    $query .= "WHERE id = {$id}";
    $manifest_details_result = mysqli_query($connection,$query);
    confirm_query($manifest_details_result);
    return $manifest_details_result;
}

function getAllWaybills($pdo){
    $statement = $pdo->prepare('SELECT * FROM manifest_details');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS,'Waybills');
}

function waybill_all (){
    global $connection;

    $query = 'SELECT * ';
    $query .= 'FROM manifest_details ';
    $manifest_details_result = mysqli_query($connection,$query);
    confirm_query($manifest_details_result);
    return $manifest_details_result;
}

function getAllCustomers($pdo){
    $statement = $pdo->prepare('SELECT * FROM customers');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS,'Customers');
}

function customer ($id){
    global $connection;

    $query = 'SELECT * ';
    $query .= 'FROM customers ';
    $query .= "WHERE id = {$id}";
    $customer_result = mysqli_query($connection,$query);
    confirm_query($customer_result);
    return $customer_result;
}

function customer_full (){
    global $connection;

    $query = 'SELECT * ';
    $query .= 'FROM customers ';
    $query .= 'ORDER BY comp_name ';
    $customer_result = mysqli_query($connection,$query);
    confirm_query($customer_result);
    return $customer_result;
}

function pod ($id){
    global $connection;

    $query = 'SELECT * ';
    $query .= 'FROM pod ';
    $query .= "WHERE id = {$id}";
    $pod_result = mysqli_query($connection,$query);
    confirm_query($pod_result);
    return $pod_result;
}

function getAllPod($pdo){
    $statement = $pdo->prepare('SELECT * FROM pod');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS,'Pod');
}


function pod_All (){
    global $connection;

    $query = 'SELECT * ';
    $query .= 'FROM pod ';
    $query .= 'ORDER BY date ';
    $pod_result = mysqli_query($connection,$query);
    confirm_query($pod_result);
    return $pod_result;
}

function user ($id){
    global $connection;

    $query = 'SELECT * ';
    $query .= 'FROM users ';
    $query .= "WHERE id = {$id}";
    $user_result = mysqli_query($connection,$query);
    confirm_query($user_result);
    return $user_result;
}

function getAllUsers($pdo){
    $statement = $pdo->prepare('SELECT * FROM users');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS,'User');
}

function user_All (){
    global $connection;

    $query = 'SELECT * ';
    $query .= 'FROM users ';
    $query .= 'ORDER BY name';
    $user_result = mysqli_query($connection,$query);
    confirm_query($user_result);
    return $user_result;
}

function customer_search ($search_term){
    global $connection;

    $query = "SELECT * FROM customers WHERE comp_name LIKE '$search_term%'";
    $customer_result = mysqli_query($connection,$query);
    confirm_query($customer_result);
    return $customer_result;
}

function waybill_search ($search_term){
    global $connection;

    $query = "SELECT * FROM manifest_details WHERE waybill_no LIKE '$search_term%'";
    $waybill_result = mysqli_query($connection,$query);
    confirm_query($waybill_result);
    return $waybill_result;
}

function manifest_search ($search_term){
    global $connection;

    $query = "SELECT * FROM manifest WHERE manifest_no LIKE '$search_term%'";
    $manifest_result = mysqli_query($connection,$query);
    confirm_query($manifest_result);
    return $manifest_result;
}

function pod_search ($search_term){
    global $connection;

    $query = "SELECT * FROM pod WHERE pod_no LIKE '$search_term%'";
    $pod_result = mysqli_query($connection,$query);
    confirm_query($pod_result);
    return $pod_result;
}

function user_search ($search_term){
    global $connection;

    $query = "SELECT * FROM users WHERE username LIKE '$search_term%'";
    $user_result = mysqli_query($connection,$query);
    confirm_query($user_result);
    return $user_result;
}
 function user_role() {
     global $connection;

     $query = "SELECT * FROM users_role ORDER BY role";
     $role_result = mysqli_query($connection,$query);
     confirm_query($role_result);
     return $role_result;
 }

function services() {
    global $connection;

    $query = "SELECT * FROM services ORDER BY type";
    $role_result = mysqli_query($connection,$query);
    confirm_query($role_result);
    return $role_result;
}

function quantity($id) {
    global $connection;

    $query = "SELECT SUM(qty) FROM manifest_details WHERE manifest_no = {$id}";
    $qty_result = mysqli_query($connection,$query);
    confirm_query($qty_result);
    return $qty_result;
}

function weight($id) {
    global $connection;

    $query = "SELECT SUM(weight) FROM manifest_details WHERE manifest_no = {$id}";
    $weight_result = mysqli_query($connection,$query);
    confirm_query($weight_result);
    return $weight_result;
}

function overnight($id) {
    global $connection;

    $query = "SELECT SUM(weight) FROM manifest_details WHERE manifest_no = {$id} AND type = 'EXP'";
    $overnight_result = mysqli_query($connection,$query);
    confirm_query($overnight_result);
    return $overnight_result;
}

function budget($id) {
    global $connection;

    $query = "SELECT SUM(weight) FROM manifest_details WHERE manifest_no = {$id} AND type = 'BDG'";
    $budget_result = mysqli_query($connection,$query);
    confirm_query($budget_result);
    return $budget_result;
}

function consol($id) {
    global $connection;

    $query = "SELECT SUM(weight) FROM manifest_details WHERE manifest_no = {$id} AND type = 'CON'";
    $consol_result = mysqli_query($connection,$query);
    confirm_query($consol_result);
    return $consol_result;
}

function economy($id) {
    global $connection;

    $query = "SELECT SUM(weight) FROM manifest_details WHERE manifest_no = {$id} AND type = 'ECO'";
    $economy_result = mysqli_query($connection,$query);
    confirm_query($economy_result);
    return $economy_result;
}


?>