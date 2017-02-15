<?php
  /*--this file insert student registration "form" data in database--*/

  session_start();

  /*-- connect to database --*/
  require 'connect_database.php';
  
  // get the q parameter from URL
  $q = $_REQUEST["q"];

  $insert= json_decode($q,true);
  $sNmae= $_SESSION['nub-login-id']; // get student id

  for ($i= 0; $i< sizeof($insert); $i++) {

    $id= $insert[$i]['id'];
    /*--   remove spaces   --*/
    $id= preg_replace('/\s+/','',$id);
    $name= $insert[$i]['name'];
    $credit= $insert[$i]['credit'];
    $status= $insert[$i]['status'];

    $sql = "INSERT INTO reg_semester (s_id, c_id, c_name, c_credit, status)
    VALUES ('$sNmae', '$id', '$name', '$credit', '$status')";

    if ($conn->query($sql) !== TRUE) {
        echo "Unable to registration !";
    }
  }


  $conn->close();
?>
