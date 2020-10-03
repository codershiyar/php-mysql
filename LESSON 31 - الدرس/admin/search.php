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
echo '<form>
<input class="form-control" type="text" name="search" placeholder="بحث عن ...." />
<button class="btn btn-warning w-100 mt-3" type="submit" name="searchBtn" >بحث</button>
</form>
';

if(isset($_GET['searchBtn'])){
    $username = "root";
    $password = "";
    $database = new PDO("mysql:host=localhost; dbname=codershiyar;",$username,$password);
    
    $searchResult = $database->prepare("SELECT * FROM users WHERE NAME LIKE :name OR EMAIL LIKE :email");
    $searchValue = "%" . $_GET['search'] . "%";
    $searchResult->bindParam("name",$searchValue);
    $searchResult->bindParam("email",$searchValue);
    $searchResult->execute();
    echo '<table class="table mt-3">';
    echo  "<tr>";
    echo "<th> الأسم</th>";
    echo "<th> الإيميل</th>";
    echo  "<tr>";
    foreach($searchResult AS $result){
        echo  "<tr>";
        echo "<td> ".$result['NAME'] ."</td>";
        echo "<td> ".$result['EMAIL'] ."</td>";
        echo  "<tr>";
    }
    echo '</table>';
   
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

