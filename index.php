<?php
  session_start();

   if(isset($_POST['login'])){

     if($_POST['user'] == 'usuario' && $_POST['password'] == 'clave'){
       $_SESSION['valid'] = true;
       $_SESSION['success'] = "login successful";
       header("Location: reg.php");
     } else {
       $_SESSION['success'] = "Try again";
       header("Location: index.php");
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
    <a href="list.php" class="btn btn-success">Search</a>
    <table class="table table-borderd">
       <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Details</th>
       </tr>
       <?php
          require 'config.php';
          $result = $session->execute("SELECT * FROM books");
          foreach($result as $row) {
             echo "<tr>";
             echo "<td>".$row['id']."</td>";
             echo "<td>".$row['name']."</td>";
             echo "<td>".$row['detail']."</td>";
             echo "</tr>";
          };
       ?>

    </table>

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
