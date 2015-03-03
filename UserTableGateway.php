<?php
class UserTableGateway {
    
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    //Function To SELECT User By busID:
    public function getUserByUsername($username) {
        // execute a query to see if username is in the database
        $sqlQuery = 'SELECT * FROM usersforca WHERE username = "' . $username .'"';
        $statement = $this->connection->query($sqlQuery);
        if (!$statement) {
            die('Could not retrieve user details');
        }
        return $statement;
    }
    
    //Function To Insert New User:
    public function insertUser($username, $password, $fullname, $emailaddress) {
        $sqlInsert = "INSERT INTO usersforca(username, password, fullname, emailaddress) "
            . "VALUES (:username, :password, :fullname, :emailaddress)";

        $statement = $this->connection->prepare($sqlInsert);
        $params = array(
            "username" => $username,
            "password" => $password,
            "fullname" => $fullname,
            "emailaddress" => $emailaddress
        );
        $status = $statement->execute($params);

        if (!$status) {
            die('Could not store user details');
        }
    }
}
