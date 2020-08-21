<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=codershiyar;",$username,$password);



$getItems = $database->prepare("SELECT * FROM products");
$getItems->execute();

foreach($getItems AS $data){
  echo '<div  class="card text-white bg-success mb-3" style="max-width: 18rem;">
  <div class="card-header">منتج - ' . $data['Id']. '</div>
  <div class="card-body">
    <h5 class="card-title">' . $data['Name'] . '</h5>
    <p class="card-text">' .$data['Price']. ' </p>
    <form method="POST"> <button class="btn btn-danger" type="submit" name="remove" value="'.$data['Id'] .' ">X - حذف </button></from/>
    
  </div>
</div>';


}

if(isset($_POST['remove'])){
$removeProduct = $database->prepare("DELETE FROM products WHERE Id = :id ");
$getId = $_POST['remove'];
$removeProduct->bindParam("id",$getId);

if($removeProduct->execute()){
echo 'تم حذف بنجاح';
header("Location: index.php");
}else{
  echo 'فشل حذف';
}
}
?>


