<?php
session_start();
if ($_SESSION["nub-login-check"] != "yes") {
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
<title>Northern University Bangladesh | Result</title>
</head>
<style>

	.w3-container a{
		text-decoration: none;
	}

</style>

<body>
	<!-- logo added -->
	<div class="w3-container" >
		<img class="w3-left" src="nub_web_images/logo_nub.png"/>
		<li class="w3-right w3-dropdown-hover">
		  <a  class="w3-xlarge hide-medium hide-small show-large" href="javascript:void(0)"><i class="fa fa-user"></i></a>
		  <div class="w3-dropdown-content w3-border w3-card-4 w3-center" style="left:-100px;">
		    <a href="http://localhost/web_programming/profile.php">Profile</a>
		    <a href="http://localhost/web_programming/logout.php">Log Out</a>
		  </div>
		</li>
	</div>

	<!-- main menu added -->
	<div class=" w3-large w3-red w3-padding-large">
		<ul class="w3-navbar">
			<li class="hide-large w3-light-grey w3-opennav w3-right">
		    <a href="javascript:void(0);" onclick="myFunction()">☰</a>
		  </li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/home.php">Home</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/registration_package.php">Registration Package</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/course_registration.php">Course Registration</a></li>
			<li><a class="w3-blue" href="">Result</a></li>
		</ul>
		<!-- collapsable menu bar for short screen -->
		<div id="coll-menu" class="w3-hide">
		  <ul class="w3-navbar w3-left-align w3-large w3-light-grey">
				<li><a href="http://localhost/web_programming/home.php">Home</a></li>
		    <li><a href="http://localhost/web_programming/registration_package.php">Registration Package</a></li>
		    <li><a href="http://localhost/web_programming/course_registration.php">Course Registration</a></li>
				<li><a href="http://localhost/web_programming/logout.php">Log out&nbsp&nbsp&nbsp<i class="fa fa-sign-out"></i></a>
				</li>
		  </ul>
		</div> <!-- collapsable menu bar for short screen ends -->
	</div> <!-- main menu ends -->

	<!-- containar of contents section -->
	<div class="row">
		<!-- result content added -->
		<div class="w3-padding-xlarge" id="content-container">
			<h1>See result of the semester</h1>
			<hr>

			<!-- rules of providing result, paragraph added -->
			<i class="fa fa-bullhorn"></i><p>This page will show you the results of the courses that you have completed.
				Choose the semester from the dropdown box of which you want to see the result.
			</p>
			<i class="fa fa-bullhorn"></i><p>The table will show the result of coresponding courses registered in that selected semester.
				If you did not attend final exam result will show 'X'.
			</p>
			<i class="fa fa-bullhorn"></i><p>Please keep a hard copy or screenshot of this result, for further inquery.
			</p> <!-- rules of providing result, paragraph ends -->
			<hr style="margin-bottom: 5%;">  <p id="demo"></p>

			<!-- table of result -->
			<div class="w3-container w3-card-4" style="margin-bottom: 5%; padding-bottom: 3%;">
				<h2 style="margin-bottom: 3%;" id="table-head">Result:</h2>

				<!-- responsive table added -->
				<div style="overflow-x:auto;">
					<table class="w3-table w3-teal" id="result-table" style="margin-bottom: 3%;">
						<tr>
				      <th></th>
				      <th>Course Code</th>
				      <th>Course Name</th>
							<th>Credit</th>
							<th>Grade Point</th>
							<th>Grade</th>
							<th>Semester</th>
				    </tr>
					</table>
					<button class="w3-btn w3-teal w3-right" style="" id="show-button">Show</button>
				</div> <!-- responsive table added -->

			</div><!-- table of result ends --> <p id="demo"></p>
			<p style="font-weight: bold; font-style: italic; float: left;">Total completed credit hours:&nbsp&nbsp&nbsp<span id="credit-complete">0</span></br>
				[This credit hr. include all courses from 1'st semester and all retake courses.]
			</p>
		</div> <!-- result content ends -->

		<!--right side navigation panel-->
		<?php require 'side_navigation.php';?>

	</div> <!-- containar of contents section ends -->

	<!--pagination added-->
	<div class="w3-center w3-padding-32" style="margin-top: 11%;">
		<ul class="w3-pagination">
			<li><a class="w3-hover-black" href="http://localhost/web_programming/course_registration.php"><i class="fa fa-angle-double-left"></i></a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/home.php">1</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/registration_package.php">2</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/course_registration.php">3</a></li>
			<li><a class="w3-black" href="">4</a></li>
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
		function addRow(id, name, credit, gradePoint, grade, semester){
				addCount= addCount + 1;

				var table = document.getElementById("result-table");
				var row = table.insertRow(addCount);
				/*-- insert cell to table --*/
				var rowData = {rowNumber: row.insertCell(-1), courseCode: row.insertCell(-1), courseName: row.insertCell(-1),
												credit: row.insertCell(-1), gradePoint: row.insertCell(-1), grade: row.insertCell(-1), semester: row.insertCell(-1)};

				/*--   insert value to table   --*/
				rowData.rowNumber.innerHTML = addCount;
				rowData.courseCode.innerHTML = id;
				rowData.courseName.innerHTML = name;
				rowData.credit.innerHTML = credit;
				rowData.gradePoint.innerHTML = gradePoint;
				rowData.grade.innerHTML = grade;
				rowData.semester.innerHTML = semester;
		}

		/*--   add event listener to "add" button   --*/
		document.getElementById('show-button').addEventListener('click', semResult);

		/*--   function to call the server to get result when "show" button pressed   --*/
		function semResult(){

			/*--   delete previous data from table when show button clicked again   --*/
			addCount= 0;

			var tb = document.getElementById('result-table');
			while(tb.rows.length > 2) {
				tb.deleteRow(1);
			}

			/*--   sever request   --*/
			var xmlhttp = new XMLHttpRequest();
			var url = "http://localhost/web_programming/result_data.php?q=";

			xmlhttp.onreadystatechange=function() {
			    if (this.readyState == 4 && this.status == 200) {
			        addResult(this.responseText);  /*--   call function to add result in table   --*/
			    }
			}

			/*--   request   --*/
			xmlhttp.open("GET", url, true);
			xmlhttp.send();
		}

		/*--   function to put selected option to table   --*/
		function addResult(response) {

			/*--   parse the server response   --*/
	    var arr = JSON.parse(response);

	    for(i = 0; i < arr.length; i++) {
				/*--   add semester results to table from database   --*/
				addRow(arr[i].c_id, arr[i].c_name, arr[i].c_credit, arr[i].g_point, arr[i].grade, arr[i].semester);
	    }
		}

	</script>

</body>
</html>

<!-- _________________      PHP    __________________ -->

<?php
	/*-- connect to database --*/
	require 'connect_database.php';

	$student = $_SESSION["nub-login-id"];

	/*--   get total completed credit hours from database   --*/
	require 'fetch_all.php';

	if ($resultId->num_rows > 0) {
			$totalCompCredit= 0;

			/*-- output data of each row --*/
			for($i= 0; $i< $resultId->num_rows; $i++){

				$comCredit= $rowId[$i]["c_credit"];
				$totalCompCredit+= (int)$comCredit;
			}
			echo "<script>
							document.getElementById('credit-complete').innerHTML= '$totalCompCredit' ;
						</script>";
	}

	$conn->close();
?>
