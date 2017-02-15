<?php
session_start();
if ($_SESSION["nub-login-check"] != "yes" && $_SESSION["nub-admin-login-check"] != "yes") {
	header("Location: login.php");
}
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="http://localhost/web_programming/nubStyle.css">
<link rel="stylesheet" href="http://localhost/web_programming/font-awesome-4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="w3.css">
<title> Northern University Bangladesh | Home</title>
<style>
	div.card-1, div.card-2, div.card-3{width: 89%; margin:7% 5%; float: left; border: 3px solid grey;}
	@media only screen and (min-width: 426px) {
		h1.w3-animate-zoom{padding-top: 19%;}
		div.card-1{width: 28.3%; margin:7% 1% 7% 5%; border: 3px solid grey;}
		div.card-2{width: 28.3%; margin:7% 1%; border: 3px solid grey;}
		div.card-3{width: 28.3%; margin:7% 1% 7% 1%; border: 3px solid grey;}
	}
	@media only screen and (min-width: 769px) {
		h1.w3-animate-zoom{padding-<!--top: 0%;}
		div.card-1{width: 26.5%; margin:15% 1.3% 15% 7%; border: 0;}
		div.card-2{width: 26.5%; margin:15% 1.3%; bor -->der: 0;}
		div.card-3{width: 26.5%; margin:15% 7% 15% 1.3%; border: 0;}
	}

</style>
</head>

<body>
	<!-- sidenav icon added -->
	<div class="w3-opennav w3-left w3-hover-text-grey w3-xlarge w3-padding-xlarge" onclick="w3_open()">☰</div>

	<!-- Sidenav (hidden by default) -->
	<nav class="w3-sidenav w3-card-2 w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidenav">
	  <a href="javascript:void(0)" onclick="w3_close()"
	  class="w3-closenav">Close</a>
	  <a href="" id="home"></a>
	  <a href="" id="2nd-page"></a>
		<a href="" id="3rd-page"></a>
		<a href="" id="4th-page"></a>
		<a href="" id="5th-page"></a>
		<a href="" id="log-out"></a>
	</nav>

  <!--   containar of contents added   -->
	<div class="row">
		<form action="upload_image_data.php" method="post" id="img-form" enctype="multipart/form-data">
			<div class="w3-tooltip col-3" style="margin: 0 30%;" onclick="changeImage()">
		    <image id="image" class="w3-circle w3-margin-top" src="nub_web_images/frozen_flower_2-wallpaper-1366x768.jpg" style="width: 100%; height: 250px;"/>
				<input id="img-input" type="file" name="fileToUpload" class="w3-hide"/>
				<span class="w3-text w3-padding w3-display-middle w3-large w3-border w3-teal">Change Image</span>
			</div>
		</form>

		<!--   profile section added   -->
		<div class="col-6 button-top-margin" style="margin-left: 35%;">
			<h2>Profile</h2>
			<table>
				<tr>
					<td class="w3-padding-top">User Name:</td>
					<td id="name"></td>
				</tr>
				<tr>
					<td class="w3-padding-top">User ID:</td>
					<td id="id"></td>
				</tr>
				<tr id="department-sec">
					<td class="w3-padding-top">User Department:</td>
					<td id="department"></td>
				</tr>
				<tr>
					<td class="w3-padding-top">User Profession:</td>
					<td id="profession"></td>
				</tr>
				<tr>
					<td class="w3-padding-top">User Gender:</td>
					<td id="gender"></td>
				</tr>
				<tr>
					<td class="w3-padding-top">User Contact:</td>
					<td id="contact"></td>
				</tr>
				<tr>
					<td class="w3-padding-top">User Email:</td>
					<td id="email"></td>
				</tr>
				<tr>
					<td class="w3-padding-top">User Address:</td>
					<td id="address"></td>
				</tr>
			</table>
		</div> <!--   profile section ends   -->

		<!--   profile edit section added   -->
		<div class="col-6 button-top-margin" style="margin-left: 35%;">
			<h2>Edit Profile</h2>
			<!--   upload form for pdf file   -->
	    <form action="profile_data.php" method="post">
				<table>
					<tr>
						<td><p>Change Contact:</p></td>
						<td><input name="change-contact" id="change-contact" style="width: 275px;"/></td>
					</tr>
					<tr>
						<td><p>Change Email:</p></td>
						<td><input name="change-email" id="change-email" style="width: 275px;"/></td>
					</tr>
					<tr>
						<td><p>Change Password:</p></td>
						<td><input name="change-password" id="change-password" style="width: 275px;"/></td>
					</tr>
				</table>
				<button class="w3-btn w3-teal" name="change-button" type="submit">Change</button>
			</form>

			<p id="demo"></p>

		</div> <!--   profile edit section ends   -->
	</div> <!--   containar of contents ends   -->

	  <!---    ____________     javascript    _____________     --->

	<script>

	// Script to open and close sidenav
	function w3_open() {
	    document.getElementById("mySidenav").style.display = "block";
	}

	function w3_close() {
	    document.getElementById("mySidenav").style.display = "none";
	}

	/*--   function to change the image   --*/
	function changeImage(){
		var image= document.getElementById('image');
		var input= document.getElementById('img-input');
		input.click();
		input.onchange = function() {
	    document.getElementById("img-form").submit();
		};
	}

	</script>


</body>
</html>

<!-- _________________      PHP    __________________ -->

