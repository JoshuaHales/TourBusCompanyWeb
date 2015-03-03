<?php
/* creating instances for the garage class */
class Garage {
    private $garageName;
    private $garageAddress;
    private $garagePhoneNo;
    private $managerName;
    private $garageID;
    
    /* A function open for access plus contructors */
    public function __construct($gn, $ga, $gpn, $mn, $gid) {
        $this->garageName = $gn;
        $this->garageAddress = $ga;
        $this->garagePhoneNo = $gpn;
        $this->managerName = $mn;
        $this->garageID = $gid;
    }
    
    /* function gets methods and returns them back to the private instances */
    public function getGarageName() { return $this->garageName; }
    public function getGarageAddress() { return $this->garageAddress; }
    public function getGaragePhoneNo() { return $this->garagePhoneNo; }
    public function getManagerName() { return $this->managerName; }
    public function getGarageID() { return $this->garageID; }
}