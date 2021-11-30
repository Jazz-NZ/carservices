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
</head>
<body>


<main>
<div class="container">
    <header class="d-flex justify-content-center py-3">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Active</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Search</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Delete</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Alter</a></li>
      </ul>
    </header>
  </div>
</main>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Repair ID</th>
      <th scope="col">description</th>
    </tr>
  </thead>
  <tbody>
                    <?php
                    while ($red = $podaci->fetch_array()) :
                    ?>
                        <tr>
                            <td><?php echo $red["idRepair"] ?></td>
                            <td><?php echo $red["description"] ?></td>
                    
                        </tr>
                <?php
                    endwhile;
                } #zatvaranje elsa otvorenog na liniji 21
                ?>

                </tbody>

</table>
</body>
</html>