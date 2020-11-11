<?php
  require 'config.php';
  if(isset($_POST['id'])){
    header("Location: list.php?id=".$_POST['find_s']."");
  }
  if(isset($_POST['name'])){
    header("Location: list.php?name=".$_POST['find_s']."");
  }
  if(isset($_POST['detail'])){
    header("Location: list.php?detail=".$_POST['find_s']."");
  }
  if($_GET['id']!=NULL){
    $result = $session->execute("SELECT * FROM books WHERE id = (int)$_GET[id]");
  }
  if($_GET['name']!=NULL){
    $options = array('arguments' => array($_GET['name']));
    $result = $session->execute("SELECT * FROM books WHERE name = ? ALLOW FILTERING", $options);
  }
  if($_GET['detail']!=NULL){
    $options = array('arguments' => array($_GET['detail']));
    $result = $session->execute("SELECT * FROM books WHERE detail = ? ALLOW FILTERING", $options);
  }
?>
<!DOCTYPE html>
<html>
  <head>
     <title>PHP & MongoDB</title>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
    <h1>PHP & MongoDB</h1>

    <form method="POST">
       <div class="form-group">
          <input type="text" name="find_s" required="" class="form-control">
       </div>
       <div class="form-group">
          <button type="submit" name="id" class="btn btn-success">Id</button>
          <button type="submit" name="name" class="btn btn-success">Name</button>
          <button type="submit" name="detail" class="btn btn-success">Detail</button>
       </div>
    </form>

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
    <a href="index.php" class="btn btn-primary">Back</a>
    </div>

  </body>
</html>
