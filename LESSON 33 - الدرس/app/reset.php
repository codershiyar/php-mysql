<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إعادة تعيين كلمة المرور</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<?php require_once 'nav.php' ?>  

<main class="contanier  m-auto " style="max-width:720px; margin-top:50px !important; text-align: center; ">

<?php 

if(!isset($_GET['code'])){
echo '<form method="POST">
<div class="p-3 shadow mb-3">بريد الكتروني</div>
<input class="form-control" type="email" name="email"  required/>

<button class="btn btn-warning mt-3 w-100" type="submit" name="resetPassword" >
    إرسال رابط إعادة تعيين كلمة المرور إلى بريد الكتروني
</button> 
</form > ';
}else if(isset($_GET['code']) && isset($_GET['email'])){
echo '<form method="POST">
<div class="p-3 shadow mb-3">
ضع كلمة مرور جديدة
</div>
<input class="form-control" type="text" name="password" required/>
<button type"submit" class="btn btn-warning mt-3 w-100" name="newPassword">إعادة تعيين كلمة مرور</button>
</form>';
}
?>


<?php 
if(isset($_POST['resetPassword']) ){
    require_once 'connectToDatabase.php';
    $checkEmail = $database->prepare("SELECT EMAIL,SECURITY_CODE FROM users WHERE EMAIL = :email");
    $checkEmail->bindParam("email",$_POST['email']);
    $checkEmail->execute();

    if( $checkEmail->rowCount() > 0){
        require_once 'mail.php';
        $user = $checkEmail->fetchObject();
        $mail->addAddress($_POST['email']);
        $mail->Subject = "إعادة تعين كلمة مرور";
    $mail->Body = '
        رابط لإعادة تعيين كلمة المرور 
        <br>
        ' . '<a href="http://localhost/App/reset.php?email='.$_POST['email']. 
        '&code='.$user->SECURITY_CODE. '">http://localhost/App/reset.php?email='.$_POST['email']. 
        '&code='.$user->SECURITY_CODE.'</a>';
        ;
        
        $mail->setFrom("academyshiyar@gmail.com", "Academy Shiyar");
        $mail->send();
        echo '
        <div class="alert alert-success mt-3"> 
     تم ارسال رابط لإعادة تعيين كلمة مرور إلى حسابك
     </div> 
     ';
    }else{
        echo '
        <div class="alert alert-warning mt-3">
        هذا بريد الكتروني غير مسجل لدينا
        </div> 
        ';
    }
}
?>


<?php 

if(isset($_POST['newPassword'])){
    $username = "root";
    $password = "";
    $database = new PDO("mysql:host=localhost; dbname=codershiyar;",$username,$password);
    
   $updatePassword = $database->prepare("UPDATE users SET PASSWORD 
   = :password WHERE EMAIL = :email");
   
   $updatePassword->bindParam("password",$_POST['password']);
   $updatePassword->bindParam("email",$_GET['email']);
   
   if($updatePassword->execute()){
    echo '
    <div class="alert alert-success mt-3">
    تم إعادة تعيين كلمة المرور بنجاح
    </div> 
    ';
   }else{
    echo '
    <div class="alert alert-danger mt-3">
    فشل إعادة تعيين كلمة المرور 
    </div>
    ';
   }
}

?>

</main>
</body>
</html>