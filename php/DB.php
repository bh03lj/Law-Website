<?php

class DB{

    public function connect()
    {
        $host = "127.0.0.1";
        $db = "law";
        $uid = "root";
        $pwd = "";

        try {

            $conn = new PDO("mysql:host=$host;dbname=$db", $uid, $pwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;

        } catch (PDOException $e) {

            die("Connection failed: " . $e->getMessage());

        }

    }
}