<?php

require "dbBroker.php";
require "model/repair.php";

session_start();
if (!isset($_SESSION['idWorker'])) {
    header('Location: login.php');
    exit();
}

$id = $_SESSION['idWorker'];

$podaci = Repair::getRepairByIdWorker($id,$connection);
if (!$podaci) {
    echo "Error on getting repair's data!";
    die();
}
if ($podaci->num_rows == 0) {
    echo "Worker does not have any repairs!";
    die();
} else {

?>

<html>
<head>
<link href="styles/headers.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="scripts/homeScript.js"></script>
</head>
<body>


<main>

<div class="container">
    <header class="d-flex justify-content-center py-3">
      <ul class="nav nav-pills">
        <li class="nav-item"><button type="button" class="btn btn-primary">Home</button></li>
        <li class="nav-item"><button type="button" class="btn btn-light" data-mdb-ripple-color="dark" data-toggle="modal" data-target="#myModal" onclick="openForm()">Add</button></li>
        <li class="nav-item"><button type="button" class="btn btn-light" data-mdb-ripple-color="dark" onclick="deleteRow()">Delete</button></li>
        <li class="nav-item"><button type="button" class="btn btn-light" data-mdb-ripple-color="dark">Search</button></li>
      </ul>
    </header>
  

    <div id = "myForm" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeForm()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container addrepair-form">
                        <form action="#" method="post" id="addForm">
                            <h3 style="color: black; text-align: center">Add Repair</h3>
                            <div class="row">
                                <div class="col-md-11 ">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <input type="text" style="border: 1px solid black" name="descripton" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Car ID</label>
                                        <input type="text" style="border: 1px solid black" name="idCar" class="form-control" />
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Date From</label>
                                            <input type="date" style="border: 1px solid black" name="dateFrom" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Date To</label>
                                            <input type="date" style="border: 1px solid black" name="dateTo" class="form-control" />
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" onclick="onSubmit()">Save changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeForm()">Close</button>
                                      </div>
                                </div>
                            </div>
                           
                        </form>
                    </div>
      </div>
      
    </div>
  </div>
</div>
</main>

  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Repair ID</th>
      <th scope="col">Description</th>
      <th scope="col">Car ID</th>
      <th scope="col">Date FROM</th>
      <th scope="col">Date TO</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
                    <?php
                    while ($red = $podaci->fetch_array()) :
                    ?>
                        <tr>
                            <td><?php echo $red["idRepair"] ?></td>
                            <td><?php echo $red["descr"] ?></td>
                            <td><?php echo $red["idCar"] ?></td>
                            <td><?php echo $red["dateFrom"] ?></td>
                            <td><?php echo $red["dateTo"] ?></td>
                            <td>
                                <label class="custom-radio-btn">
                                    <input type="radio" name="checked-donut" value=<?php echo $red["idRepair"] ?>>
                                    <span class="checkmark"></span>
                                </label>
                            </td>

                    
                        </tr>
                <?php
                    endwhile;
                } #zatvaranje elsa otvorenog na liniji 21
                ?>

                </tbody>

</table>

</body>
</html>