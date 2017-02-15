<?php
/*--   edit profile   --*/
session_start();

/*-- connect to database --*/
require 'connect_database.php';

$student = $_SESSION["nub-login-id"];
$contact= $_POST["change-contact"];
$email= $_POST["change-email"];
$password= md5($_POST["change-password"]);

/*--   get value from input field   --*/
$changeContact= $_POST["change-contact"];
$changeEmail= $_POST["change-email"];
$changePass= md5($_POST["change-password"]);

/*--   check 'contact' field is set and perform required query   --*/
if($_POST['change-contact'] != ""){
  $sql= "UPDATE profile SET contact= '$changeContact' WHERE user_id= '$student'";

  if($conn->query($sql) !== false){
    header('Location: http://localhost/web_programming/profile.php');
    exit;
  }
}
/*--   check 'email' field is set and perform required query   --*/
if ($_POST['change-email'] != "") {
  $sql= "UPDATE profile SET email= '$changeEmail' WHERE user_id= '$student'";

  if($conn->query($sql) !== false){
    header('Location: http://localhost/web_programming/profile.php');
    exit;
  }
}
/*--   check 'password' field is set and perform required query   --*/
if ($_POST['change-password'] != "") {
  $sql= "UPDATE profile SET password= '$changePass' WHERE user_id= '$student'";

  if($conn->query($sql) !== false){
    header('Location: http://localhost/web_programming/profile.php');
    exit;
  }
}

header('Location: http://localhost/web_programming/profile.php');
exit;

$conn->close();
?>
