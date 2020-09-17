<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
    <!-- Image and text -->
<nav class="navbar navbar-light bg-light">

  <a class="navbar-brand" href="#">
    Coder Shiyar
  </a>

  <img src="../img/logo.jpg" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">

</nav>

<main class="container m-auto" style="max-width: 720px;">

<?php
session_start();
if(isset($_SESSION['user'])){
if($_SESSION['user']->ROLE === "ADMIN"){
    
    require_once '../connectToDatabase.php';
if(isset( $_SESSION['userId'])){
$user = $database->prepare("SELECT * FROM users WHERE ID = :id");
$user->bindParam('id', $_SESSION['userId']);
$user->execute();
$user = $user->fetchObject();

echo '<form method="POST">
<div class="p-3 shadow "> اسم :  </div>
<input class="form-control mb-1" type="text" name="name" value="'.$user->NAME.'" required />
<div class="p-3 shadow "> العمر : </div>
<input  class="form-control mb-1" type="date" name="age" value="'.$user->AGE.'" required />
 ';

echo '<select class="form-control mb-3" name="activated" > ';
if($user->ACTIVATED ==="1"){
    echo ' <option value="' .$user->ACTIVATED.' ">حساب مفعل</option>';
}else{
    echo ' <option value="' .$user->ACTIVATED.' ">حساب غير مفعل</option>';
}
echo '
<option value="0">الغاء تفعيل</option>
<option value="1">تفعيل</option>
</select>

<button class="w-100 btn btn-warning mt-1 mb-3" type="submit" name="update" value="'.$user->ID.'">تحديث</button>
<a class="w-100 btn btn-light mt-1 mb-3" href="index.php"> عودة لصفحة الرئيسية</a>
</form>';
}

if(isset($_POST['update'])){
$updateUser = $database->prepare("UPDATE users SET NAME
 = :name , AGE= :age ,ACTIVATED=:activated ");
 $updateUser->bindParam("name",$_POST['name']);
 $updateUser->bindParam("age",$_POST['age']);
 $updateUser->bindParam("activated",$_POST['activated']);
 $updateUser->execute();
 header("location:editUser.php");


}

    echo "<form> <button class='btn btn-danger w-100' type='submit' name='logout'>تسجيل خروج</button></form>";
}else{
    header("location:http://localhost/App/login.php",true); 
    die("");
}
}else{
    header("location:http://localhost/App/login.php",true); 
    die(""); 
}

if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header("location:http://localhost/App/login.php",true); 
    }
?> 
</main>
</body>
</html>



