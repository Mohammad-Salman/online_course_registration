<?php
  /*--   this file select rows from all database tables   --*/

  /*-- connect to database --*/
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "online_registration";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  /*--   get login id   --*/
  if($_SESSION["nub-admin-login-check"]== "no")
    $id= $_SESSION["nub-login-id"];
  else $id= $_SESSION["nub-admin-login-id"];

  /*--   fetch 'student' table/fetch_assoc   --*/

  $sqlStudent = "SELECT * FROM student WHERE s_id= '$id'";
  $resultStudent = $conn->query($sqlStudent);

  if ($resultStudent->num_rows > 0) {
      // get data in variable
      while($rowStudent = $resultStudent->fetch_assoc()) {
          $s_id= $rowStudent["s_id"]; $s_department= $rowStudent["s_department"]; $s_name= $rowStudent["s_name"];
          $s_batch= $rowStudent["s_batch"]; $s_cgpa= $rowStudent["s_CGPA"]; $s_pass_year= $rowStudent["s_pass_year"];
      }
  }

  /*--   fetch 'teacher' table/fetch_assoc   --*/

  $sqlTeacher = "SELECT * FROM teacher WHERE t_id= '$id'";
  $resultTeacher = $conn->query($sqlTeacher);

  if ($resultTeacher->num_rows > 0) {
      // get data in variable
      while($rowTeacher = $resultTeacher->fetch_assoc()) {
          $t_id= $rowTeacher["t_id"]; $t_department= $rowTeacher["t_department"];
          $t_name= $rowTeacher["t_name"]; $t_joining_date= $rowTeacher["joining_date"];
      }
  }

  /*--   fetch 'profile' table/fetch_assoc   --*/

  $sqlProfile = "SELECT * FROM profile WHERE user_id= '$id'";
  $resultProfile = $conn->query($sqlProfile);

  if ($resultProfile->num_rows > 0) {
      // get data in variable
      while($rowProfile = $resultProfile->fetch_assoc()) {
          $profile_id= $rowProfile["user_id"]; $contact= $rowProfile["contact"]; $email= $rowProfile["email"];
          $password= $rowProfile["password"]; $address= $rowProfile["address"]; $image_name= $rowProfile["image_name"];
          $image_path= $rowProfile["image_path"]; $gender= $rowProfile["gender"]; $profession= $rowProfile["profession"];
      }
  }

  /*--   fetch 'reg_semester' table/fetch_all   --*/

  $sqlRegSemester = "SELECT * FROM reg_semester WHERE s_id= '$id'";
  $resultRegSemester = $conn->query($sqlRegSemester);

  if ($resultRegSemester->num_rows > 0) {
      // get data in variable
      $rowRegSemester = $resultRegSemester->fetch_all(MYSQLI_ASSOC);
  }

  /*--   fetch 'course_list' table/fetch_all   --*/

  $sqlCourseList = "SELECT * FROM course_list";
  $resultCourseList = $conn->query($sqlCourseList);

  if ($resultCourseList->num_rows > 0) {
      // get data in variable
      $rowCourseList = $resultCourseList->fetch_all(MYSQLI_ASSOC);
  }

  /*--   fetch 'offered_courses' table/fetch_all   --*/

  $sqlOffCourses = "SELECT * FROM offered_courses";
  $resultOffCourses = $conn->query($sqlOffCourses);

  if ($resultOffCourses->num_rows > 0) {
      // get data in variable
      $rowOffCourses = $resultOffCourses->fetch_all(MYSQLI_ASSOC);
  }

  /*--   fetch 'timeline' table/fetch_assoc   --*/

  $sqlTimeline = "SELECT * FROM timeline";
  $resultTimeline = $conn->query($sqlTimeline);

  if ($resultTimeline->num_rows > 0) {
      // get data in variable
      while($rowTimeline = $resultTimeline->fetch_assoc()) {
          $reg_start= $rowTimeline["reg_start"]; $reg_end= $rowTimeline["reg_end"]; $result_publish= $rowTimeline["result_publish"];
          $reg_confirm_date= $rowTimeline["reg_confirm"]; $timeline_sem= $rowTimeline["reg_semester"];
      }
  }

  /*--   fetch 'teac_resistration' table/fetch_assoc   --*/

  $sqlTeacReg = "SELECT * FROM teac_registration WHERE t_name= 'Mr.Sabab'";
  $resultTeacReg = $conn->query($sqlTeacReg);

  if ($resultTeacReg->num_rows > 0) {
      // get data in variable
      while($rowTeacReg = $resultTeacReg->fetch_assoc()) {
        $teac_reg_t_name= $rowTeacReg["t_name"]; $teac_reg_c_id= $rowTeacReg["c_id"]; $teac_reg_semester= $rowTeacReg["semester"];
      }
  }

  /*--   fetch 'verify_sign_up' table/fetch_all   --*/

  $sqlVerify = "SELECT * FROM verify_sign_up";
  $resultVerify = $conn->query($sqlVerify);

  if ($resultVerify->num_rows > 0) {
      // get data in variable
      $rowVerify = $resultVerify->fetch_all(MYSQLI_ASSOC);
  }

  /*--   fetch 'reg_confirm' table/fetch_assoc   --*/

  $sqlRegConfirm = "SELECT * FROM reg_confirm WHERE s_id= '$id'";
  $resultRegConfirm = $conn->query($sqlRegConfirm);

  if ($resultRegConfirm->num_rows > 0) {
      // get data in variable
      while($rowRegConfirm = $resultRegConfirm->fetch_assoc()) {
        $reg_confirm_s_id= $rowRegConfirm["s_id"]; $total_amount= $rowRegConfirm["total_amount"];
        $payed_parcentage= $rowRegConfirm["payed_parcentage"]; $reg_confirm= $rowRegConfirm["confirm"];
        $due= $rowRegConfirm["due"];
      }
  }

  /*--   fetch 'cse100200619' table/fetch_all   --*/

  $sqlId = "SELECT * FROM $id";
  $resultId = $conn->query($sqlId);

  if ($resultId->num_rows > 0) {
      // get data in variable
      $rowId = $resultId->fetch_all(MYSQLI_ASSOC);
  }

?>
