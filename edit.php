<?php
   include "db.php";
   if(isset($_POST['update'])){
     function validateInput($input){
        $input=trim($input);
        $input=stripslashes($input);
        $input=htmlspecialchars($input);
        return $input ;
      }
      $id=validateInput($_POST["id"]);
      $username=validateInput($_POST["username"]);
      $passwprd=validateInput($_POST["password"]);
      $email=validateInput($_POST["email"]);
      $gender=validateInput($_POST["gender"]);
      if(empty($_POST['username'])){
       header("location:update.php?id=$id&error=username is requierd");
      }elseif(empty($_POST["password"])){
        header("location:update.php?id=$id&error=password is requierd");
      }elseif(empty($_POST['email'])){
        header("location:update.php?id=$id&error=email is requierd");
    
      }elseif(empty($_POST['gender'])) {
        header("location:update.php?error=gender is requierd");
      }else{
       
      
       $update="update `users` set `username`='$username' , `password`='$passwprd' ,
       `email`='$email',`gender`='$gender' where `id`= '$id' ";
        $query=mysqli_query($connection,$update);
        if($query){
          header("location: show.php");
        }

      }

    }
    


?>