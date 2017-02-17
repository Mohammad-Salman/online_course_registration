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
<title>Northern University Bangladesh | Course Registration</title>
<style>

</style>
</head>

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
	<div class="w3-large w3-red w3-padding-large">
		<ul class="w3-navbar">
			<li class="hide-large w3-light-grey w3-opennav w3-right">
		    <a href="javascript:void(0);" onclick="myFunction()">☰</a>
		  </li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/home.php">Home</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/registration_package.php">Registration Package</a></li>
			<li><a class="w3-blue" href="">Course Registration</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/result.php">Result</a></li>
		</ul>
		<!-- collapsable menu bar for short screen -->
		<div id="coll-menu" class="w3-hide">
		  <ul class="w3-navbar w3-left-align w3-large w3-light-grey">
				<li><a href="http://localhost/web_programming/home.php">Home</a></li>
		    <li><a href="http://localhost/web_programming/registration_package.php">Registration Package</a></li>
		    <li><a href="http://localhost/web_programming/result.php">Result</a></li>
				<li><a href="http://localhost/web_programming/logout.php">Log out&nbsp&nbsp&nbsp<i class="fa fa-sign-out"></i></a>
				</li>
		  </ul>
		</div> <!-- collapsable menu bar for short screen ends -->
	</div> <!-- main menu ends -->

	<!-- containar of contents section -->
	<div class="row">
		<!-- registration form added -->
		<div class="w3-padding-xlarge" id="content-container">
			<h1>Online Registration</h1>
			<hr>

			<!-- rules of registration, paragraph added -->
			<i class="fa fa-bullhorn"></i><p>Before procced to add courses to do registration for next semester. You need to check properly
				your registration package for any overlapping. There should not be any classes or exams that overlap
				with other classes or exams you have added.
			</p>
			<i class="fa fa-bullhorn"></i><p>You can add maximum 15 credits and minimum 8 credits. So, check your total credit hours when
				you add a course in the below table.
			</p>
			<i class="fa fa-bullhorn"></i><p>You can not add or remove any courses from here, after the deadline of registration for next
				semester has past.
			</p>
			<i class="fa fa-bullhorn"></i><p>You must confirm your registration of the courses that you are adding here, by paying 40% fee of
				the semester which is you are registering for, within the deadline provided. If you can not confirm, your registration
				will be canceled automatically.
			</p> <!-- rules of registration, paragraph ends -->
			<hr>

			<!-- semester name -->
			<div style="margin-bottom: 5%;">
				<h1 id="sem-name">Semester name</h1>
				<h3 id="reg-time-section"></h3>
			</div>

			<!--  reg 'status' message  -->
			<h3 id="reg-status"></h3>

			<!-- dropdown box to add courses -->
			<div class="w3-container w3-card-4" style="margin-bottom: 5%;" id="dropdown-box">
			  <h2>Choose your course from dropdown box and click "Add"</h2>
				<div>
				  <select class="w3-select" name="option" id="dropdown-option" style="width: 100%;">
				    <option disabled selected>Choose your course</option>
				  </select>
				</div>

			  <button class="w3-btn w3-teal w3-right" style="margin: 1.5% 0;" id="add-button">Add</button>
			</div>

				<!-- table of added courses -->
				<div class="w3-container w3-card-4" style="margin-bottom: 5%;" id="table-section">
					<h2 style="margin-bottom: 3%;" id="table-head">Selected courses:</h2>

					<!-- responsive table added -->
					<div style="overflow-x:auto;">
						<table class="w3-table w3-teal" id="course-registration-table">
							<tr>
					      <th></th>
					      <th>Course Code</th>
					      <th>Course Name</th>
								<th>Credit</th>
								<th>Section</th>
								<th>Status</th>
					    </tr>
						</table>
					</div> <!-- responsive table ends -->

				<div style="padding-bottom: 9%;">
					<p style="font-weight: bold; float: left;">Total added credit hours:&nbsp&nbsp&nbsp<span id="total-credit">0</span></p>
					<button id= "cancel" class="w3-btn w3-teal w3-right" style="margin: 1.5% 0;" onclick="location.reload()">Cancel</button>
					<button id= "submit" class="w3-btn w3-teal w3-right w3-margin-right" style="margin: 1.5% 0;">Submit</button>
				</div> <!-- table of added courses ends -->
			</div>  <p id="demo"></p>

		</div> <!--registration form ends -->

		<!--right side navigation panel-->
		<?php require 'side_navigation.php';?>

	</div> <!-- containar of contents section ends-->

	<!--pagination added-->
	<div class="w3-center w3-padding-32" style="margin-top: 11%;">
		<ul class="w3-pagination">
			<li><a class="w3-hover-black" href="http://localhost/web_programming/registration_package.php"><i class="fa fa-angle-double-left"></i></a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/home.php">1</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/registration_package.php">2</a></li>
			<li><a class="w3-black" href="">3</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/result.php">4</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/result.php"><i class="fa fa-angle-double-right"></i></a></li>
		</ul>
	</div>

	<!-- footer added -->
	<?php require 'footer.php';?>

	<!---    ____________     javascript    _____________     --->

	<script>
		var addCount= 0, totalCredit= 0, output= "", available;

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
		function addRow(id, name, credit, section, status){
				addCount= addCount + 1;

				/*-- calulate total credit --*/
				totalCredit= parseInt(totalCredit) + parseInt(credit);

				var table = document.getElementById("course-registration-table");
				var row = table.insertRow(addCount);
				/*-- insert cell to table --*/
				var rowData = {rowNumber: row.insertCell(-1), courseCode: row.insertCell(-1), courseName: row.insertCell(-1),
												credit: row.insertCell(-1), section: row.insertCell(-1), status: row.insertCell(-1)};

				/*-- insert value to table --*/
				rowData.rowNumber.innerHTML = addCount;
				rowData.courseCode.innerHTML = id;
				rowData.courseName.innerHTML = name;
				rowData.credit.innerHTML = credit;
				rowData.section.innerHTML = section;
				rowData.status.innerHTML = status;
				/*-- display total credit --*/
				document.getElementById("total-credit").innerHTML = totalCredit;
		}

		/*--   add event listener to "add" button   --*/
		document.getElementById('add-button').addEventListener('click', courseList);

		/*--   function to call the server to get course list when add button pressed  --*/
		function courseList(){

			/*--   check the value of selected option   --*/
			var dropdownElement= document.getElementById('dropdown-option');
			var selectedOption= dropdownElement.options[dropdownElement.selectedIndex].value;
			/*--   remove spaces   --*/
			selectedOption= selectedOption.replace(/\s+/g,'');

			/*--   get code from selected option   --*/
			var codeIndexFirst= selectedOption.indexOf("[");
			var codeIndexSecond= selectedOption.indexOf("]");
			var courseCode= '{"code":"'+selectedOption.slice(codeIndexFirst+1, codeIndexSecond)+'"}';

			/*--   server request   --*/
			var xmlhttp = new XMLHttpRequest();
			var url = "http://localhost/web_programming/offered_courses_data.php?q=";

			xmlhttp.onreadystatechange=function() {
			    if (this.readyState == 4 && this.status == 200) {
			        checkSeat(this.responseText);  /*--   call function to add courses in table   --*/
			    }
			}
			xmlhttp.open("GET", url+courseCode, true);
			xmlhttp.send();
		}

		/*--   function to put selected option to table   --*/
		function addCourse(id, name, credit, section) {

				/*--   add selected course to table from database   --*/
				if((totalCredit+parseInt(credit)) <= 15){
					addRow(id, name, credit, section, "Added");

					/*--   get added courses to insert in database   --*/
					if(output==""){
						output += '[';
					}else{
						output += ',';
					}
					output += '{"id":"'+id+'", "name":"'+name+'", "credit":"'+credit+'", "status":"pending"}';
				}else if (totalCredit+parseInt(arr[i].credit) > 15) {
					document.getElementById("total-credit").innerHTML = "Over 15 credit hours is not allowed !!!";
				}
		}

		/*--   function to check total registration of selected course  --*/
		function checkSeat(response){
			/*--   parse the server response   --*/
	    var arr = JSON.parse(response);
			var courseId= '{"code":"'+arr[0].c_id+'"}';

			/*--   server request   --*/
			var xmlhttp = new XMLHttpRequest();
			var url = "http://localhost/web_programming/check_seat_data.php?q=";

			xmlhttp.onreadystatechange=function() {
			    if (this.readyState == 4 && this.status == 200) {
						if(this.responseText == 'available'){
							addCourse(arr[0].c_id, arr[0].c_name, arr[0].c_credit, arr[0].section);
						}else alert("Sorry sit is not available for that course");
			    }
			}
			xmlhttp.open("GET", url+courseId, true);
			xmlhttp.send();
		}

		/*--   add event listener to "submit" button   --*/
		document.getElementById('submit').addEventListener('click', regCourse);

		/*--   function to call the server to "insert" courses to database when "submit" button pressed  --*/
		function regCourse(){
			output += "]";

			/*--   sever request   --*/
			if(totalCredit >= 8)var xmlhttp = new XMLHttpRequest();
			else document.getElementById("total-credit").innerHTML = "Less then 8 credit hours is not allowed !!!";
			var url = "http://localhost/web_programming/insert_reg_courses_data.php?q=";

			xmlhttp.onreadystatechange=function() {
			    if (this.readyState == 4 && this.status == 200) {
						if(this.responseText=="Unable to registration !"){
							document.getElementById("table-head").innerHTML= this.responseText;
						}else location.reload();
			    }
			}
			xmlhttp.open("GET", url + output, true);
			xmlhttp.send();
		}

		/*--   function to disable boxes   --*/
		function disable(){
			/*--   disable dropdown options & buttons   --*/
			document.getElementById('dropdown-box').style.display= 'none';
			document.getElementById('submit').style.display= 'none';
			document.getElementById('cancel').style.display= 'none';

			/*--   modify table text   --*/
			document.getElementById('table-head').innerHTML= 'Registered courses:';
		}

	</script>

