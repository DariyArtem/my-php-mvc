<?php

namespace App\Models;

use PDO;

class DB
{


        public static function connect(){
            static $connection = null;
            if(empty($connection)){
                $connection = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST."", DB_USER, DB_PASS);
            }
            return $connection;
        }

        public static function select($sql, $data = []){
            $db = DB::connect();
            // to do
            $result = $db->prepare($sql);
            $result->execute($data);
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public static function selectAll($sql,  $data = []){
            $db = DB::connect();
            $result = $db->prepare($sql);
            $result->execute($data);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function delete($sql, $data = []){
            $db = DB::connect();
            $query = $db->prepare($sql);
            $query->execute($data);
            return true;

        }

        public static function update($sql, $data = []){
            $db = DB::connect();
            $result = $db->prepare($sql);
            $result->execute($data);
            return true;
        }

        public static function insert($sql, $data = array()){
            $db = DB::connect();
            $result = $db->prepare($sql);
            $result->execute($data);
            return true;
        }


}