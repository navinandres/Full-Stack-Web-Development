
<?php
 include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Surya Shopping Center - Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<style type="text/css">
  .background{
    background-image: url('images/1.jpg');
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
</head>
<body class="background">

<div class="container w-50 mt-2">
  <?php
     if (isset($_POST['signup'])) {
       $email = $_POST['mail'];
       $passer = $_POST['code'];
       $add = $_POST['info'];
       $telli = $_POST['call'];
       $use = $_POST['user'];

    $sql = "INSERT INTO user(name,password,email,address,phone) VALUES ('$use','$passer','$email','$add','$telli')";
    if (mysqli_query($conn,$sql)) {
      echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You Successfullly Registered.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
      ';
    }
    else{
      echo'
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
     }
    }
  ?>
  <?php

if(isset($_POST['signin'])){
    
    $uname = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM `user` WHERE email='".$uname."'AND password='".$password."' limit 1";
   // $sql1 = "UPDATE `user` SET `status`= 'Active' WHERE 1";
    //mysqli_query($con,$sql1);
    $result = mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        //$key = $row['class'];
         session_start();
        $_SESSION['email']=$uname;
         //$_SESSION['regioner']=$key;
      header("location: Contex/index.php" );
        exit();
    }
    else{
        echo'
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Incorrect!</strong> You entered credentials are wrong/mismatch better try new time.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    header("location: index.php");
        exit();
    }
        
}
?>
</div>

<div class="container  w-25" style="margin-top: 100px;border-radius: 10px;background-color: rgba(255,255,255, 0.3);box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
	<form class="p-3" action="" method="post" enctype="multipart/form-data">
    <h1>Login</h1>
    <label for="Email">Email:</label>
   <input type="email" name="username" class="form-control"  required>
   <label for="Password">Password:</label>
   <input type="password"  class="form-control" name="password" required> 
   <a href="" class="ml-5 text-muted"><p class="text-muted">Forget Password?</p></a>
   <div class="d-grid gap-2 mt-3">
  <button class="btn btn-primary" type="submit" name="signin">Sign in</button>
  <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Sign up</button>

</div>
  </form>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
        <form action="" method="post">
          <label for="username">Username:</label>
          <input type="text" name="user" class="form-control" placeholder="Enter Username" required>
          <label for="Email">Email:</label>
          <input type="email" name="mail" class="form-control" placeholder="Enter email" required>
          <label for="Password">Password:</label>
          <input type="password" name="code" class="form-control" placeholder="Enter password" required>
          <label for="phone">Phone:</label>
          <input type="tel" name="call" class="form-control" placeholder="Enter Phone" required>
          <label for="Address">Address:</label>
          <textarea class="form-control" name="info" placeholder="Type your Address.." required></textarea>
          <div class="d-grid gap-2 mt-3">
  <button class="btn btn-primary" type="submit" name="signup">Sign up</button>
</div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>