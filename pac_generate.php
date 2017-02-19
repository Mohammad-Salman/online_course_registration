<?php
session_start();
if ($_SESSION["nub-admin-login-check"] != "yes") {
	  header("Location: admin_login.php");
	}
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="http://localhost/web_programming/nubStyle.css">
<link rel="stylesheet" href="http://localhost/web_programming/font-awesome-4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="w3.css">
<title>Northern University Bangladesh | Page Generate</title>
</head>
<style>
  div.card-1, div.card-2, div.card-3{width: 89%; margin:7% 5%; float: left; border: 3px solid grey;}
	@media only screen and (min-width: 426px) {
		h1.w3-animate-zoom{padding-top: 19%;}
		div.card-1{width: 28.3%; margin:7% 1% 7% 5%; border: 3px solid grey;}
		div.card-2{width: 28.3%; margin:7% 1%; border: 3px solid grey;}
		div.card-3{width: 28.3%; margin:7% 1% 7% 1%; border: 3px solid grey;}
	}
	@media only screen and (min-width: 769px) {
		h1.w3-animate-zoom{padding-top: 0%;}
		div.card-1{width: 26.5%; margin:9% 1.3% 15% 7%; border: 0;}
		div.card-2{width: 26.5%; margin:9% 1.3%; border: 0;}
		div.card-3{width: 26.5%; margin:9% 7% 15% 1.3%; border: 0;}

    #content-container{width: 75%; margin: 0% 13%;}
	}
</style>

<body class="w3-leftbar w3-rightbar w3-border-dark-grey" id="content-container">
	<!-- logo added -->
	<div class="w3-container" >
		<img class="w3-left" src="nub_web_images/logo_nub.png"/>
		<li class="w3-right w3-dropdown-hover">
		  <a  class="w3-xlarge hide-medium hide-small show-large" href="javascript:void(0)"><i class="fa fa-user"></i></a>
		  <div class="w3-dropdown-content w3-border w3-card-4 w3-center" style="left:-100px;">
		    <a href="http://localhost/web_programming/profile.php">Profile</a>
		    <a href="http://localhost/web_programming/admin_logout.php">Log Out</a>
		  </div>
		</li>
	</div>

	<!-- main menu added -->
	<div class=" w3-large w3-dark-grey w3-padding-large">
		<ul class="w3-navbar">
			<li class="hide-large w3-light-grey w3-opennav w3-right">
		    <a href="javascript:void(0);" onclick="myFunction()">☰</a>
		  </li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/admin_home.php">Home</a></li>
			<li class="w3-blue"><a href="#">Package Genaration</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/reg_approve.php">Registration Approve</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/result_publish.php">Result publish</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/signup_approve.php">SignUp Approve</a></li>
		</ul>
		<!-- collapsable menu bar for short screen -->
		<div id="coll-menu" class="w3-hide">
		  <ul class="w3-navbar w3-left-align w3-large w3-light-grey">
				<li><a href="http://localhost/web_programming/admin_home.php">Home</a></li>
		    <li><a href="http://localhost/web_programming/reg_approve.php">Registration Approve</a></li>
        <li><a href="http://localhost/web_programming/result_publish.php">Result Publish</a></li>
				<li><a href="http://localhost/web_programming/signup_approve.php">SignUp Approve</a></li>
				<li><a href="http://localhost/web_programming/admin_logout.php">Log out&nbsp&nbsp&nbsp<i class="fa fa-sign-out"></i></a>
				</li>
		  </ul>
		</div> <!-- collapsable menu bar for short screen ends -->
	</div> <!-- main menu ends -->

	<!-- containar of contents section -->
	<div class="row w3-padding-xlarge">
    <h1>Package Generate</h1>
    <h2 id="semester-name"></h2>

		<!--   upload form for pdf file   -->
    <form action="upload_file_data.php" method="post" enctype="multipart/form-data">
      Select file to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit" style="margin-top: 1.9%">
    </form>

		<!--   add course to database   -->
		<div class="w3-container w3-card-4" style="margin: 5% 0 5% 0;" id="dropdown-box">
			<h2>Add courses</h2>

			<select class="w3-select w3-dark-grey" name="option" id="dropdown-option-add">
				<option value="" disabled selected>Choose your course</option>
			</select>

			<button class="w3-btn w3-dark-grey w3-right" style="margin: 1.5% 0;" id="add-button">Add</button>
		</div> <!-- dropdown box ends -->

		<!--   drop course from database   -->
		<div class="w3-container w3-card-4" style="margin: 5% 0 5% 0;" id="dropdown-box">
			<h2>Drop courses</h2>

			<select class="w3-select w3-dark-grey" name="option" id="dropdown-option-drop">
				<option value="" disabled selected>Choose your course</option>
			</select>

			<button class="w3-btn w3-dark-grey w3-right" style="margin: 1.5% 0;" id="drop-button">Drop</button>
		</div> <!-- dropdown box ends --> <p id="demo"></p>

	</div> <!-- containar of contents section ends -->

	<!--pagination added-->
	<div class="w3-center w3-padding-32" style="margin-top: 11%;">
		<ul class="w3-pagination">
			<li><a class="w3-hover-black" href="http://localhost/web_programming/admin_home.php"><i class="fa fa-angle-double-left"></i></a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/admin_home.php">1</a></li>
			<li><a class="w3-black" href="#">2</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/reg_approve.php">3</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/result_publish.php">4</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/signup_approve.php">5</a></li>
      <li><a class="w3-hover-black" href="http://localhost/web_programming/reg_approve.php"><i class="fa fa-angle-double-right"></i></a></li>
		</ul>
	</div>

	<!-- footer added -->
	<?php require 'footer.php';?>

  <!---    ____________     javascript    _____________     --->

