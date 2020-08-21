
<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=codershiyar;",$username,$password);



if(isset($_POST['send'])){
$Title = $_POST['Title'];
$Content = $_POST['Content'];
$Date = $_POST['Date'];
$Time = $_POST['Time'];

$addData = $database->prepare("INSERT INTO articles(Title,Content,Date,Time)
 VALUES('$Title', '$Content' , '$Date', '$Time')");
var_dump($addData);
if($addData->execute()){

  echo 'تم إضافة بيانات بنجاح';
}else{
  echo ' فشل إضافة بيانات ';
}
}
?>

<form method="POST">
Title : <input type="text" name="Title" required/>
<br>
Content : <input type="text" name="Content" required/>
<br>
Date : <input type="date" name="Date" required/>
<br>
Time : <input type="time" name="Time" required/>
<br>
<button type="submit" name="send">ارسال - Send</button>
</form>