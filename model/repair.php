<?php

class Repair{
    public $idRepair;
    public $description;
    public $idWorker;

    public function __construct($idRepair=null,$description=null,$idWorker=null)
    {
        $this->idRepair = $idRepair;
        $this->description = $description;
        $this->idWorker = $idWorker;
    }

    //static function for loging
    public static function getRepairByIdWorker($idWorker1, mysqli $conn)
    {
        $query = "SELECT * FROM repair WHERE idWorker='$idWorker1'";
        
        return $conn->query($query);
    }
}