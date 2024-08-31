<?php 
class Database {
    public $connection; 

    public function __construct($config) {
        try {

            $dsn = "mysql:" . http_build_query($config, '', ';');
            
            $this->connection = new PDO($dsn, 'root', '', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]); 
        } catch (Exception $e) {
            echo $e; 
        }
    }
    public function query($query, $params) {

        try {
            
            $statement = $this->connection->prepare($query);  
            $statement->execute($params); 
            
            return $statement; 
        } catch(Exception $e) {
            echo $e; 
        }
    }
}

