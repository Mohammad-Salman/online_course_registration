<?php
  /*--this file insert result into database table 'reg_semester'--*/

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  /*-- connect to database --*/
  require 'connect_database.php';


  // get the q parameter from URL
  $q = $_REQUEST["q"];

  $insert= json_decode($q,true);

  for ($i= 0; $i < sizeof($insert); $i++) {

    $sId= $insert[$i]['s_id'];
    $cId= $insert[$i]['c_id'];
    $score= $insert[$i]['score'];

    $sql = "UPDATE reg_semester SET g_point= '$score' WHERE (s_id = '$sId') AND (c_id= '$cId')";

    if ($conn->query($sql) !== TRUE) {
        echo "Unable to registration !";
    }else echo $sId;
  }

  $conn->close();

?>
