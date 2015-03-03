<?php

class GarageTableGateway {
    
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    public function getGarage() {
        // Execute A Query To Get All Garages:
        $sqlQuery = "SELECT * FROM garage";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve users");
        }
        
        return $statement;
    }
    
    public function getGarageById($garageID) {
        // Execute A Query To Get The User With The Specified garageID:
        $sqlQuery = "SELECT * FROM garage WHERE garageID = :garageID";
        
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
    public function insertGarage($gn, $ga, $gpn, $mn) {
        $sqlQuery = "INSERT INTO garage " .
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
    public function deleteGarage ($garageID) {
        $sqlQuery = "DELETE FROM garage WHERE garageID = :garageID";

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
    public function updateGarage($gid, $gn, $ga, $gpn, $mn) {
        $sqlQuery =
                "UPDATE garage SET " .
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
