<?php  

// connection to database using PDO
class Database {

    private $hostname = "localhost";
    private $database = "store";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";

    function connect(){

        try {

            $connection = "mysql:host=".$this->hostname.";dbname=".$this->database.";charset=".$this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $pdo = new PDO($connection, $this->username, $this->password, $options);

            return $pdo;

        } catch (PDOException $e) {

            echo 'Connection error: ' . $e->getMessage();
            exit;

        }

    }
    
}


?>