<?php
	/*-- connect to database --*/
	require 'connect_database.php';

	if($_SESSION["nub-admin-login-check"] == "no"){
		$student = $_SESSION["nub-login-id"];
	}else $student = $_SESSION["nub-admin-login-id"];

	/*--   get profile from profile table   --*/
	$sql1= "SELECT gender, contact, email, address, password, profession FROM profile WHERE user_id= '$student'";
	$result1= $conn->query($sql1);

	if ($result1->num_rows > 0) {
			$row = $result1->fetch_assoc();

			/*-- output data of each row --*/
			if($row){
				$profession= $row["profession"];$gender= $row["gender"]; $contact= $row["contact"];
				$email= $row["email"]; $address= $row["address"]; $password= $row['password']; $department= "";

				/*--   get profile from student, teacher or administrator table   --*/
				if($profession == 'student'){
					$sql2= "SELECT s_name, s_department FROM student WHERE s_id= '$student'";
				}elseif ($profession == 'teacher') {
					$sql2= "SELECT t_name, t_department FROM teacher WHERE t_id= '$student'";
				}elseif ($profession == 'administrator') {
					$sql2= "SELECT admin_name FROM administrator WHERE admin_id= '$student'";
				}

				$result2= $conn->query($sql2);

				if ($result2->num_rows > 0) {
					$row2 = $result2->fetch_assoc();

					if ($profession == 'student') {
						$name= $row2["s_name"]; $department= $row2["s_department"];
					}elseif ($profession == 'teacher') {
						$name= $row2["t_name"]; $department= $row2["t_department"];
					}elseif ($profession == 'administrator') {
						$name= $row2["admin_name"];
					}

					echo "<script>
									document.getElementById('name').innerHTML= '$name' ;
									document.getElementById('id').innerHTML= '$student' ;
									document.getElementById('profession').innerHTML= '$profession' ;
									document.getElementById('gender').innerHTML= '$gender' ;
									document.getElementById('contact').innerHTML= '$contact' ;
									document.getElementById('email').innerHTML= '$email' ;
									document.getElementById('address').innerHTML= '$address' ;

									if('$profession' != 'administrator'){
										document.getElementById('department').innerHTML= '$department' ;
									}else{
										document.getElementById('department-sec').style.display= 'none' ;
									}
								</script>";
				}
			}
	}

	echo "<script>
					/*--   change link of sidenav is 'student'   --*/
					if ('$profession' == 'student') {
						/*--   change links   --*/
						document.getElementById('home').href= 'http://localhost/web_programming/home.php';
						document.getElementById('2nd-page').href= 'http://localhost/web_programming/registration_package.php';
						document.getElementById('3rd-page').href= 'http://localhost/web_programming/course_registration.php';
						document.getElementById('4th-page').href= 'http://localhost/web_programming/result.php';
						document.getElementById('log-out').href= 'http://localhost/web_programming/logout.php';

						/*--   change names   --*/
						document.getElementById('home').innerHTML= 'Home';
						document.getElementById('2nd-page').innerHTML= 'Registration Package';
						document.getElementById('3rd-page').innerHTML= 'Course Registration';
						document.getElementById('4th-page').innerHTML= 'Result';
						document.getElementById('log-out').innerHTML= 'Log out';
					}
					/*--   change link of sidenav is 'teacher'   --*/
					if ('$profession' == 'teacher') {
						/*--   change links   --*/
						document.getElementById('home').href= 'http://localhost/web_programming/teac_home.php';
						document.getElementById('2nd-page').href= 'http://localhost/web_programming/result_submit.php';
						document.getElementById('3rd-page').href= 'http://localhost/web_programming/teac_reg_package.php';
						document.getElementById('log-out').href= 'http://localhost/web_programming/logout.php';

						/*--   change names   --*/
						document.getElementById('home').innerHTML= 'Home';
						document.getElementById('2nd-page').innerHTML= 'Result Submit';
						document.getElementById('3rd-page').innerHTML= 'Registration Package';
						document.getElementById('log-out').innerHTML= 'Log out';
					}
					/*--   change link of sidenav is 'administrator'   --*/
					if ('$profession' == 'administrator') {
						/*--   change links   --*/
						document.getElementById('home').href= 'http://localhost/web_programming/admin_home.php';
						document.getElementById('2nd-page').href= 'http://localhost/web_programming/pac_generate.php';
						document.getElementById('3rd-page').href= 'http://localhost/web_programming/reg_approve.php';
						document.getElementById('4th-page').href= 'http://localhost/web_programming/result_publish.php';
						document.getElementById('5th-page').href= 'http://localhost/web_programming/signup_approve.php';
						document.getElementById('log-out').href= 'http://localhost/web_programming/admin_logout.php';

						/*--   change names   --*/
						document.getElementById('home').innerHTML= 'Home';
						document.getElementById('2nd-page').innerHTML= 'Package Generation';
						document.getElementById('3rd-page').innerHTML= 'Registration Approve';
						document.getElementById('4th-page').innerHTML= 'Result Publish';
						document.getElementById('5th-page').innerHTML= 'SignUp Approve';
						document.getElementById('log-out').innerHTML= 'Log out';
					}
				</script>";

	/*--   get image path from database & display image   --*/
	$sql= "SELECT image_path FROM profile WHERE user_id= '$student'";
	$result= $conn->query($sql);

	if ($result->num_rows > 0) {
		$row= $result->fetch_assoc();
		$path= $row['image_path'];
		if($row){
			echo "<script>
							document.getElementById('image').src= '$path';
						</script>";
		}
	}

	$conn->close();
?>
