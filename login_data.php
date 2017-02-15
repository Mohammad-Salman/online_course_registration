<?php

session_start();

/*-- connect to database --*/
require 'connect_database.php';

/*--   get value of input field   --*/
$id = $_POST['id'];
$password = md5($_POST['password']);

/*--   check database for log in varification   --*/
$sql = "SELECT profession FROM profile WHERE user_id = '$id' AND password = '$password'";
$result= $conn->query($sql);

/*--   set session variables   --*/
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()){
    $_SESSION["nub-login-check"] = "yes";
    $_SESSION["nub-admin-login-check"]= "no";
    $_SESSION["nub-login-time"] = date("r");
    $_SESSION["nub-login-id"] = $id;

    $conn->close();
    if ($row['profession'] == 'student') {
      header('Location: http://localhost/web_programming/home.php');
      exit;
    }else if($row['profession'] == 'teacher'){
      header('Location: http://localhost/web_programming/teac_home.php');
      exit;
    }else echo "Username or Password was invalid!";
  }

}else{
  echo "Username or Password was invalid!";
}

?>
