
<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=codershiyar;",$username,$password);

$getUser = $database->prepare("SELECT * FROM users WHERE USER_ID = 3 ");

$getUser->execute();

// $getUser = $getUser->fetch(PDO::FETCH_ASSOC);

// var_dump($getUser );
// echo "<h1>" . $getUser['EMAIL'] . "</h1>";

$getUser = $getUser->fetchObject();

echo $getUser->USER_ID;

// var_dump($getUser);
?>



