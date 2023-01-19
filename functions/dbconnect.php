<?php
$connection = mysqli_connect("localhost","root","","project2");

if(!$connection){
    DIE("Kan geen verbinding maken met database omdat: " . mysqli_error($connectie));
}
?>