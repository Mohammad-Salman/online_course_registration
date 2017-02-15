<?php
  /*--this file "add" or "drop" offered courses on database--*/

  /*--   fetch the "course list" in database and output it as associative array   ---*/
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  /*-- connect to database --*/
  require 'connect_database.php';

  // get the q parameter from URL
  $q = $_REQUEST["q"];

  $addDrop= json_decode($q,true);
  $code= $addDrop['code'];
  $semester= $addDrop['semester'];


  /*--   to add courses to offered_courses table   --*/
  if($addDrop['button'] == "Add"){
    /*--   delete previous semester courses   --*/
    $sqlDel= "DELETE FROM offered_courses
                  WHERE semester != '$semester'";

    if($conn->query($sqlDel) === TRUE){
      echo "delet all";
    }

    /*--   get offered courses from database   --*/
    $sqlCourses = "SELECT department, c_id, c_name, c_credit, section FROM course_list WHERE c_id= '$code'";
    $resultCourses = $conn->query($sqlCourses);

    if ($resultCourses->num_rows > 0) {

      /*--   insert course into offerd_courses table   --*/
      while($rowCourses = mysqli_fetch_array($resultCourses,MYSQLI_NUM)){
        $sqlInCourses = "INSERT INTO offered_courses (department, c_id, c_name, c_credit, section, semester)
                          VALUES ('$rowCourses[0]', '$rowCourses[1]', '$rowCourses[2]', '$rowCourses[3]', '$rowCourses[4]', '$semester')";
        if($conn->query($sqlInCourses) === TRUE){
          echo "inserted";
        }
      }
    }
  }

  /*--   to drop courses from offered_courses   --*/
  if($addDrop['button'] == "Drop"){
    /*--   get offered courses from database   --*/
    $sqlCourses = "SELECT c_id, department FROM offered_courses WHERE c_id= '$code'";
    $resultCourses = $conn->query($sqlCourses);

    if ($resultCourses->num_rows > 0) {

      /*--   drop course from offerd_courses table   --*/
      while($rowCourses = mysqli_fetch_array($resultCourses,MYSQLI_NUM)){
        $sqlDropCourses = "DELETE FROM offered_courses
                            WHERE c_id='$rowCourses[0]' AND department='$rowCourses[1]'";
        if($conn->query($sqlDropCourses) == true){
          echo "deleted";
        }
      }
    }
  }

  $conn->close();
?>
