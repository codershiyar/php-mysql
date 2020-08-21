<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=codershiyar;",$username,$password);

if(isset($_POST['upload'])){
$fileType = $_FILES["file"]["type"];
$fileName = $_FILES["file"]["name"];
$file = $_FILES["file"]["tmp_name"];

move_uploaded_file($file,"files/".$fileName);
$position = "files/".$fileName;
$uploadFile = $database->prepare("INSERT INTO files(name,type,position) VALUES(:name,:type,:position)");
$uploadFile->bindParam("name",$fileName);
$uploadFile->bindParam("type",$fileType);
$uploadFile->bindParam("position",$position);
if($uploadFile->execute()){
echo 'تم رفع ملف بنجاح';
}else{
  echo 'فشل رفع ملف';
}
}
?>

<form method="POST" enctype="multipart/form-data">
<input type="file" name="file" accept="image/*,video/*,audio/*" required/>
<button type="submit" name="upload">رفع ملف</button>
</form>