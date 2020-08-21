<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=codershiyar;",$username,$password);



if(isset( $_GET['edit'])){
$getProduct = $database->prepare("SELECT * FROM products WHERE Id = :id");
$getProduct->bindParam("id",$_GET['edit']);
$getProduct->execute();
foreach($getProduct AS $data){
echo '
<div class="container"> 
<form method="POST" > 
Name: <input class="form-control" type="text" name="Name" value="'.$data['Name'].'"/>
Price: <input class="form-control" type="text" name="Price" value="'.$data['Price'].'"/>
<button class="btn btn-dark mt-3" type="submit" name="update" value="' . $data['Id'].'"> تحديث</button>
<a class="btn btn-success mt-3" href="index.php"> عودة</a>
</form>
</div>
';
}

if(isset($_POST['update'])){
    $update = $database->prepare("UPDATE products 
    SET Name = :Name , Price = :Price WHERE Id = :Id");
    $update->bindParam("Name",$_POST['Name']);
    $update->bindParam("Price",$_POST['Price']);
    $update->bindParam("Id",$_POST['update']);
    $update->execute();
    header("Location: edit.php?edit=" . $_POST['update']);
}

}
?>