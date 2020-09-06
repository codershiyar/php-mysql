<?php
session_start();
if(isset($_SESSION['user'])){
if($_SESSION['user']->ROLE === "SUPER-ADMIN"){
echo 'Welcome ' .$_SESSION['user']->NAME ;
echo "<form> <button type='submit' name='logout'>تسجيل خروج</button></form>";

}else{
    header("location:http://localhost/App/login.php",true); 
    die("");
}
}else{
    header("location:http://localhost/App/login.php",true); 
    die(""); 
}

if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header("location:http://localhost/App/login.php",true); 
    }
?>