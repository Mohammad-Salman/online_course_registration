<?php
  /*--this file insert teacher registration "form" data in database--*/

  session_start();

  /*-- connect to database --*/
  require 'connect_database.php';

  // get the q parameter from URL
  $q = $_REQUEST["q"];

  $insert= json_decode($q,true);

  /*--   input value   --*/
  $cId= $insert['code'];
  $tName= $insert['teacher'];

  /*--   semester 3 parameters   --*/
  $fall= "Fall";
  $spring= "Spring";
  $summer= "Summer";

  if(date("m") == 12){
    $semester= $spring . " " . (date("Y")+1);
  }elseif (date("m") == 1) {
    $semester= $spring . " " . date("Y");
  }else if(date("m") == 8 || date("m") == 9){
    $semester= $fall . " " . date("Y");
  }else if(date("m") == 4 || date("m") == 5){
    $semester= $summer . " " . date("Y");
  }

  $sql = "INSERT INTO teac_registration (c_id, t_name, semester)
  VALUES ('$cId', '$tName', '$semester')";

  if ($conn->query($sql) !== TRUE) {
    echo "Unable to registration !";
  }else echo $semester;


  $conn->close();
?>
