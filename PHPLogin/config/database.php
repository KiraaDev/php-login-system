<?php


class Database {

    private $host = 'localhost';
    private $user = 'nono';
    private $password = '';
    private $database = 'reusable';
    public $conn;

    public function __construct(){

        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

        if($this->conn->connect_error){
            die('Database connection failed');
        }

        return $this->conn;

    }

}