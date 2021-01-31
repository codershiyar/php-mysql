<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: POST");

$data = file_get_contents("php://input");
$data = json_decode($data);

if(isset($data->text) ){
    $username = "root";
    $password = "";
    $database = new  PDO("mysql:host=localhost; dbname=codershiyar;charset=utf8;", $username, $password);

    $addData = $database->prepare("INSERT INTO course_release_date(text,time,date) VALUES(:text,CURRENT_TIME,CURRENT_DATE )");
    $addData->bindParam("text",$data->text);

    if($addData->execute()){
        print_r(json_encode(["message"=>"تم اضافة البيانات بنجاح "]));
    }else{
        var_dump($addData->errorInfo());
        print_r(json_encode(["error"=>"حدث خطا ما "]));
    }

}else{
    print_r(json_encode(["error"=>"حدث خطا ما "]));
}




