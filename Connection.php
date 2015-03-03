<?php
//Connection Code To Connect Table To Database:
class Connection {
    private static $connection = NULL;
    
    public static function getInstance() {
        if (Connection::$connection === NULL) {
            $host = 'daneel'; 
            $database = 'N00133834'; 
            $username = 'N00133834'; 
            $password = 'N00133834'; 
            $dsn = 'mysql:dbname='.$database.";host=".$host;

            Connection::$connection = new PDO($dsn, $username, $password);
            if (!Connection::$connection) {
                die("Could not connect to database!");
            }
        }
        
        return Connection::$connection;
    }
}
