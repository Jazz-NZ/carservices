<?php
/* Attempt MySQL server connection.*/
$connection = new mysqli("localhost", "admin", "admin", "carservices");
 
// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

?>