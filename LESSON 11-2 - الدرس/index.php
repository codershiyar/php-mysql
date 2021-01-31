<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=codershiyar;", $username, $password);
$getData = $database->prepare("SELECT * FROM post ");
$getData->execute();

var_dump($getData->errorInfo());

foreach ($getData  as $data) {
    echo "<div>" . $data["content"] . "</div>";
}
