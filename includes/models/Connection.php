<?php

class Connection{
    public static function connect(){

        try{
            return new PDO('mysql:host=127.0.0.1;dbname=namibmhz_app','root','');
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
}