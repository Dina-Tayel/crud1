<?php
require "db.php";
$select="select * from `users` ";
$query=mysqli_query($connection,$select);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>SHOW DATA</title>
</head>
<body>

<div class="container">
  <button class="btn btn-primary my-5">
    <a class="text-light text-decoration-none" href="index.php">Add New user</a>
  </button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">username</th>
      <th scope="col">password</th>
      <th scope="col">email</th>
      <th scope="col">gender</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php  if( mysqli_num_rows($query) >0) :?>
       <?php while($row=mysqli_fetch_assoc($query)): ?>
        <tr>
            <td><?= $row['id']?></td>
            <td><?= $row['username']?></td>
            <td><?= $row['password']?></td>
            <td><?= $row['email']?></td>
            <td><?= $row['gender']?></td>
            <td>
                <button class="btn btn-primary">
                    <a class="text-light text-decoration-none" href="update.php?id=<?= $row['id'] ?>">Update</a>
                </button>
            </td>
            <td>
                <button class="btn btn-danger">
                    <a class="text-light text-decoration-none" href="delete.php?id=<?= $row['id'] ?>">Delete</a>
                </button>
            </td>

        </tr>
        <?php endwhile ; ?>
        <?php else: ?>
            <td colspan="6">No Data</td>
    <?php endif ; ?>
  </tbody>
</table>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>