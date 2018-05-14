<?php
/**
 * Created by PhpStorm.
 * User: putuguna
 * Date: 7/18/2016
 * Time: 8:06 AM
 */

class ConnectionDB {
    function getConnection(){
        $host = "localhost";
        $username = "root";
        $password = "";

        try{
            $conn = new PDO("mysql:host=$host;dbname=proyek", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch (PDOException $e){
            echo "ERROR : " .$e->getMessage();
        }
    }
}