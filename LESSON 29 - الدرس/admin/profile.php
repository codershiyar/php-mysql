<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-light bg-light">

<a class="navbar-brand" href="#">
  Coder Shiyar
</a>

<img src="../img/logo.jpg" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">

</nav>
    <main class="container " style="text-align: right; direction: rtl; max-width:760px;  margin:auto;" >
<?php 
session_start();
if(isset($_SESSION['user'])){
if($_SESSION['user']->ROLE === "ADMIN"){


echo '<form method="POST">
<div class="p-3 shadow "> اسم :  </div>
<input class="form-control mb-1" type="text" name="name" value="'.$_SESSION['user']->NAME.'" required />
<div class="p-3 shadow "> العمر : </div>
<input  class="form-control mb-1" type="date" name="age" value="'.$_SESSION['user']->AGE.'" required />
<div class="p-3 shadow "> كلمة المرور : </div>
<input class="form-control mb-1" type="text" name="password" value="'.$_SESSION['user']->PASSWORD.'" required />

<button class="w-100 btn btn-warning mt-1" type="submit" name="update" value="'.$_SESSION['user']->ID.'">تحديث</button>
<a class="w-100 btn btn-light mt-1" href="index.php"> عودة لصفحة الرئيسية</a>
</form>';

if(isset($_POST['update'])){
    $username = "root";
    $password = "";
    $database = new PDO("mysql:host=localhost; dbname=codershiyar;",$username,$password);
    
    $updateUserData = $database->prepare("UPDATE users SET NAME 
    = :name ,PASSWORD = :password ,AGE=:age WHERE ID = :id ");
        $updateUserData->bindParam('name',$_POST['name']);
        $updateUserData->bindParam('password',$_POST['password']);
        $updateUserData->bindParam('age',$_POST['age']);
        $updateUserData->bindParam('id',$_POST['update']);
        if($updateUserData->execute()){
            echo '<div class="alert alert-success mt-3">  تم تحديث البيانات بنجاح </div>';
            $user =  $database->prepare("SELECT * FROM users WHERE ID = :id ");
            $user->bindParam('id',$_POST['update']);
            $user->execute();
            $_SESSION['user'] = $user->fetchObject();
            header("refresh:2;");
        }  else{
            echo '<div class="alert alert-alert mt-3">  فشل تحديث البيانات </div>';
    
    
        }
}
}else{
    session_unset();
    session_destroy();
    header("location:http://localhost/App/login.php",true);  
}
}else{
    session_unset();
    session_destroy();
    header("location:http://localhost/App/login.php",true);  
}

?>

</main>
</body>
</html>
