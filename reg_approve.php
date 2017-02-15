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
<title>Northern University Bangladesh | Registration Approve</title>
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
			<li class="w3-blue"><a href="#">Registration Approve</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/result_publish.php">Result publish</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/signup_approve.php">SignUp Approve</a></li>
		</ul>
		<!-- collapsable menu bar for short screen -->
		<div id="coll-menu" class="w3-hide">
		  <ul class="w3-navbar w3-left-align w3-large w3-light-grey">
				<li><a href="http://localhost/web_programming/admin_home.php">Home</a></li>
		    <li><a href="http://localhost/web_programming/pac_generate.php">Package Generation</a></li>
        <li><a href="http://localhost/web_programming/result_publish.php">Result Publish</a></li>
				<li><a href="http://localhost/web_programming/signup_approve.php">SignUp Approve</a></li>
				<li><a href="http://localhost/web_programming/admin_logout.php">Log out&nbsp&nbsp&nbsp<i class="fa fa-sign-out"></i></a>
				</li>
		  </ul>
		</div> <!-- collapsable menu bar for short screen ends -->
	</div> <!-- main menu ends -->

	<!-- containar of contents section -->
	<div class="row w3-padding-xlarge">
    <h1><b>Registration List</b></h1>

		<!-- responsive table added -->
		<div style="overflow-x:auto;">
	    <table id="student-list" class="w3-table-all w3-hoverable">
				<tr>
					<th>No.</th>
					<th>Student ID</th>
					<th>Total cr.</th>
					<th>Payed amount</th>
				</tr>
	    </table>
		</div> <!-- responsive table ends -->

		<h1>Approve Registration</h1>Enter student id:</br>
		<input id="approve-id"></input>
		<button class="w3-btn w3-dark-grey" style="margin: 1.5% 0 1.5% 1.5%;" id="approve-button">Register</button>
		<button class="w3-btn w3-dark-grey" style="margin: 1.5% 0 1.5% 1.5%;" id="reg-cancel-button">Registration Cancel</button>

		<!--   teachers course registration panel   -->
		<h1 style="margin-top: 5%;"><b>Teachers registration approve:</b></h1>
		Enter course code:</br>
		<input id="code-input"></br></br>
		Select teacher:</br>
		<select class="w3-select w3-dark-grey" name="option" id="dropdown-option">
			<option value="" disabled selected>Choose your course</option>
		</select>
		<button class="w3-btn w3-dark-grey" style="margin: 1.9% 0%;" id="teac-approve-button">Register</button>

	</div> <!-- containar of contents section ends --> <p id="demo"></p>

	<!--pagination added-->
	<div class="w3-center w3-padding-32" style="margin-top: 11%;">
		<ul class="w3-pagination">
			<li><a class="w3-hover-black" href="http://localhost/web_programming/pac_generate.php"><i class="fa fa-angle-double-left"></i></a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/admin_home.php">1</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/pac_generate.php">2</a></li>
			<li><a class="w3-black" href="#">3</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/result_publish.php">4</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/signup_approve.php">5</a></li>
      <li><a class="w3-hover-black" href="http://localhost/web_programming/result_publish.php"><i class="fa fa-angle-double-right"></i></a></li>
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
	function addRow(id, credit, amount){
			addCount= addCount + 1;

			var table = document.getElementById("student-list");

			/*--  create a row & add eventlistener to each row  --*/
			var row= document.createElement("tr");
			row.id= addCount;
			table.appendChild(row);
			row.addEventListener('click', getId);

			/*-- insert cell to table --*/
			var rowData = {rowNumber: row.insertCell(-1), sId: row.insertCell(-1), tCredit: row.insertCell(-1),
											payedAmount: row.insertCell(-1)};

			/*-- insert value to table --*/
			rowData.rowNumber.innerHTML = addCount;
			rowData.sId.innerHTML = id;
			rowData.tCredit.innerHTML = credit;
			rowData.payedAmount.innerHTML = amount;
	}

	/*--   function to get id from table to input field when clickin on row   --*/
	function getId(){
		var sId= this.cells[1].innerHTML;
		document.getElementById('approve-id').value= sId;
	}

	/*--   add event listener to "Register" button   --*/
	document.getElementById('approve-button').addEventListener('click', regApprove);

	/*--   add event listener to "Registration cancel" button   --*/
	document.getElementById('reg-cancel-button').addEventListener('click', regApprove);

	/*--   function to call the server to approve of corresponding id of a student when register button pressed  --*/
	function regApprove(){
		/**/
		if(this.id == "reg-cancel-button"){
			var button= 'cancel';
		}else{
			var button= 'reg';
		}

		/*--   get the value of text field   --*/
		var inputElement= document.getElementById('approve-id');
		var inputValue= '["' + inputElement.value + '","' + button + '"]';
		/*--   remove spaces   --*/
		inputValue= inputValue.replace(/\s+/g,'');

		/*--   server request   --*/
		var xmlhttp = new XMLHttpRequest();
		var url = "http://localhost/web_programming/reg_approve_data.php?q=";

		xmlhttp.onreadystatechange=function() {
				if (this.readyState == 4 && this.status == 200) {
						location.reload();  /*--   call function to add courses in table   --*/
				}
		}
		xmlhttp.open("GET", url+inputValue, true);
		xmlhttp.send();
	}

	/*--   add event listener to "teac_Register" button   --*/
	document.getElementById('teac-approve-button').addEventListener('click', regApproveTeac);

	/*--   function to call the server for 'teachers course registration' when register button pressed  --*/
	function regApproveTeac(){

		/*--   get the value of input fields   --*/
		var inputValue= document.getElementById('code-input').value;
		/*--   remove spaces   --*/
		inputValue= inputValue.replace(/\s+/g,'');

		/*--   check the value of selected option   --*/
		var dropdownElement= document.getElementById('dropdown-option');
		var selectedOption= dropdownElement.options[dropdownElement.selectedIndex].value;

		/*--   make a string for array   --*/
		var arr= '{"code":"' + inputValue + '","teacher":"' + selectedOption + '"}';

		/*--   server request   --*/
		var xmlhttp = new XMLHttpRequest();
		var url = "http://localhost/web_programming/reg_approve_teac_data.php?q=";

		xmlhttp.onreadystatechange=function() {
				if (this.readyState == 4 && this.status == 200) {
					location.reload();
				}
		}
		xmlhttp.open("GET", url+arr, true);
		xmlhttp.send();
	}
