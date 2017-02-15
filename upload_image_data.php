<?php
/*--this file insert "image" data in database--*/

session_start();

/*-- connect to database --*/
require 'connect_database.php';

// get user id
if($_SESSION["nub-admin-login-check"] == "no"){
  $id = $_SESSION["nub-login-id"];
}else $id = $_SESSION["nub-admin-login-id"];

$target_dir = "profile_pic/";
$file_name = basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $file_name;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
  } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  /*--   upload image   --*/
  if ( !move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "Sorry, there was an error uploading your file.";
    }

  /*--   insert image name & image path into database   --*/
  $sql= "UPDATE profile SET image_name='$file_name', image_path='$target_file' WHERE user_id= '$id'";

  if ($conn->query($sql) === TRUE) {
    header( "Refresh:0; url=profile.php", true, 303);
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
