<?php

class Repair{
    public $idRepair;
    public $description;
    public $idWorker;
    public $dateFrom;
    public $dateTo;
    public $idCar;

    public function __construct($idRepair=null,$description=null,$idWorker=null,$dateFrom=null,$dateTo=null,$idCar=null)
    {
        $this->idRepair = $idRepair;
        $this->description = $description;
        $this->idWorker = $idWorker;
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
        $this->idCar = $idCar;
    }

    //static function for loging
    public static function getRepairByIdWorker($idWorker1, mysqli $conn)
    {
        $query = "SELECT * FROM repair WHERE idWorker='$idWorker1'";
        
        return $conn->query($query);
    }

    public static function add(Repair $repair, mysqli $conn)
    {
       
        $query = "INSERT INTO repair(descr, idWorker, dateFrom, dateTo, idCar) VALUES('$repair->description','$repair->idWorker','$repair->dateFrom','$repair->dateTo','$repair->idCar')";
       
        return $conn->query($query);
    }

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM repair WHERE idRepair=$this->idRepair";
        return $conn->query($query);
    }

}