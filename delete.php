<?php

session_start();
if (!isset($_SESSION['valid'])){
  $_SESSION['success'] = "Try again";
  header("location: index.php");
}
require 'config.php';
/*
$collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

$_SESSION['success'] = "Book deleted successfully";
header("Location: reg.php");*/

?>