</script>

</body>
</html>

<!--   _________________     PHP     ____________________     -->

<?php
	/*-- connect to database --*/
	require 'connect_database.php';

	/*--   get registered courses from database   --*/
	$sqlRegStudent = "SELECT s_id, c_credit, status FROM reg_semester WHERE status= 'pending' ";
	$resultRegStudent = $conn->query($sqlRegStudent);
	$length= $resultRegStudent->num_rows;
	$row = mysqli_fetch_all($resultRegStudent, MYSQLI_ASSOC);

	/*--   get finance information of registered students   --*/
	$sqlRegConfirm = "SELECT s_id, payed_parcentage FROM reg_confirm";
	$resultRegConfirm = $conn->query($sqlRegConfirm);
	$rowConfirm = mysqli_fetch_all($resultRegConfirm, MYSQLI_ASSOC);

	/*--   get individual applied students total registered credit in semester   --*/
	if ($length > 0) {
		$k= 0;
		for($i= 0; $i < $length; $i++) {

			/*-- copy registered courses from array to varriable to use them is javascript --*/
			$cCredit= $row[$i]['c_credit']; $status= $row[$i]['status']; $sId= $row[$i]['s_id'];

			for($j= 0; $j < $length; $j++){
				/*--  --*/
				$sIdSecond= $row[$j]['s_id'];
				if($sId == $sIdSecond){
					if($j < $i)break;
					else{
						if($j == $i){
							$countId[$k]['count_id']= $sId;
							$countCredit[$k]['count_credit']= 0;
							$k++;
						}
						$countCredit[$k-1]['count_credit']+= $row[$j]['c_credit'];
					}
				}
			}
		}
		/*--   get individual students finance and add row to table   --*/
		for($i=0; $i < $k; $i++){
			$sId= $countId[$i]["count_id"];
			$sCredit= $countCredit[$i]['count_credit'];
			for($j=0; $j < $resultRegConfirm->num_rows; $j++){
				if($sId == $rowConfirm[$j]['s_id']){
					$amount= $rowConfirm[$j]['payed_parcentage'];
					break;
				}
			}
			/*--   add application info of regis.. to table   --*/
			echo "<script>
								addRow('$sId','$sCredit','$amount'+'%');
						</script>";
		}
	}

	/*--   get teachers list from database   --*/
	$sqlTeac = "SELECT t_name FROM teacher";
	$resultTeac = $conn->query($sqlTeac);

	if ($resultTeac->num_rows > 0) {
			/*-- output data of each row --*/
			while($rowTeac = $resultTeac->fetch_assoc()) {

				/*-- copy offered courses from array to vaiable to use them in javascript --*/
				$tName= $rowTeac['t_name'];
				/*-- add options to dropdownbox --*/
				echo "<script>
								/*-- add options to dropdown-box --*/
								var select= document.getElementById('dropdown-option');
								var option= document.createElement('option');
								option.text= '$tName';
								select.add(option);
							</script>";
			}
	}

	$conn->close();
?>
