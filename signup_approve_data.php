<?php
  /*--this file approve registration from admin panel of individual students--*/

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  /*-- connect to database --*/
  require 'connect_database.php';

  // get the q parameter from URL
  $q = $_REQUEST["q"];
  $insert= json_decode($q);

  /*--   check button to select actions   --*/
  if($insert[1] == "Approved"){

    /*--   verify sign-up   --*/
    $sql = "UPDATE verify_sign_up SET status='verified' WHERE user_id='$insert[0]'";

    if ($conn->query($sql) === TRUE) {

      /*--   get data from 'verify_sign_up' database table   --*/
      $sqlGet = "SELECT * FROM verify_sign_up WHERE user_id= '$insert[0]' AND status='verified'";
      $result= $conn->query($sqlGet);
      $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
      
      $id= $insert[0]; $name= $row[0]['name']; $department= $row[0]['department']; $batch= $row[0]['batch'];
      $joinDate= $row[0]['joining_date']; $contact= $row[0]['contact']; $email= $row[0]['email']; $password= $row[0]['password'];
      $address= $row[0]['address']; $gender= $row[0]['gender']; $profession= $row[0]['profession'];

      /*--   generate table & transfer data, for sutent id after verified   --*/
      if($insert[2] === 'student'){

        /*--   auto generate student database table   --*/
        $sqlTable= "CREATE TABLE $insert[0] (id int AUTO_INCREMENT PRIMARY KEY, c_id varchar(11) NOT NULL,
                    c_name varchar(77) NOT NULL, c_credit int(3) NOT NULL, g_point varchar(7) NOT NULL, grade varchar(5) NOT NULL,
                    semester varchar(15) NOT NULL)";
        if ($conn->query($sqlTable) !== TRUE) {
            echo "Unable to create table: ".$conn->error;
        }else{
          echo "id table created!";
        }

        /*--   insert 'student' data to corresponding table after vedidation   --*/
        $sqlInsert1= "INSERT INTO student (s_id, s_name, s_department, s_batch)
        VALUES ('$id', '$name', '$department', '$batch')";
        $sqlInsert2= "INSERT INTO profile (user_id, contact, email, password, address, gender, profession, image_name, image_path)
        VALUES ('$id', '$contact', '$email', '$password', '$address', '$gender', '$profession', 'frozen_flower_2-wallpaper-1366x768.jpg', 'profile_pic/frozen_flower_2-wallpaper-1366x768.jpg')";

        if($conn->query($sqlInsert1) === TRUE && $conn->query($sqlInsert2) === TRUE){

          /*--   delete data after verified, from verificaion list   --*/
          $sql = "DELETE FROM verify_sign_up WHERE user_id= '$insert[0]' AND status='verified'";

          if ($conn->query($sql) === TRUE) {
              echo "Record deleted successfully from verificaion list";
          } else {
              echo "Error deleting record: " . $conn->error;
          }

        }else {
            echo "data wasn't inserted: " . $conn->error;
        }

      }/*--   insert 'teacher' data to corresponding table after vedidation   --*/
      elseif ($insert[2] === 'teacher') {
        /*--   insert 'student' data to corresponding table after vedidation   --*/
        $sqlInsert1= "INSERT INTO teacher (t_id, t_name, t_department, joining_date)
        VALUES ('$id', '$name', '$department', '$joinDate')";
        $sqlInsert2= "INSERT INTO profile (user_id, contact, email, password, address, gender, profession)
        VALUES ('$id', '$contact', '$email', '$password', '$address', '$gender', '$profession')";

        if($conn->query($sqlInsert1) === TRUE && $conn->query($sqlInsert2) === TRUE){

          /*--   delete data after verified, from verificaion list   --*/
          $sql = "DELETE FROM verify_sign_up WHERE user_id= '$insert[0]' AND status='verified'";

          if ($conn->query($sql) === TRUE) {
              echo "Record deleted successfully from verificaion list";
          } else {
              echo "Error deleting record: " . $conn->error;
          }

        }else {
            echo "data wasn't inserted: " . $conn->error;
        }
      }

    } else {
        echo "sign up wasn't verified: " . $conn->error;
    }

  }elseif ($insert[1] == "NotApproved") {
    /*--   unverify sign-up   --*/
    $sql = "DELETE FROM verify_sign_up WHERE user_id= '$insert[0]'";

    if ($conn->query($sql) === TRUE) {
        echo $insert[0];
    } else {
        echo "sign up wan't canceled: " . $conn->error;
    }
  }

  $conn->close();
?>
