<?php

class DbService{
    public function connection(){
        $usename = "root";
        $password = "";
        $serverName = "localhost";
        $dbName = "auth";
        try {
            $conn = new PDO("mysql:host=$serverName;dbname=$dbName",$usename,$password);
            return $conn;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return null;
        }
    }
}