<script>

/*-- collapsable menu bar function --*/
function myFunction() {
		var x = document.getElementById("coll-menu");
		if (x.className.indexOf("w3-show") == -1) {
				x.className += " w3-show";
		} else {
				x.className = x.className.replace(" w3-show", "");
		}
}

/*--   function to go to top when go to top link clicked   --*/
function scrollToTop() {
	var timeOut;
	if (document.body.scrollTop!=0 || document.documentElement.scrollTop!=0){
		window.scrollBy(0,-50);
		timeOut=setTimeout('scrollToTop()',25);
	}
	else clearTimeout(timeOut);
}

/*--   add event listener to "add" button   --*/
document.getElementById('add-button').addEventListener('click', makeCourseList);

/*--   add event listener to "drop" button   --*/
document.getElementById('drop-button').addEventListener('click', makeCourseList);

/*--   function to call the server to get course list when add button pressed  --*/
function makeCourseList(){

	/*--   check the value of selected option   --*/
	if(this.innerHTML == "Add"){
		var dropdownElement= document.getElementById('dropdown-option-add');
		var selectedOption= dropdownElement.options[dropdownElement.selectedIndex].value;
	}else{
		var dropdownElement= document.getElementById('dropdown-option-drop');
		var selectedOption= dropdownElement.options[dropdownElement.selectedIndex].value;
	}

	/*--   delete selected option   --*/
	dropdownElement.remove(dropdownElement.selectedIndex);

	/*--   get semester name pac. is generating for   --*/
	var sem= document.getElementById('semester-name').innerHTML;
	/*--   remove all spaces and convert to lower cases    --*/
	sem= sem.replace(/\s+/g,'');
	sem= sem.toLowerCase();

	/*--   get code from selected option   --*/
	var codeIndexFirst= selectedOption.indexOf("[");
	var codeIndexSecond= selectedOption.indexOf("]");
	var courseCode= '{"code":"' + selectedOption.slice(codeIndexFirst+1, codeIndexSecond) + '"';

	/*--   attach add/drop signal with course code   --*/
	courseCode += ',"button":"' + this.innerHTML + '","semester":"' + sem + '"}';

	/*--   server request   --*/
	var xmlhttp = new XMLHttpRequest();
	var url = "http://localhost/web_programming/add_drop_offered_courses_data.php?q=";

	xmlhttp.onreadystatechange=function() {
			if (this.readyState == 4 && this.status == 200) {
					location.reload();  /*--   call function to add courses in table   --*/
			}
	}
	xmlhttp.open("GET", url+courseCode, true);
	xmlhttp.send();
}

/*--   calculate semester name   --*/
var d = new Date();
var month = d.getMonth();
var year = d.getFullYear();

if(month > 8){
	document.getElementById('semester-name').innerHTML= "Spring " + (year + 1);
}else if (month > 4) {
	document.getElementById('semester-name').innerHTML= "Fall " + year;
}else if (month >= 0) {
	document.getElementById('semester-name').innerHTML= "Summer " + year;
}

</script>

</body>
</html>

<!-- _________________      PHP    __________________ -->

<?php

	/*-- connect to database --*/
	require 'connect_database.php';

	/*--   get courses from database   --*/
	$sqlCourses = "SELECT c_id, c_name, c_credit, section FROM course_list WHERE c_id NOT IN (SELECT c_id FROM offered_courses)";
	$resultCourses = $conn->query($sqlCourses);

	if ($resultCourses->num_rows > 0) {
			/*-- output data of each row --*/
			while($rowCourses = $resultCourses->fetch_assoc()) {

				/*-- copy offered courses from array to vaiable to use them in javascript --*/
				$ocId= $rowCourses['c_id']; $ocName= $rowCourses['c_name'];
				$ocCredit= $rowCourses['c_credit']; $osection= $rowCourses['section'];
				/*-- add options to dropdownbox --*/
				echo "<script>
								/*-- add options to dropdown-box --*/
								var selectAddCourses= document.getElementById('dropdown-option-add');
								var option1= document.createElement('option');
								option1.text= 'Code: '+'[$ocId] >>'+'Course name: '+'[$ocName] >>'+'Credit: '+
																'[$ocCredit] >>'+'Section: '+'[$osection]';
								selectAddCourses.add(option1);
							</script>";
			}
	}

	/*--   get offered courses from database   --*/
	require 'fetch_all.php';

	if ($resultRegSemester->num_rows > 0) {
			/*-- output data of each row --*/
			for($i= 0; $i< $resultRegSemester->num_rows; $i++) {

				/*-- copy offered courses from array to vaiable to use them in javascript --*/
				$ocId= $rowOffCourses[$i]['c_id']; $ocName= $rowOffCourses[$i]['c_name']; $ocCredit= $rowOffCourses[$i]['c_credit'];
				$osection= $rowOffCourses[$i]['section'];
				/*-- add options to dropdownbox --*/
				echo "<script>
								/*-- add options to dropdown-box --*/
								var selectDropCourses= document.getElementById('dropdown-option-drop');
								var option2= document.createElement('option');
								option2.text= 'Code: '+'[$ocId] >>'+'Course name: '+'[$ocName] >>'+'Credit: '+'[$ocCredit] >>'+
																'Section: '+'[$osection]';
								selectDropCourses.add(option2);
							</script>";
			}
	}

	$conn->close();
?>
