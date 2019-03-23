<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

class DB
{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "helloCpe";

    public function connect()
    {
        $conn = new mysqli(
            $this->servername, 
            $this->username, 
            $this->password, 
            $this->dbname
        );
        mysqli_set_charset($conn,"utf8");
        if ($conn->connect_error) {
            $error_connect["Connection failed"] = $conn->connect_error;
            die(json_encode($error_connect));
        }
        return $conn;
    }
}
