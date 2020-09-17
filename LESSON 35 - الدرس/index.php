<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<?php 
// 1) connect to database - اتصال بقاعدة البيانات
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=codershiyar;",$username,$password);


// 2) define how many results you want per page - تعريف عدد نتائج لكل صفحة
$resultsPerPage = 10;

// 3) ايجاد عدد نتائج البيانات الذي تحدده من قاعدة البيانات
// find out the number of results stored in database -
$numberOfResults = $database->prepare("SELECT * FROM user_details ");
$numberOfResults->execute();
 $numberOfResults = $numberOfResults->rowCount();

// 4) -تحديد رقم الصفحة الذي يعمل عليه الزائر حاليًا
// determine which page number visitor is currently on 
if(!isset($_GET['page'])){
$page = 1;
}else if(isset($_GET['page'])){
$page = $_GET['page'];
}
// 5) determine number of total pages available - تحديد عدد الصفحات الإجمالية المتاحة

$totalPages = ceil($numberOfResults / $resultsPerPage) ;

for($count = 1; $count<= $totalPages; ++$count){
    if($page == $count){
        echo '<a style="color:black;" href="index.php?page='.$count.'">'.$count.'</a> ';
    }else{
        echo '<a  href="index.php?page='.$count.'">'.$count.'</a> ';
    }
   
}
// 6) تحديد رقم البداية المحدد للنتائج في صفحة العرض
// determine the sql LIMIT starting number for the results on the displaying page

$results = $database->prepare("SELECT * FROM user_details LIMIT " . $resultsPerPage . " OFFSET " . ($page-1)*$resultsPerPage);
$results->execute();


// 7) display the results  - // عرض  النتائج الصفحات

foreach($results  AS $result){
echo '<div class="shadow p-3 mb-3">'. $result['username'] . '</div>';
}

?>