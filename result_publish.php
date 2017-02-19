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
<title>Northern University Bangladesh | Result Publish</title>
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
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/admin_login.php">Home</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/pac_generate.php">Package Genaration</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/reg_approve.php">Registration Approve</a></li>
			<li class="w3-blue"><a href="#">Result publish</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/signup_approve.php">SignUp Approve</a></li>
		</ul>
		<!-- collapsable menu bar for short screen -->
		<div id="coll-menu" class="w3-hide">
		  <ul class="w3-navbar w3-left-align w3-large w3-light-grey">
				<li><a href="http://localhost/web_programming/admin_home.php">Home</a></li>
		    <li><a href="http://localhost/web_programming/pac_generate.php">Package Generation</a></li>
		    <li><a href="http://localhost/web_programming/reg_approve.php">Registration Approve</a></li>
				<li><a href="http://localhost/web_programming/signup_approve.php">SignUp Approve</a></li>
				<li><a href="http://localhost/web_programming/admin_logout.php">Log out&nbsp&nbsp&nbsp<i class="fa fa-sign-out"></i></a>
				</li>
		  </ul>
		</div> <!-- collapsable menu bar for short screen ends -->
	</div> <!-- main menu ends -->

	<!-- containar of contents section -->
	<div class="row w3-padding-xlarge">
		<!--   date(text) of registration and result publish added  -->
		<h1><b id="reg-semester"></b></h1>
		<h2>Registration starts at: <span id="start-text" style="font-style: oblique;"></span></br>
				Registration ends at: <span id="end-text" style="font-style: oblique;"></span></br>
				Registration confirmation ends at: <span id="confirm-text" style="font-style: oblique;"></span>
		</h2>

		<!--   result publish button added  -->
    <h1 style="margin-top: 50px;"><b>Result Publish</b></h1>
		<p>Result publish date is <span id="result-date-text" style="font-style: oblique; font-weight: bold;"></span>.
		</br>To publish result click 'Publish' button.</p>
		<button class="w3-btn w3-dark-grey" style="margin: 1.5% 0;" id="publish-button">Publish</button>

		<!--   timeline input added   -->
		<h1 style="margin-top: 50px;"><b>Set Timeline</b></h1>

		<!--   reg start date input added  -->
		<h2>Resistration Start</h2>
		<input id="start-input" type="date">
		<!--   reg end date input added  -->
		<h2>Registration End</h2>
		<input id="end-input" type="date" value="">
		<!--   result publish date input added  -->
		<h2>Result Publish Date</h2>
		<input id="result-input" type="date" value=""></br>
		<!--   reg confirm date input added   -->
		<h2>Registration confirm Last Date</h2>
		<input id="reg-confirm-input" type="date" value=""></br>
		<button class="w3-btn w3-dark-grey" style="margin: 1.5% 0%;" id="date-button">Set Date</button>
	</div> <!-- containar of contents section ends --> <p id="demo"></p>

	<!--   pagination added   -->
	<div class="w3-center w3-padding-32" style="margin-top: 11%;">
		<ul class="w3-pagination">
			<li><a class="w3-hover-black" href="http://localhost/web_programming/reg_approve.php"><i class="fa fa-angle-double-left"></i></a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/admin_home.php">1</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/pac_generate.php">2</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/reg_approve.php">3</a></li>
			<li><a class="w3-black" href="">4</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/signup_approve.php">5</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/signup_approve.php"><i class="fa fa-angle-double-right"></i></a></li>
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

	/*--   add event listener to "date-button"   --*/
	document.getElementById('date-button').addEventListener('click', setDate);

	function setDate(){

		/*--   get date inputs   --*/
		var start= document.getElementById('start-input').value;
		var end= document.getElementById('end-input').value;
		var publishDate= document.getElementById('result-input').value;
		var confirmDate= document.getElementById('reg-confirm-input').value;
		var regSemester;

		/*--   get the semester name for registration   --*/
		var d = new Date();
		var month = d.getMonth();
		var year = d.getFullYear();
 		if(month == 11){
			year += 1;
			regSemester= "Spring " + year;
		}else if (month == 7) {
			regSemester= "Fall " + year;
		}else if (month == 3) {
			regSemester= "Summer " + year;
		}

		/*--   make a string for array   --*/
		var arr= '{"start":"' + start + '","end":"' + end + '","publishDate":"' + publishDate + '","confirmDate":"'+ confirmDate + '","reg_semester":"' + regSemester + '"}';

		/*--   sever request   --*/
		var xmlhttp = new XMLHttpRequest();
		var url = "http://localhost/web_programming/insert_date.php?q=";

		xmlhttp.onreadystatechange=function() {
				if (this.readyState == 4 && this.status == 200) {
						location.reload();
				}
		}
		xmlhttp.open("GET", url+arr, true);
		xmlhttp.send();
	}

  /*--   add event listener to "publish-button"   --*/
	document.getElementById('publish-button').addEventListener('click', publishResult);

	function publishResult(){
		/*--   sever request   --*/
		var xmlhttp = new XMLHttpRequest();
		var url = "http://localhost/web_programming/result_publish_data.php";

		xmlhttp.onreadystatechange=function() {
				if (this.readyState == 4 && this.status == 200) {
						document.getElementById('demo').innerHTML= this.responseText;
				}
		}
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
</script>

</body>
</html>

<!-- _________________      PHP    __________________ -->

<?php
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

	/*--   get timeline from database   --*/
	require 'fetch_all.php';

	if ($resultTimeline->num_rows > 0) {
		/*-- display timeline --*/

			echo "<script>
							document.getElementById('reg-semester').innerHTML= '$timeline_sem';
							document.getElementById('start-text').innerHTML= '$reg_start';
							document.getElementById('end-text').innerHTML= '$reg_end';
							document.getElementById('confirm-text').innerHTML= '$reg_confirm_date';
							document.getElementById('result-date-text').innerHTML= '$result_publish';
						</script>";
	}

	$conn->close();
?>
