<?php

class GarageTableGateway {
    
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    public function getGarages() {
        // Execute A Query To Get All Garages:
        $sqlQuery = "SELECT * FROM garages";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve users");
        }
        
        return $statement;
    }
    
    public function getGaragesById($garageID) {
        // Execute A Query To Get The User With The Specified garageID:
        $sqlQuery = "SELECT * FROM garages WHERE garageID = :garageID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "garageID" => $garageID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve user");
        }
        
        return $statement;
    }
    
    //Code to Insert A New Garage:
    public function insertGarages($gn, $ga, $gpn, $mn) {
        $sqlQuery = "INSERT INTO garages " .
                "(garageName, garageAddress, garagePhoneNo, managerName) " .
                "VALUES (:garageName, :garageAddress, :garagePhoneNo, :managerName)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "garageName" => $gn,
            "garageAddress" => $ga,
            "garagePhoneNo" => $gpn,
            "managerName" => $mn
        );
                
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert garage");
        }
        
        $id = $this->connection->lastInsertId();
        // need to add in event id 
        return $id;
    }
    
    //Code To Delete An Existing Garage:
    public function deleteGarages ($garageID) {
        $sqlQuery = "DELETE FROM garages WHERE garageID = :garageID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "garageID" => $garageID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete user");
        }

        return ($statement->rowCount() == 1);
    }
    
    //Code To Update An Existing Garage:
    public function updateGarages($gid, $gn, $ga, $gpn, $mn) {
        $sqlQuery =
                "UPDATE garages SET " .
                "garageName = :garageName, " .
                "garageAddress = :garageAddress, " .
                "garagePhoneNo = :garagePhoneNo, " .
                "managerName = :managerName " .
                " WHERE garageID = :garageID"; 
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "garageID" => $gid,
            "garageName" => $gn,
            "garageAddress" => $ga,
            "garagePhoneNo" => $gpn,
            "managerName" => $mn
        );
        
        /*echo '<pre>';
        print_r($params);
        echo '</pre>';*/
        
        $status = $statement->execute($params);
        
        if (!$status) {
             die("Could not update garage");
        }
        return ($statement->rowCount() == 1);
    }
}
