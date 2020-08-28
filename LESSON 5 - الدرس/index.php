<?php

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=codershiyar;",$username,$password);

  $sql = $database->prepare("CREATE TABLE test2(id int(10), text varchar(255))");
  $sql->execute();
  
?>