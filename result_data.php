<?php
  /*--this file get student result from student database--*/

  session_start();

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  /*-- connect to database --*/
  require 'connect_database.php';

  $student= $_SESSION['nub-login-id']; // get student id

  /*--   get result from student database   --*/
  require 'fetch_all.php';

  if ($resultSemRes->num_rows > 0) {
    /*-- output data of each row --*/
    $outp = array();
    $outp= $resultSemRes->fetch_all(MYSQLI_ASSOC);
    echo json_encode($outp);
  }


  $conn->close();
?>
