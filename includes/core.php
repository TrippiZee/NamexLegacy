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

//function getAllManifest($pdo,$columns,$request,$searchTerm){
//    $statement = $pdo->prepare('SELECT * FROM manifest WHERE 1 AND ( date LIKE "'.$searchTerm.'%" OR manifest_no LIKE "'.$searchTerm.'%" OR driver LIKE "'.$searchTerm.'%" OR co_driver LIKE "'.$searchTerm.'%" OR reg_no LIKE "'.$searchTerm.'%" ) ORDER BY '.$columns[$request['order'][0]['column']].' '.$request['order'][0]['dir'].' LIMIT '.$request['start'].' ,'.$request['length'].' ');
//
//    $statement->execute();
//
//    $filter = $pdo->prepare('SELECT * FROM manifest WHERE 1 AND ( date LIKE "'.$searchTerm.'%" OR manifest_no LIKE "'.$searchTerm.'%" OR driver LIKE "'.$searchTerm.'%" OR co_driver LIKE "'.$searchTerm.'%" OR reg_no LIKE "'.$searchTerm.'%" )');
//
//    $filter->execute();
//
//    return array($statement->fetchAll(PDO::FETCH_CLASS,'Manifest'),$filter->rowCount());
//}

function manifest_details ($id){
    global $connection;

    $query = 'SELECT * ';
    $query .= 'FROM manifest_details ';
    $query .= "WHERE id = {$id}";
    $manifest_details_result = mysqli_query($connection,$query);
    confirm_query($manifest_details_result);
    return $manifest_details_result;
}

//function getAllWaybills($pdo,$columns,$request,$searchTerm){
//    $statement = $pdo->prepare('SELECT * FROM manifest_details WHERE 1 AND ( waybill_no LIKE "'.$searchTerm.'%" OR date LIKE "'.$searchTerm.'%" OR manifest_no LIKE "'.$searchTerm.'%" OR shipper LIKE "'.$searchTerm.'%" OR consignee LIKE "'.$searchTerm.'%" ) ORDER BY '.$columns[$request['order'][0]['column']].' '.$request['order'][0]['dir'].' LIMIT '.$request['start'].' ,'.$request['length'].' ');
//
//    $statement->execute();
//
//    $filter = $pdo->prepare('SELECT * FROM manifest_details WHERE 1 AND ( waybill_no LIKE "'.$searchTerm.'%" OR date LIKE "'.$searchTerm.'%" OR manifest_no LIKE "'.$searchTerm.'%" OR shipper LIKE "'.$searchTerm.'%" OR consignee LIKE "'.$searchTerm.'%" )');
//
//    $filter->execute();
//
//    return array($statement->fetchAll(PDO::FETCH_CLASS,'Waybills'),$filter->rowCount());
//}

//function getAllCustomers($pdo,$columns,$request,$searchTerm){
//    $statement = $pdo->prepare('SELECT * FROM customers WHERE 1 AND ( comp_name LIKE "'.$searchTerm.'%" OR acc_no LIKE "'.$searchTerm.'%" OR address1 LIKE "'.$searchTerm.'%" OR city LIKE "'.$searchTerm.'%" OR country LIKE "'.$searchTerm.'%" ) ORDER BY '.$columns[$request['order'][0]['column']].' '.$request['order'][0]['dir'].' LIMIT '.$request['start'].' ,'.$request['length'].' ');
//
//    $statement->execute();
//
//    $filter = $pdo->prepare('SELECT * FROM customers WHERE 1 AND ( comp_name LIKE "'.$searchTerm.'%" OR acc_no LIKE "'.$searchTerm.'%" OR address1 LIKE "'.$searchTerm.'%" OR city LIKE "'.$searchTerm.'%" OR country LIKE "'.$searchTerm.'%" )');
//
//    $filter->execute();
//
//    return array($statement->fetchAll(PDO::FETCH_CLASS,'Customers'),$filter->rowCount());
//}

function customer ($id){
    global $connection;

    $query = 'SELECT * ';
    $query .= 'FROM customers ';
    $query .= "WHERE id = {$id}";
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

//function getAllPod($pdo,$columns,$request,$searchTerm){
//    $statement = $pdo->prepare('SELECT * FROM pod WHERE 1 AND ( pod_no LIKE "'.$searchTerm.'%" OR date LIKE "'.$searchTerm.'%" OR shipper LIKE "'.$searchTerm.'%" OR consignee LIKE "'.$searchTerm.'%" ) ORDER BY '.$columns[$request['order'][0]['column']].' '.$request['order'][0]['dir'].' LIMIT '.$request['start'].' ,'.$request['length'].' ');
//
//    $statement->execute();
//
//    $filter = $pdo->prepare('SELECT * FROM pod WHERE 1 AND ( pod_no LIKE "'.$searchTerm.'%" OR date LIKE "'.$searchTerm.'%" OR shipper LIKE "'.$searchTerm.'%" OR consignee LIKE "'.$searchTerm.'%" )');
//
//    $filter->execute();
//
//    return array($statement->fetchAll(PDO::FETCH_CLASS),$filter->rowCount());
//}

//function getAllUsersAjax($pdo,$columns,$request,$searchTerm){
//    $statement = $pdo->prepare('SELECT * FROM users WHERE 1 AND ( username LIKE "'.$searchTerm.'%" OR name LIKE "'.$searchTerm.'%" OR surname LIKE "'.$searchTerm.'%" OR role LIKE "'.$searchTerm.'%" ) ORDER BY '.$columns[$request['order'][0]['column']].' '.$request['order'][0]['dir'].' LIMIT '.$request['start'].' ,'.$request['length'].' ');
//
//    $statement->execute();
//
//    $filter = $pdo->prepare('SELECT * FROM users WHERE 1 AND ( username LIKE "'.$searchTerm.'%" OR name LIKE "'.$searchTerm.'%" OR surname LIKE "'.$searchTerm.'%" OR role LIKE "'.$searchTerm.'%" )');
//
//    $filter->execute();
//
//    return array($statement->fetchAll(PDO::FETCH_CLASS,'User'),$filter->rowCount());
//}

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

// function user_role($pdo) {
//     $statement = $pdo->prepare('SELECT * FROM users_role ORDER BY role');
//     $statement->execute();
//     return $statement->fetchAll(PDO::FETCH_CLASS);
// }

//function getServices($pdo) {
//    $statement = $pdo->prepare('SELECT * FROM services ORDER BY type');
//    $statement->execute();
//    return $statement->fetchAll(PDO::FETCH_CLASS);
//}
//function services() {
//    global $connection;
//
//    $query = "SELECT * FROM services ORDER BY type";
//    $role_result = mysqli_query($connection,$query);
//    confirm_query($role_result);
//    return $role_result;
//}

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