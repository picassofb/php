<?php

// Database constants

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','test');

class Database{

    public $connection;

    function __construct(){
        $this->open_db_connection();
    }

    public function open_db_connection(){
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        if($this->connection->connect_errno){
            die("Database connection failed!! " . $this->connection->connect_errno);
        }
    }

    public function query($sql){
        $result = mysqli_query($this->connection,$sql);
        return $result;
    }

}

$database = new Database();
