<?php
class BusTableGateway {
    private $connection;
    public function __construct($c) {
        $this->connection = $c;
    }
    
    // Get Buses Code:
    public function getBuses($sortOrder, $filterRegistrationNo) {
        // Execute A Query To Get All Buses:
        $sqlQuery = "SELECT b.*, g.garageName FROM buses b
                     LEFT JOIN garages g ON g.garageID = b.garageID " .
                     (($filterRegistrationNo == NULL) ? "" : "WHERE b.registrationNo LIKE :filterRegistrationNo") .
                     " ORDER BY " . $sortOrder;

        $statement = $this->connection->prepare($sqlQuery);
        if ($filterRegistrationNo != NULL) {          
            $params = array(
                "filterRegistrationNo" => "%" . $filterRegistrationNo . "%"
            );
            $status = $statement->execute($params);  
        }
        else {
            $status = $statement->execute();
        }
        if (!$status) {
            die("Could not retrieve users");
        }
        
        return $statement;
    }
    
    // Get BusesbyGarageID:
    public function getBusesByGarageID($garageID) {
        // Execute A Query To Get All Buses:
        $sqlQuery = "SELECT b.*, g.garageName FROM buses b
                     LEFT JOIN garages g ON g.garageID = b.garageID
                     WHERE b.garageID = :garageID";
        
        $params = array(
            'garageID' => $garageID
        );
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve Buses");
        }
        
        return $statement;
    }
    
    // Get BusesById:
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
        
        $status = $statement->execute($params);
        
        if (!$status) {
             die("Could not update bus");
        }
        return ($statement->rowCount() == 1);
    }
}

