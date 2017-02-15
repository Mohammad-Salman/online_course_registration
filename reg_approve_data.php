<?php
  /*--this file approve registration from admin panel of individual students--*/

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  /*-- connect to database --*/
  require 'connect_database.php';

  // get the q parameter from URL
  $q = $_REQUEST["q"];
  $insert= json_decode($q);

  /*--   if cancel button pressed all pending will be deleted, otherwise it will be registered   --*/
  if($insert[1] == "reg"){
    $sql = "UPDATE reg_semester SET status='reg' WHERE s_id='$insert[0]'";
  }elseif ($insert[1] == "cancel") {
    $sql = "DELETE FROM reg_semester WHERE s_id= '$insert[0]'";
  }

  if ($conn->query($sql) === TRUE) {
      echo $insert[0];
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $conn->close();
?>
