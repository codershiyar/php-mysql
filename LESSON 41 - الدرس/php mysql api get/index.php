<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$username = "root";
$password = "";
$database = new  PDO("mysql:host=localhost; dbname=codershiyar;charset=utf8;", $username, $password);

$items = $database->prepare("SELECT * FROM course_release_date ");
$items->execute();

if(isset($_GET["key"])){
if($_GET["key"] == "1234"){

    $items = $items->fetchAll(PDO::FETCH_ASSOC);
    print_r(json_encode($items));
}else{
    print_r(json_encode(["error" => "كلمة مرور غير صحيحة"]));
}

}else{
    print_r(json_encode(["error" => "حدث خطا ما"]));
}

