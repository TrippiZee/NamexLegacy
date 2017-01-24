<?php

class Connection{
    public static function connect($config){

        try{
//            return new PDO(
//                'mysql:host=127.0.0.1;dbname=namibmhz_app',
//                'root',
//                ''
//            );

            return new PDO(
                'mysql:host='.$config['connection'].';dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
}