<?php

namespace App\Models;

use PDO;

class DB
{
        private static $connection;

        public  function __construct(){
            if(empty(self::$connection)){
                self::$connection = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST."", DB_USER, DB_PASS);
            }
    }

        public static function select($sql, $params = []){

            $stmt = self::$connection->prepare($sql);
            if ( !empty($params) ) {
                foreach ($params as $key => $value) {
                    $stmt->bindValue(":$key", $value);
                }
            }
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

        public static function insert($sql, $params = []){
            $stmt = self::$connection->prepare($sql);
            $result = $stmt->execute($params);
            return $result;

        }

        public static function update($sql, $params = []){

            $stmt = self::$connection->prepare($sql);
            $result = $stmt->execute($params);
            return $result;

        }

        public static function delete($sql, $params = []){
            $stmt = self::$connection->preapre($sql);
            $result = $stmt->excute($params);
            return $result;
        }
}