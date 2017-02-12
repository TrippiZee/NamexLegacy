<?php
//use Includes\App;
//$pdo = App::get('pdo');

function view($name,$data = []){
    extract($data);

    return require "../includes/views/{$name}.view.php";
}
