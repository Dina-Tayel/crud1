<?php
  require 'db.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
  
    $delete= "delete from `users` where `id`='$id'";
    $query=mysqli_query($connection,$delete);
    if($query){
        header("location: show.php");
    }
}