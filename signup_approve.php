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
<title>Northern University Bangladesh | SignUp Approve</title>
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
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/pac_generate.php">Package Genaration</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/reg_approve.php">Registration Approve</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/result_publish.php">Result publish</a></li>
      <li class="w3-blue"><a href="#">SignUp Approve</a></li>
		</ul>
		<!-- collapsable menu bar for short screen -->
		<div id="coll-menu" class="w3-hide">
		  <ul class="w3-navbar w3-left-align w3-large w3-light-grey">
				<li><a href="http://localhost/web_programming/admin_home.php">Home</a></li>
		    <li><a href="http://localhost/web_programming/pac_generate.php">Package Generation</a></li>
        <li><a href="http://localhost/web_programming/reg_approve.php">Registration Approve</a></li>
        <li><a href="http://localhost/web_programming/result_publish.php">Result Publish</a></li>
				<li><a href="http://localhost/web_programming/admin_logout.php">Log out&nbsp&nbsp&nbsp<i class="fa fa-sign-out"></i></a>
				</li>
		  </ul>
		</div> <!-- collapsable menu bar for short screen ends -->
	</div> <!-- main menu ends -->

	<!-- containar of contents section -->
	<div class="row w3-padding-xlarge">

		<!--   student login list table added   -->
		<div>
	    <h1 style="font-weight: bold;">Student Sign-up</h1>
			<!-- responsive table added -->
			<div style="overflow-x:auto;">
		    <table id="student-list" class="w3-table-all w3-hoverable">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Department</th>
						<th>Batch</th>
					</tr>
		    </table>
			</div> <!-- responsive table ends -->

			<h1>Approve</h1>Enter student id:</br>
			<input id="approve-student"></input>
			<button class="w3-btn w3-dark-grey" style="margin: 1.5% 0 1.5% 1.5%;" id="s-approve-button">Approved</button>
			<button class="w3-btn w3-dark-grey" style="margin: 1.5% 0 1.5% 1.5%;" id="s-cancel-button">Not Approved</button>
		</div> <!--   student login list table ends   -->

		<!--   teacher login list table added   -->
		<div style="margin-top: 5%;">
	    <h1 style="font-weight: bold;">Teacher Sign-up</h1>
			<!-- responsive table added -->
			<div style="overflow-x:auto;">
		    <table id="teacher-list" class="w3-table-all w3-hoverable">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Department</th>
						<th>Joining Date</th>
					</tr>
		    </table>
			</div> <!-- responsive table ends -->

			<h1>Approve</h1>Enter teacher id:</br>
			<input id="approve-teac"></input>
			<button class="w3-btn w3-dark-grey" style="margin: 1.5% 0 1.5% 1.5%;" id="t-approve-button">Approved</button>
			<button class="w3-btn w3-dark-grey" style="margin: 1.5% 0 1.5% 1.5%;" id="t-cancel-button">Not Approved</button>
		</div> <!--   teacher login list table ends   -->

	</div> <!-- containar of contents section ends --> <p id="demo"></p>

	<!--pagination added-->
	<div class="w3-center w3-padding-32" style="margin-top: 11%;">
		<ul class="w3-pagination">
			<li><a class="w3-hover-black" href="http://localhost/web_programming/result_publish.php"><i class="fa fa-angle-double-left"></i></a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/admin_home.php">1</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/pac_generate.php">2</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/reg_approve.php">3</a></li>
      <li><a class="w3-hover-black" href="http://localhost/web_programming/result_publish.php">4</a></li>
      <li><a class="w3-black" href="#">5</a></li>
		</ul>
	</div>

	<!-- footer added -->
	<?php require 'footer.php';?>

  <!---    ____________     javascript    _____________     --->

<script>
	var addCount= 0;

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

	/*-- funtion for add row in course registration table --*/
	function addRow(id, name, department, day, profession){
			if (profession == 'student') {
				var table = document.getElementById("student-list");
			}else if (profession == 'teacher') {
				var table = document.getElementById("teacher-list");
			}

			/*--  create a row & add eventlistener to each row  --*/
			var row= document.createElement("tr");
			table.appendChild(row);
			row.addEventListener('click', getId);

			/*-- insert cell to table --*/
			var rowData = {id: row.insertCell(-1), name: row.insertCell(-1), department: row.insertCell(-1), day: row.insertCell(-1)};

			/*-- insert value to table --*/
			rowData.id.innerHTML = id;
			rowData.name.innerHTML = name;
			rowData.department.innerHTML = department;
			rowData.day.innerHTML = day;
	}

	/*--   function to get id from 'student' table to input field when clickin on row   --*/
	function getId(){
		var id= this.cells[0].innerHTML;
		if(this.parentNode.id == 'student-list'){
			document.getElementById('approve-student').value= id;
		}else if (this.parentNode.id == 'teacher-list') {
			document.getElementById('approve-teac').value= id;
		}
	}

	/*--   add event listener to "student approve" button   --*/
	document.getElementById('s-approve-button').addEventListener('click', signupApprove);

	/*--   add event listener to "student cancel" button   --*/
	document.getElementById('s-cancel-button').addEventListener('click', signupApprove);

	/*--   add event listener to "teacher approve" button   --*/
	document.getElementById('t-approve-button').addEventListener('click', signupApprove);

	/*--   add event listener to "teacher cancel" button   --*/
	document.getElementById('t-cancel-button').addEventListener('click', signupApprove);

	/*--   function to call the server to approve of corresponding id of a student or teacher when button pressed  --*/
	function signupApprove(){

		/*--   know which button clicked   --*/
		var button= this.innerHTML;

		/*--   get the value of text field   --*/
		if(this.id == 's-approve-button' || this.id == 's-cancel-button'){
			var inputElement= document.getElementById('approve-student');
			var profession= 'student';
		}else if (this.id == 't-approve-button' || this.id == 't-cancel-button') {
			var inputElement= document.getElementById('approve-teac');
			var profession= 'teacher';
		}

		var inputValue= '["' + inputElement.value + '","' + button + '","' + profession + '"]';
		/*--   remove spaces   --*/
		inputValue= inputValue.replace(/\s+/g,'');

		/*--   server request   --*/
		var xmlhttp = new XMLHttpRequest();
		var url = "http://localhost/web_programming/signup_approve_data.php?q=";

		xmlhttp.onreadystatechange=function() {
				if (this.readyState == 4 && this.status == 200) {
					location.reload();
				}
		}
		xmlhttp.open("GET", url+inputValue, true);
		xmlhttp.send();
	}

</script>

</body>
</html>

<!--   _________________     PHP     ____________________     -->

<?php
	/*-- connect to database --*/
	require 'connect_database.php';

	/*--   get unverified signup list from database   --*/
	require 'fetch_all.php';

	if ($resultVerify->num_rows > 0) {
	    // output data of each row
	    for($i= 0; $i< $resultVerify->num_rows; $i++) {

				$id= $rowVerify[$i]['user_id']; $name= $row['name']; $department= $row['department']; $batch= $row['batch'];
				$joinDate= $row['joining_date']; $profession= $row['profession'];

				/*--   add row to sign-up list   --*/
	      echo "<script>
								if('$profession' == 'student'){
									addRow('$id', '$name', '$department', '$batch', '$profession');
								}else if('$profession' == 'teacher'){
									addRow('$id', '$name', '$department', '$joinDate', '$profession');
								}
							</script>";
	    }
	}

	$conn->close();
?>
