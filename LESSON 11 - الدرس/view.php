<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=codershiyar;",$username,$password);

$files = $database->prepare("SELECT * FROM files");
$files->execute();
foreach($files AS $file ){
echo "<a href='" ."http://localhost/server/". $file["position"] . "' download>".$file["name"]."</a> <br>";
}
?>

