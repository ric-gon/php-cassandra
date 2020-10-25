<?php

session_start();

if (!isset($_SESSION['valid'])){
  $_SESSION['success'] = "Try again";
  header("location: index.php");
}

require 'config.php';

$result = $session->execute("SELECT name, detail FROM books WHERE id = (int)$_GET[id]");
foreach ($result as $key) {
  $name = $key['name'];
  $detail = $key['detail'];
}

if(isset($_POST['submit'])){

  $options = array('arguments' => array($_POST[name],$_POST[detail]));
  $session->execute("UPDATE books SET name = ?, detail = ? WHERE id = (int)$_GET[id]", $options);

   $_SESSION['success'] = "Book updated successfully";
   header("Location: reg.php");
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
   <h1>Create Book</h1>
   <a href="reg.php" class="btn btn-primary">Back</a>

   <form method="POST">
      <div class="form-group">
         <strong>Name:</strong>
         <input type="text" name="name" value="<?php echo $name; ?>" required="" class="form-control" placeholder="Name">
      </div>
      <div class="form-group">
         <strong>Detail:</strong>
         <textarea class="form-control" name="detail" placeholder="Detail" placeholder="Detail"><?php echo $detail; ?></textarea>
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>
   </form>
</div>

</body>
</html>
