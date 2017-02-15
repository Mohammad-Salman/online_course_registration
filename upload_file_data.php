<?php
$target_dir = "packages/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large. ";
    $uploadOk = 0;
}

// get file name
$fName= $_FILES["fileToUpload"]["name"];

// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "PDF") {
    echo "Sorry, only 'pdf' files are allowed. ";
    $uploadOk = 0;
}else if($fName != "cse.pdf" && $fName != "ecse.pdf" && $fName != "eee.pdf" && $fName != "eeee.pdf" && $fName != "bba_dc.pdf"
          && $fName != "bba_bc.pdf" && $fName != "mba_dc.pdf" && $fName != "mba_bc.pdf" && $fName != "llb_cc.pdf" && $fName != "llb_bc.pdf"
          && $fName != "llm_cc.pdf" && $fName != "ell.pdf" && $fName != "mae.pdf" && $fName != "btx.pdf" && $fName != "ebtx.pdf") {

              $uploadOk = 0;
              echo "Uploaded file name is not valid!(e.g. 'cse.pdf','ecse.php')";

  }else if (file_exists($target_file)){
    unlink($target_file);
  }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br>"."Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<br>"."The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "<br>"."Sorry, there was an error uploading your file.";
    }
}
?>
