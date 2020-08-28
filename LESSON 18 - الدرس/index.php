<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=codershiyar;",$username,$password);

if(isset($_GET['filter'])){
  $products = $database->prepare("SELECT * FROM products WHERE Price 
  BETWEEN :startNumber AND :endNumber");
  $products->bindParam("startNumber",$_GET['startNumber']);
  $products->bindParam("endNumber",$_GET['endNumber']);

  $products->execute();
  foreach(  $products AS $myProducts){
    echo '<div class="card bg-light mb-3" style="max-width: 18rem;">
    <div class="card-header">' . $myProducts['Name'] .'</div>
    <div class="card-body">
      <h5 class="card-title">' . $myProducts['Price'] .' السعر </h5>
 
    </div>
  </div>';
}
}else{
  $products = $database->prepare("SELECT * FROM products");
  $products->execute();
  foreach(  $products AS $myProducts){
    echo '<div class="card bg-light mb-3" style="max-width: 18rem;">
    <div class="card-header">' . $myProducts['Name'] .'</div>
    <div class="card-body">
      <h5 class="card-title">' . $myProducts['Price'] .' السعر </h5>
 
    </div>
  </div>';

  }
}
?>


<form method="GET">

<input type="number" name="startNumber">
<input type="number" name="endNumber">
<button type="submit" name="filter">فلتر بيانات</button>
</form>
