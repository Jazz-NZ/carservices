<?php
    
    require "../dbBroker.php";
    require "../model/repair.php";

session_start();

if(isset($_POST['descripton']) && isset($_POST['idCar']) 
&& isset($_POST['dateFrom']) && isset($_POST['dateTo'])){
    //$prijava = new Prijava(null,$_POST['predmet'],$_POST['katedra'],$_POST['sala'],$_POST['datum'] );
    $repair = new Repair(null,$_POST['descripton'],$_SESSION['idWorker'],$_POST['dateFrom'],$_POST['dateTo'],$_POST['idCar']);
    $status = Repair::add($repair, $connection);

    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }

}




?>