<?php
class Database{

private $host = 'localhost';
private $user = 'root';
private $password = "";
private $database = "tfphpavanzado"; 

    public function getConnection(){ 
    $conn = new mysqli($this->host, $this->user, $this->password, $this->database);

        if($conn->connect_error){
        die("Error, falló la conección a la base de datos MySQL: " . $conn->connect_error);
        } else {
        return $conn;
        }
    }
}
?>