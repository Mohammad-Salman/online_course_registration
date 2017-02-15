<?php

  /*--   fetch the "course list" in database and output it as associative array   ---*/
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  /*-- connect to database --*/
  require 'connect_database.php';

  // get the q parameter from URL
  $q = $_REQUEST["q"];

  $code= json_decode($q,true);
  $code= $code['code'];

  /*--   get offered courses from database   --*/
  $sqlOffCourses = "SELECT c_id, c_name, c_credit, section FROM offered_courses WHERE c_id= '$code'";
  $resultOffCourses = $conn->query($sqlOffCourses);

  if ($resultOffCourses->num_rows > 0) {
    $outp = array();
    $outp= $resultOffCourses->fetch_all(MYSQLI_ASSOC);
    echo json_encode($outp);
  }else echo $code;

  /*--   get total number of registration of perticular course from database   --*/
  /*$sqlOffCourses = "SELECT c_id, c_name, c_credit, section FROM reg_semester";
  $resultOffCourses = $conn->query($sqlOffCourses);

  if ($resultOffCourses->num_rows > 0) {
      $outp = "[";*/


  $conn->close();
?>
