<?php
$connection=mysqli_connect("localhost","root","","dinacrud");
if(!$connection){
    die("Error In Dtabase Connection ! ". mysqli_connect_error($connection));
}


?>