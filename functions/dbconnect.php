<?php
$conn = mysqli_connect("localhost","root","root","project2");

if(!$conn){
    DIE("Kan geen verbinding maken met database omdat: " . mysqli_error($connectie));
}
?>