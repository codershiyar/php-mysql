
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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

<main class="contanier mt-3" style="max-width:720px; margin:auto; direction: rtl !important; text-align:right !important;">

<?php
session_start();

$user = $_SESSION['user'];

echo '<form method="POST">';
echo '<div class="p-3 shadow"> الاسم </div>';
echo '<input class="form-control" type="text" value="'.$user->NAME . '" name="name" />';


echo '<div class="p-3 shadow"> تاريخ الميلاد </div>';
echo '<input class="form-control" type="date" value="'.$user->AGE . '" name="age" />';


echo '<div class="p-3 shadow"> كلمة المرور </div>';
echo '<input class="form-control" type="text" value="'.$user->PASSWORD . '" name="password" />';

echo '<button class="btn btn-warning w-100 mt-3" type="submit" name="update" value="'.$user->ID.'" >تحديث</button>' ;
echo '<a class="btn btn-dark w-100 mt-3" href="index.php">صفحة الرئيسية</a>' ;

echo '</form>';
?>

<?php 

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=codershiyar;",$username,$password);

if(isset($_POST['update'])){
    $update = $database->prepare("UPDATE 
    users SET NAME= :name , PASSWORD = :password , AGE = :age WHERE ID = :id");
    $update->bindParam("name",$_POST['name']);
    $update->bindParam("password",$_POST['password']);
    $update->bindParam("age",$_POST['age']);
    $update->bindParam("id",$_POST['update']);

    if($update->execute()){
  

        $getUser = $database->prepare("SELECT * FROM users WHERE ID = id");
        $update->bindParam("id",$_POST['update']);
        $getUser->execute();
        $_SESSION['user'] =  $getUser->fetchObject();

        echo '<div class="alert alert-success mt-3">  تم تحديث البيانات </div>';
        header("refresh:2;",true);
    }else{
        echo 'خطا' .$update->errorInfo();
    }
}

?>
</main>
</body>
</html>

