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
<title>Northern University Bangladesh | Result Submit</title>
</head>
<style>
  @media only screen and (min-width: 769px) {
    #content-container{width: 75%; margin: 0% 13%;}
  }

  input{
    width: 70%; float: right;
  }
</style>

<body class="w3-leftbar w3-rightbar w3-border-blue-grey" id="content-container">
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
	<div class=" w3-large w3-blue-grey w3-padding-large">
		<ul class="w3-navbar">
			<li class="hide-large w3-light-grey w3-opennav w3-right">
		    <a href="javascript:void(0);" onclick="myFunction()">☰</a>
		  </li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/teac_home.php">Home</a></li>
			<li><a class="w3-blue" href="">Result Submit</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/teac_reg_package.php">Registration Package</a></li>
		</ul>
		<!-- collapsable menu bar for short screen -->
		<div id="coll-menu" class="w3-hide">
		  <ul class="w3-navbar w3-left-align w3-large w3-light-grey">
				<li><a href="http://localhost/web_programming/teac_home.php">Home</a></li>
		    <li><a href="http://localhost/web_programming/teac_reg_package.php">Registration Package</a></li>
				<li><a href="http://localhost/web_programming/logout.php">Log out&nbsp&nbsp&nbsp<i class="fa fa-sign-out"></i></a>
				</li>
		  </ul>
		</div> <!-- collapsable menu bar for short screen ends -->
	</div> <!-- main menu ends -->

	<!-- container of contents section -->
	<div class="row">
		<!-- result content added -->
		<div class="w3-padding-xlarge">
      <h1 id="course-name" style="margin-bottom: 0%;">CSE ( <span id="semester-name"></span> )</h1>
			<span id="info" class="w3-text-amber"></span>

			<!-- dropdown option for registered courses -->
			<div class="w3-container w3-border" style="margin: 5% 0 5% 0;" id="input-box">
				<h2>Course Code</h2>

				<input class="w3-input" id="code-input" onkeydown = "if (event.keyCode == 13)document.getElementById('select-button').click()"/>

				<button class="w3-btn w3-blue-grey w3-right" style="margin: 1.5% 0;" id="select-button">Select</button>
			</div> <!-- dropdown box ends -->

			<!--  course cose added  -->
			<h3>Subject code: <span id="code-text"></span></h3>

      <!-- table to input result of students of particular course -->
			<div style="overflow-x:auto;">
	      <table id="result-input-table" class="w3-centered w3-table-all">
	        <tr class="w3-blue-grey w3-large">
	          <th class="w3-padding-12">no.</th>
	          <th class="w3-padding-12">Student id</th>
	          <th class="w3-padding-12" style="padding-left: 9%;">Final score(Out of '4')</th>
	        </tr>
	      </table>
			</div>

      <div>
        <button id= "cancel" class="w3-btn w3-blue-grey w3-right" style="margin: 1.5% 0;" onclick="location.reload()">Cancel</button>
        <button id= "submit" class="w3-btn w3-blue-grey w3-right w3-margin-right" style="margin: 1.5% 0;">Submit</button>
      </div> <!-- table of result input ends -->
		</div> <!-- result content ends -->  <p id="demo"></p>
	</div> <!-- containar of contents section ends -->

	<!--pagination added-->
	<div class="w3-center w3-padding-32" style="margin-top: 11%;">
		<ul class="w3-pagination">
			<li><a class="w3-hover-black" href="http://localhost/web_programming/teac_home.php"><i class="fa fa-angle-double-left"></i></a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/teac_home.php">1</a></li>
			<li><a class="w3-black" href="">2</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/teac_reg_package.php">3</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/teac_reg_package.php"><i class="fa fa-angle-double-right"></i></a></li>
		</ul>
	</div>

	<!-- footer added -->
	<?php require 'footer.php';?>

  	<!---    ____________     javascript    _____________     --->

  	<script>
  		var addCount= 0, totalCredit= 0, outp= "[";

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
  		function addRow(id){
  				addCount= addCount + 1;

  				var table = document.getElementById('result-input-table');
  				var row = table.insertRow(addCount);
  				/*-- insert cell to table --*/
  				var rowData = {rowNumber: row.insertCell(-1), studentId: row.insertCell(-1), score: row.insertCell(-1)};

					/*--  create input element  --*/
					var field= document.createElement("input");
					field.type= "text"; field.id= addCount;

  				/*-- insert value to table --*/
  				rowData.rowNumber.innerHTML = addCount;
  				rowData.studentId.innerHTML = id;
  				rowData.score.appendChild(field);
  		}

			/*--   add event listener to "submit" button   --*/
		  document.getElementById('submit').addEventListener('click', getCellValues);

      /*--   function to get input values of table in array when "submit button" clicked   --*/
      function getCellValues() {
        var table = document.getElementById('result-input-table');
				var cId = document.getElementById('code-text').innerHTML;
        for (var r = 1, n = table.rows.length; r < n; r++) {
            for (var c = 0, m = table.rows[r].cells.length; c < m; c++) {
                if(c == 1){
                  var id= table.rows[r].cells[c].innerHTML;
                  if (outp != "[") {outp += ",";}
                  outp += '{"s_id":"' + id + '"';

                }else if (c == 2) {
                  var score= document.getElementById(r).value;
                  if (outp != "[") {outp += ",";}
                  outp += '"score":"'+ score + '","c_id":"'+ cId + '"}';
                }
            }
        }
				outp += "]";
				/*--  remove space  --*/
				outp= outp.replace(/\s+/g,'');

				/*--   server request   --*/
				var xmlhttp = new XMLHttpRequest();
				var url = "http://localhost/web_programming/result_insert_data.php?q=";

				xmlhttp.onreadystatechange=function() {
						if (this.readyState == 4 && this.status == 200) {
							location.reload();
						}
				}
				xmlhttp.open("GET", url+outp, true);
				xmlhttp.send();
      }

			/*--   add event listener to "select" button   --*/
			document.getElementById('select-button').addEventListener('click', studentList);

			/*--   function to call the server to get student-list when select button pressed  --*/
			function studentList(){
				/*--   get code value   --*/
				var code= document.getElementById('code-input').value;
				document.getElementById('code-text').innerHTML= code;
				/*--   remove spaces   --*/
				code= code.replace(/\s+/g,'');

				/*--   sever request   --*/
				var xmlhttp = new XMLHttpRequest();
				var url = "http://localhost/web_programming/teac_stu_list_data.php?q=";

				xmlhttp.onreadystatechange=function() {
						if (this.readyState == 4 && this.status == 200) {
							/*--   parse the server response   --*/
							var arr = JSON.parse(this.responseText);
							var i;

							for(i = 0; i < arr.length; i++) {
								addRow(arr[i]);
							}
						}
				}
				xmlhttp.open("GET", url+code, true);
				xmlhttp.send();
			}

  	</script>

  </body>
  </html>

<!-- _________________      PHP    __________________ -->

<?php
	/*-- connect to database --*/
	require 'connect_database.php';

	/*--   get timeline of result publish from database   --*/
  require 'fetch_all.php';

	/*--   calculate semester   --*/
  if(date("Y-m-d") > $result_publish){
    $semName= $timeline_sem;
  }else if (date("Y-m-d") <= $result_publish) {
    if(date("m") == 1){
      $year= date("Y")-1;
      $semName= "Fall " . $year;
    }else if(date("m") == 12){
      $semName= "Fall " . date("Y");
    }else if(date("m") == 9){
      $semName= "Summer " . date("Y");
    }else if(date("m") == 8) {
      $semName= "Summer " . date("Y");
    }elseif (date("m") == 5) {
      $semName= "Summer " . date("Y");
    }elseif (date("m") == 4) {
      $semName= "Summer " . date("Y");
    }
	}
	/*--   print semester name   --*/
	echo "<script>
					document.getElementById('semester-name').innerHTML= '$semName';
				</script>";

  $conn->close();

?>
