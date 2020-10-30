<?php
  session_start();

   if(isset($_POST['login'])){

     if($_POST['user'] == 'guest' && $_POST['password'] == 'p4ssword'){
       $_SESSION['valid'] = true;
       $_SESSION['success'] = "login successful";
       header("Location: reg.php");
     } else {
       $_SESSION['success'] = "Try again";
       header("Location: login.php");
     }
   }
?>
<!DOCTYPE html>
<html>
  <head>
     <title>PHP & Cassandra</title>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
    <h1>PHP & Cassandra</h1>

    <?php

       if(isset($_SESSION['success'])){
          echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
       }

    ?>
    <a href="index.php" class="btn btn-primary">Back</a>

    <form method="POST">
       <div class="form-group">
          <strong>User:</strong>
          <input type="text" name="user" required="" class="form-control" placeholder="User">
       </div>
       <div class="form-group">
          <strong>Password:</strong>
          <input type="text" name="password" required="" class="form-control" placeholder="Password">
       </div>
       <div class="form-group">
          <button type="submit" name="login" class="btn btn-success">Login</button>
       </div>
    </form>
    </div>

  </body>
</html>
