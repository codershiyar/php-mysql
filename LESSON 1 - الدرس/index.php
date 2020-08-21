<?php

try{
    $username = 'root';
    $password = '';
    
  $database = new PDO("mysql:host=localhost; dbname=codershiyar; " ,$username ,$password );
//  $database = new PDO("mysql:host=server232.web-hosting.com; dbname=shiygtjs_academy" ,$username ,$password );
    if($database){

    echo 'تم اتصال بقاعدة البيانات بنجاح';
    }


}catch(Exception $error){
    echo 'فشل اتصال بقاعدة بيانات';
}

?>