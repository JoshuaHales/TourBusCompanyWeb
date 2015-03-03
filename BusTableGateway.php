<?php

class BusTableGateway {
    
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    public function getBuses() {
        // Execute A Query To Get All Buses:
        $sqlQuery = "SELECT * FROM buses";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve users");
        }
        
        return $statement;
    }
    
    public function getbusesById($busID) {
        // Execute A Query To Get The User With The Specified busID:
        $sqlQuery = "SELECT * FROM buses WHERE busID = :busID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "busID" => $busID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve user");
        }
        
        return $statement;
    }
    
    //Code to Insert A New Bus:
    public function insertBuses($rn, $bmk, $bml, $bs, $bes, $pd, $dsd, $gid) {
        $sqlQuery = "INSERT INTO buses " .
                "(registrationNo, busMake, busModel, busSeats, busEngineSize, purchaseDate, dueServiceDate, garageID) " .
                "VALUES (:registrationNo, :busMake, :busModel, :busSeats, :busEngineSize, :purchaseDate, :dueServiceDate, :garageID)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "registrationNo" => $rn,
            "busMake" => $bmk,
            "busModel" => $bml,
            "busSeats" => $bs,
            "busEngineSize" => $bes,
            "purchaseDate" => $pd,
            "dueServiceDate" => $dsd,
            "garageID" => $gid
        );
                
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert bus");
        }
        
        $id = $this->connection->lastInsertId();
        // need to add in event id 
        return $id;
    }
    
    //Code To Delete An Existing Bus:
    public function deleteBus ($busID) {
        $sqlQuery = "DELETE FROM buses WHERE busID = :busID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "busID" => $busID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete user");
        }

        return ($statement->rowCount() == 1);
    }
    
    //Code To Update An Existing Bus:
    public function updateBus($bid, $rn, $bmk, $bml, $bs, $bes, $pd, $dsd, $gid) {
        $sqlQuery =
                "UPDATE buses SET " .
                "registrationNo = :registrationNo, " .
                "busMake = :busMake, " .
                "busModel = :busModel, " .
                "busSeats = :busSeats, " .
                "busEngineSize = :busEngineSize, " .
                "purchaseDate = :purchaseDate, " .
                "dueServiceDate = :dueServiceDate, " .
                "garageID = :garageID " .
                " WHERE busID = :busID"; 
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "busID" => $bid,
            "registrationNo" => $rn,
            "busMake" => $bmk,
            "busModel" => $bml,
            "busSeats" => $bs,
            "busEngineSize" => $bes,
            "purchaseDate" => $pd,
            "dueServiceDate" => $dsd,
            "garageID" => $gid
        );
        
        //Code to help debug the code
        /*echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';*/
        
        $status = $statement->execute($params);
        
        if (!$status) {
             die("Could not update bus");
        }
        return ($statement->rowCount() == 1);
    }
}

