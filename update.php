<?php 
require "db.php";

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}
	$id = validate($_GET['id']);
    $select="select * from `users` where `id`='$id' ";
    $query=mysqli_query($connection,$select);
    if(mysqli_num_rows($query)>0){
        $row=mysqli_fetch_assoc($query);
    }else {
        header("location: show.php");
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
<?php  if (isset($_GET['error'])): ?>
  <div class="alert alert-danger">
    <?php  echo  $_GET['error']; ?>
    </div>
  <?php endif; ?>
  
<form class=" border p-5" method="POST" action="edit.php">
  <div class="mb-3 ">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username" value="<?= $row['username']?>">
     </div>
     <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password" value="<?= $row['password']?>">
     </div>
     <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email"  value="<?= $row['email']?>">
     </div>

  <div class="mb-3 ">
    <label class="form-check-label">Your Gender</label>
  </div>
  <div class="mb-3">
   
    <input type="radio" name="gender" value="female"  <?php if($row['gender']=='female'): ?> checked <?php endif; ?>>
    <label >Female</label>
  </div>
  <div class="mb-3">
  <input type="radio" name="gender" value="male" <?php if($row['gender']=='male'): ?> checked <?php endif; ?>>
    <label >Male</label>
    
  </div>
  <div class="mb-3">
    
    <input type="hidden" class="form-control" name="id"  value="<?= $row['id']?>">
     </div>
  <button type="submit" name="update" class="btn btn-primary">Update</button>
  <a href="show.php" class="link-primary">View</a>

</form>
  

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>