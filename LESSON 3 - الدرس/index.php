<?php

$username = "root";
$password = "";
$database = new 
PDO("mysql:host=localhost; dbname=codershiyar;charset=utf8;",$username,$password);

if($database){
  
echo 'تم اتصال بقاعدة بيانات';
}
?>