<?php

if(isset($_POST["add"])){
  function validateInput($input){
    $input=trim($input);
    $input=stripslashes($input);
    $input=htmlspecialchars($input);
    return $input ;
  }
  $error='';
  if(empty($_POST['username'])){
    $error= "username is requierd";
  }elseif(empty($_POST["password"])){
    $error="password is requierd";
  }elseif(empty($_POST['email'])){
    $error= "email is requierd";

  }elseif(empty($_POST['gender'])) {
    $error= " gender is requierd";
  }else{
   require "db.php";
   
   $username=validateInput($_POST["username"]);
   $passwprd=validateInput($_POST["password"]);
   $email=validateInput($_POST["email"]);
   $gender=validateInput($_POST["gender"]);
   $insert="insert into `users` (`username`,`password`,`email`,`gender`)
    values('$username','$passwprd','$email','$gender')";
    $query=mysqli_query($connection,$insert);
    if($query){
      header("location: show.php");
    }else{
      $error="error in inserting data " ;
    }
  }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>CRUD</title>
</head>
<body>
<div class="container col-md-6 my-5">
<?php  if (!empty($error)): ?>
  <div class="alert alert-danger">
    <?php  echo $error; ?>
    </div>
  <?php endif; ?>
  
<form class=" border p-5" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
  <div class="mb-3 ">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username">
     </div>
     <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
     </div>
     <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email">
     </div>

  <div class="mb-3 ">
    <label class="form-check-label">Your Gender</label>
  </div>
  <div class="mb-3">
   
    <input type="radio" name="gender" value="female">
    <label >Female</label>
  </div>
  <div class="mb-3">
  <input type="radio" name="gender" value="male">
    <label >Male</label>
    
  </div>
  <button type="submit" name="add" class="btn btn-primary">Add User</button>

</form>
  

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>