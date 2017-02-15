<?php
  /*--this file insert result into student database table 'student id'--*/

  /*-- connect to database --*/
  require 'connect_database.php';

  /*--   get student id and c_id when result is submitted   --*/
  $sqlGPoint = "SELECT s_id, g_point, c_id, c_name, c_credit FROM reg_semester WHERE g_point IS NOT NULL";
  $resultGPoint = $conn->query($sqlGPoint);

  if ($resultGPoint->num_rows > 0) {
    $semester= "undefined";

    /*--   get semester name   --*/
    if(date("m") == 1){
      $semester= "Fall " . (date("Y")-1);
    }elseif (date("m") == 12) {
      $semester= "Fall " . date("Y");
    }elseif (date("m") == 9 || date("m") == 8) {
      $semester= "Summer " . date("Y");
    }elseif (date("m") == 5 || date("m") == 4) {
      $semester= "Spring " . date("Y");
    }

    /*--   function to calculate grades according to grade points   --*/
		function calculateGrade($gradePoint){
			$grade;
			if($gradePoint == 4) $grade= "A+";
			else if ($gradePoint == "3.75") $grade= "A";
			else if ($gradePoint == "3.5") $grade= "A-";
			else if ($gradePoint == "3.25") $grade= "B+";
			else if ($gradePoint == "3.00") $grade= "B";
			else if ($gradePoint == "2.75") $grade= "B-";
			else if ($gradePoint == "2.5") $grade= "C";
			else if ($gradePoint == "2.25") $grade= "D";
			else if ($gradePoint == "F") $grade= "F";
			else if ($gradePoint == "X") $grade= "X";

			return $grade;
		}

    /*-- output data of each row --*/
    while($rowGPoint = $resultGPoint->fetch_assoc()) {
        $sId= $rowGPoint['s_id']; $gPoint= $rowGPoint['g_point']; $cId= $rowGPoint['c_id'];
        $cName= $rowGPoint['c_name']; $cCredit= $rowGPoint['c_credit'];
        $getGrade= calculateGrade($gPoint);

        /*--   insert data into student database   --*/
        $sql = "INSERT INTO $sId (g_point, c_id, c_name, c_credit, semester, grade)
                VALUES ('$gPoint', '$cId', '$cName', '$cCredit', '$semester', '$getGrade')";

        if ($conn->query($sql) !== TRUE) {
            echo "Unable to insert !"." ".$sId;
        }else{
          /*--   delete rows from "reg_semester" when result is published   --*/
          $sqlDel= "DELETE FROM reg_semester WHERE g_point IS NOT NULL";

          if ($conn->query($sqlDel) !== TRUE) {
              echo "Unable to delete !";
          }else echo "deleted";
        }
    }

  }else echo "nothing found";

  $conn->close();

?>
