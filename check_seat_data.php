<?php

  /*--   fetch the "course list" in database and output it as associative array   ---*/
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  /*-- connect to database --*/
  require 'connect_database.php';

  // get the q parameter from URL
  $q = $_REQUEST["q"];

  $code= json_decode($q,true);
  $codeId= $code['code'];

  /*--   get total number of registration of perticular course from database   --*/
  $sqlOffCourses = "SELECT c_id FROM reg_semester WHERE c_id= '$codeId'";
  $resultOffCourses = $conn->query($sqlOffCourses);

  if ($resultOffCourses->num_rows < 40) {
    echo 'available';
  }else echo 'booked';


  $conn->close();
?>
