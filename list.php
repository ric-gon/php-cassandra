<?php
  session_start();

   if(isset($_POST['find'])){
    header("Location: list.php?id=".$_POST['find_s']."");
   }

   require 'config.php';

   $result = $session->execute("SELECT * FROM books WHERE id = (int)$_GET[id]");
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
    <a href="reg.php" class="btn btn-primary">Back</a>
    <table class="table table-borderd">
       <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Details</th>
       </tr>
       <?php
          foreach($result as $row) {
             echo "<tr>";
             echo "<td>".$row['id']."</td>";
             echo "<td>".$row['name']."</td>";
             echo "<td>".$row['detail']."</td>";
             echo "</tr>";
          };
       ?>



    </table>
    </div>

  </body>
</html>
