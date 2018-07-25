<?php
/**
 * Created by PhpStorm.
 * User: pashutaz
 * Date: 23/07/2018
 * Time: 23:24
 */
class Database
{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function connect(){
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = 'root';
        $this->dbname = 'testAPI';

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}