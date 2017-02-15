<?php
  /*--this file insert registration and tesult "dates" in database--*/

  session_start();

  /*-- connect to database --*/
  require 'connect_database.php';

  // get the q parameter from URL
  $q = $_REQUEST["q"];

  $insert= json_decode($q,true);

  /*--   get values of array   --*/
  $start= $insert['start'];
  $end= $insert['end'];
  $resultPublish= $insert['publishDate'];
  $regConfirm= $insert['confirmDate'];
  $regSemester= $insert['reg_semester'];

  $sql = "INSERT INTO timeline (reg_start, reg_end, result_publish, reg_confirm, reg_semester)
  VALUES ('$start', '$end', '$resultPublish', '$regConfirm', '$regSemester')";

  if ($conn->query($sql) !== TRUE) {
    echo "Unable to registration !";
  }else echo "successful";

  $conn->close();
?>
