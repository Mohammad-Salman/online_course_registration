<?php
  /*--this file get student list teacher wants to submit result of from database--*/

  session_start();

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  /*-- connect to database --*/
  require 'connect_database.php';

  // get the q parameter from URL
  $q = $_REQUEST["q"];

  // get teacher id
  $tId= $_SESSION['nub-login-id'];

  /*--   get "t_name" from teachers database   --*/
  require 'fetch_all.php';

  /*--   get student t_id and c_id from teachers registered courses from database   --*/
  $author= 0;

  if ($resultCode->num_rows > 0) {
    /*-- output data of each row --*/
    while($rowCode = $resultCode->fetch_assoc()) {
      if($rowCode['t_name'] == $t_name){
        $author= 1;
      }
    }
  }

  if($author == 1){
    /*--   get student id from registered courses from database   --*/
    $sqlRegCourses = "SELECT s_id FROM reg_semester WHERE status= 'reg' AND c_id= '$q' AND g_point IS NULL";
    $resultRegCourses = $conn->query($sqlRegCourses);

    if ($resultRegCourses->num_rows > 0) {
        /*-- output data of each row --*/
        $outp = array();
        $outp= $resultRegCourses->fetch_all(MYSQLI_NUM);
        echo json_encode($outp);
    }else echo "nothing";
  }else echo "nothing";

  $conn->close();
?>
