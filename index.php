<?php
  session_start();

   if(isset($_POST['find'])){
    header("Location: list.php?id=".$_POST['find_s']."");
   }
   if(isset($_POST['name'])){
    header("Location: list.php?name=".$_POST['find_s']."");
   }
   if(isset($_POST['detail'])){
    header("Location: list.php?detail=".$_POST['find_s']."");
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
    <a href="login.php" class="btn btn-primary">Login</a>

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
          <strong>find:</strong>
          <input type="text" name="find_s" required="" class="form-control" placeholder="Password">
       </div>
       <div class="form-group">
          <button type="submit" name="find" class="btn btn-success">id</button>
          <button type="submit" name="name" class="btn btn-success">name</button>
          <button type="submit" name="detail" class="btn btn-success">detail</button>
       </div>
    </form>
    </div>

  </body>
</html>
