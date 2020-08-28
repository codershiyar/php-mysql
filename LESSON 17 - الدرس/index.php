<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=codershiyar;",$username,$password);

if(isset($_GET['btn-search'])){
$SEARCH = $database->prepare("SELECT * FROM users WHERE name LIKE :value 
OR Country LIKE :value OR Password LIKE :value");
$SEARCH_VALUE = "%".$_GET['search']."%";

$SEARCH->bindParam("value",$SEARCH_VALUE);
$SEARCH->execute();

foreach($SEARCH AS $data){

  echo '<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header">' .$data['name'] .'</div>
  <div class="card-body">
    <h5 class="card-title">' .$data['Country'] .'</h5>
    <p class="card-text">' .$data['Age'] .'</p>
  </div>
</div>
';

}
}
?>

<form method="GET" >
<input class="form-control " style="display:inline-block; width:300px; " type="text" name="search" placeholder="search ...." />
<button class="btn btn-outline-warning" type="submit" name="btn-search">Search - بحث</button>
</form>

