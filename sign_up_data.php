<?php
  session_start();

  /*--   fetch the "course list" in database and output it as associative array   ---*/
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  /*-- connect to database --*/
  require 'connect_database.php';

  // get the q parameter from URL
  $q = $_REQUEST["q"];

  $insert= json_decode($q,true);   //decode array

  $id= $insert['id'];
  /*--   remove spaces   --*/
  $id= preg_replace('/\s+/','',$id);

  $name= $insert['name'];
  $department= $insert['department'];
  $batch= $insert['batch'];
  $contact= $insert['contact'];
  $email= $insert['email'];
  $address= $insert['address'];
  $gender= $insert['gender'];
  $password= md5($insert['password']);
  $joinDate= $insert['join_date'];

  /*--   student sign-up   --*/
  if($joinDate == ""){

    /*--   insert data into verification list   --*/
    $sql = "INSERT INTO verify_sign_up (user_id, name, department, profession, status, batch,
      contact, email, address, gender, password)
    VALUES ('$id', '$name', '$department', 'student', 'unverified', '$batch',
      '$contact', '$email', '$address', '$gender', '$password')";

    if ($conn->query($sql) !== TRUE) {
      echo "Unable to sign up !"." ".$conn->error; exit;
    }else{
      echo "sign up pending!"; exit;
    }
  }/*--   teacher sign-up   --*/
  else if($batch == ""){

    /*--   insert data into verification list   --*/
    $sql = "INSERT INTO verify_sign_up (user_id, name, department, profession, status, joining_date,
      contact, email, address, gender, password)
    VALUES ('$id', '$name', '$department', 'teacher', 'unverified', '$joinDate',
      '$contact', '$email', '$address', '$gender', '$password')";

    if ($conn->query($sql) !== TRUE) {
      echo "Unable to sign up !"; exit;
    }else{
      echo "sign up pending!"; exit;
    }
  }

?>
