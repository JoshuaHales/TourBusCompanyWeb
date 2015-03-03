<?php
/* creating instances for the vehicle class */
class Vehicle {
    private $registration;
    private $make;
    private $model;
    private $seats;
    private $purchase;
    private $service;
    private $busID;
    private $garageID;
    
    /* A function open for access plus contructors */
    public function __construct($r, $mk, $ml, $s, $e, $p, $se, $id, $gid) {
        $this->registration = $r;
        $this->make = $mk;
        $this->model = $ml;
        $this->seats = $s;
        $this->engine = $e;
        $this->purchase = $p;
        $this->service = $se;
        $this->busID = $id;
        $this->garageID = $gid;
    }
    
    /* function gets methods and returns them back to the private instances */
    public function getRegistration() { return $this->registration; }
    public function getMake() { return $this->make; }
    public function getModel() { return $this->model; }
    public function getSeats() { return $this->seats; }
    public function getEngine() { return $this->engine; }
    public function getPurchase() { return $this->purchase; }
    public function getService() { return $this->service; }
    public function getBusID() { return $this->busID; }
    public function getGarageID() { return $this->garageID; }
}