</body>
</html>

	<!-- _________________      PHP    __________________ -->

	<?php
	/*-- connect to database --*/
	require 'connect_database.php';

		$student_id= $_SESSION['nub-login-id']; // get student id

		/*--   get timeline from database   --*/
		require 'fetch_all.php';
		$date= date("Y-m-d");

		/*--  set semester name on page   --*/
		echo "<script>
						document.getElementById('sem-name').innerHTML= '$timeline_sem';
						if('$date' <= '$reg_end'){
							document.getElementById('reg-time-section').style.display= 'block';
							document.getElementById('reg-time-section').innerHTML= 'Registration time: '+'( '+'$reg_start' + ' ) to ( ' + '$reg_end'+ ' )';
						}else if('$date' <= '$reg_confirm_date'){
							document.getElementById('reg-time-section').style.display= 'block';
							document.getElementById('reg-time-section').innerHTML= 'Resistration confirm last date: '+'( '+'$reg_confirm_date' + ' )';
						}else if('$date' > '$reg_confirm_date'){
							document.getElementById('reg-time-section').style.display= 'none';
						}
					</script>";

		/*--   if reg time is not expired, get registered courses from database & display   --*/
		if ($resultRegSemester->num_rows > 0) {
				$rowCount= 0; $totalCredit= 0; $pending= 0;

				/*-- output data of each row --*/
				for($i= 0; $i< $resultRegSemester->num_rows; $i++) {

					/*-- check if there is pending --*/
					if($rowRegSemester[$i]['status'] == "pending")
						$pending++;
				}

				/*--   get only "pending" courses & display : if reg time exists but reg is done   --*/
				if ($date <= $result_publish && ($pending != 0)) {
					$rowCount= 0; $totalCredit= 0;

					/*-- output data of each row --*/
					for($i= 0; $i< $resultRegSemester->num_rows; $i++) {

						/*-- copy registered courses from array to varriable to use them is javascript --*/
					  $cId= $rowRegSemester[$i]['c_id']; $cName= $rowRegSemester[$i]['c_name']; $cCredit= $rowRegSemester[$i]['c_credit'];
						$status= $rowRegSemester[$i]['status']; $sId= $rowRegSemester[$i]['s_id'];

						if($status == "pending"){
							/*-- add total credit --*/
							$totalCredit= $totalCredit+$cCredit;

							/*-- insert registered courses in table from database --*/
							echo "<script>
											addRow('$cId', '$cName', '$cCredit', 'A', 'Pending', '$totalCredit');
										</script>";
						}
					}

					/*-- modify table text & disable dropdown box, buttons --*/
					echo "<script>
									disable();
									document.getElementById('total-credit').innerHTML= '$totalCredit';
								</script>";
				}else if($date > $result_publish){   /*--  get "reg" or "pending" courses : if reg time is over  --*/

					$rowCount= 0; $totalCredit= 0;

					/*-- output data of each row --*/
					for($i= 0; $i< $resultRegSemester->num_rows; $i++) {

						/*-- copy registered courses from array to varriable to use them is javascript --*/
					  $cId= $rowRegSemester[$i]['c_id']; $cName= $rowRegSemester[$i]['c_name']; $cCredit= $rowRegSemester[$i]['c_credit'];
						$status= $rowRegSemester[$i]['status']; $sId= $rowRegSemester[$i]['s_id'];

						if($status == "reg")$status= "Registered";
						else $status= "Pending";

						/*-- add total credit --*/
						$totalCredit= $totalCredit+$cCredit;

						/*-- insert registered courses in table from database --*/
						echo "<script>
										addRow('$cId', '$cName', '$cCredit', 'A', '$status', '$totalCredit');
									</script>";
					}

					/*-- modify table text & disable dropdown box, buttons --*/
					echo "<script>
									disable();
									document.getElementById('total-credit').innerHTML= '$totalCredit';
								</script>";
				}
		}else if($date > $reg_confirm_date){
			echo "<script>
							disable();
							document.getElementById('table-section').style.display= 'none';
							document.getElementById('reg-status').innerHTML= 'Registration has been canceled!';
						</script>";
		}else if($date > $reg_end){
			echo "<script>
							disable();
							document.getElementById('table-section').style.display= 'none';
							document.getElementById('reg-status').innerHTML= 'Time for registration is over!';
						</script>";
		}

		/*--   get offered courses from database & add to dropdown box   --*/

		if ($resultOffCourses->num_rows > 0) {
				/*-- output data of each row --*/
				for($i= 0; $i< $resultOffCourses->num_rows; $i++) {

					/*-- copy offered courses from array to vaiable to use them in javascript --*/
					$ocId= $rowOffCourses[$i]['c_id']; $ocName= $rowOffCourses[$i]['c_name']; $ocCredit= $rowOffCourses[$i]['c_credit'];
					$osection= $rowOffCourses[$i]['section'];

					/*-- add options to dropdownbox --*/
					echo "<script>
									/*-- add options to dropdown-box --*/
									var select= document.getElementById('dropdown-option');
									var option= document.createElement('option');
									option.text= 'Code: '+'[$ocId] >>'+'Course name: '+'[$ocName] >>'+'Credit: '+'[$ocCredit] >>'+
																'Section: '+'[$osection]';
									select.add(option);
								</script>";
				}
		}

		$conn->close();
	?>
