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
<title>Northern University Bangladesh | Teacher-Registration-Package</title>
<style>

li a{
	cursor: pointer;
}

</style>
</head>

<body class="w3-leftbar w3-rightbar w3-border-blue-grey">
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
      <li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/result_submit.php">Result Submit</a></li>
			<li><a class="w3-blue" href="#">Registration Package</a></li>
		</ul>
		<!-- collapsable menu bar for short screen -->
		<div id="coll-menu" class="w3-hide">
		  <ul class="w3-navbar w3-left-align w3-large w3-light-grey">
				<li><a href="http://localhost/web_programming/teac_home.php">Home</a></li>
				<li><a href="http://localhost/web_programming/result_submit.php">Result Submit</a></li>
				<li><a href="http://localhost/web_programming/logout.php">Log out&nbsp&nbsp&nbsp<i class="fa fa-sign-out"></i></a>
				</li>
		  </ul>
		</div> <!-- collapsable menu bar for short screen ends -->
	</div> <!-- main menu ends -->

	<!-- containar of contents section -->
	<div class="row">
		<!-- registration package pdf embeded -->
		<div class="w3-card-4" id="content-container"> <p id="demo"></p>
			<iframe style="width: 100%; height: 1100px;" id="i-frame" src= "packages/cse.pdf"></iframe>
		</div>
		<!-- right sidebar added -->
		<nav class="w3-container sidebar">
			<ul class="w3-ul w3-hoverable">
				<li><a onclick="embedPdf(this)" id="cse">Department of CSE</a></li>
				<li><a onclick="embedPdf(this)" id="ecse">Department of CSE (Evening)</a></li>
				<li><a onclick="embedPdf(this)" id="eee">Department of EEE</a></li>
				<li><a onclick="embedPdf(this)" id="eeee">Department of EEE (Evening)</a></li>
				<li><a onclick="embedPdf(this)" id="bba-fob">BBA Program, FoB, DC</a></li>
				<li><a onclick="embedPdf(this)" id="bba-main">BBA, Main Campus</a></li>
				<li><a onclick="embedPdf(this)" id="mba-bana">MBA, Banani Campus</a></li>
				<li><a onclick="embedPdf(this)" id="mba-dhan">MBA, Dhanmondi Campus</a></li>
				<li><a onclick="embedPdf(this)" id="llb-city">LLB (Hon's) Program, City Campus</a></li>
				<li><a onclick="embedPdf(this)" id="llb-bana">LLB, Banani Campus</a></li>
				<li><a onclick="embedPdf(this)" id="llm">LLM Program, City Campus</a></li>
				<li><a onclick="embedPdf(this)" id="ell">ELL Program, Department of English</a></li>
				<li><a onclick="embedPdf(this)" id="mae">MAE Program, Department of English</a></li>
				<li><a onclick="embedPdf(this)" id="te">Department of TE</a></li>
				<li><a onclick="embedPdf(this)" id="ete">Department of TE (Evening)</a></li>
			</ul>
			<div class="w3-large w3-center w3-padding-64">
				<a href="https://www.facebook.com/nub.ac.bd" class=" w3-hover-text-indigo w3-show-inline-block w3-padding-right"><i class="fa fa-facebook-square"></i></a>
				<a href="https://twitter.com/NUB_info" class=" w3-hover-text-light-blue w3-show-inline-block w3-padding-right"><i class="fa fa-twitter"></i></a>
				<a href="https://plus.google.com/u/0/117198301805744133442" class=" w3-hover-text-red w3-show-inline-block w3-padding-right"><i class="fa fa-google-plus"></i></a>
				<a href="https://www.youtube.com/playlist?list=PLsqDBJ0K2TH-14y5TJ5c6MSf4VqPHH0OK&jct=cHijtU3tPrhaocmDAWPFzuICIkllSg" class=" w3-show-inline-block youtube-hover"><i class="fa fa-youtube-play"></i></a>
			</div>
		</nav><!-- right sidebar ends -->
  </div><!-- containar of contents ends -->

	<!--pagination added-->
	<div class="w3-center w3-padding-32" style="margin-top: 11%;">
		<ul class="w3-pagination">
			<li><a class="w3-hover-black" href="http://localhost/web_programming/result_submit.php"><i class="fa fa-angle-double-left"></i></a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/teac_home.php">1</a></li>
      <li><a class="w3-hover-black" href="http://localhost/web_programming/result_submit.php">2</a></li>
			<li><a class="w3-black" href="">3</a></li>
		</ul>
	</div>

	<!-- footer added -->
	<?php require 'footer.php';?>

<!--   _____________________  JavaScript  ___________________   -->

	<script>

		/* collapsable menu bar function */
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

		/*--   pdf links added   --*/
		function embedPdf(el){
			var frame= document.getElementById('i-frame');
			var link= el.id;
			if(link == "cse"){
				frame.setAttribute("src", "packages/cse.pdf");
			}else if (link == "ecse") {
				frame.setAttribute("src", "packages/ecse.pdf");
			}else if (link == "eee") {
				frame.setAttribute("src", "packages/eee.pdf");
			}else if (link == "eeee") {
				frame.setAttribute("src", "packages/eeee.pdf");
			}else if (link == "bba-fob") {
				frame.setAttribute("src", "packages/bba_dc.pdf");
			}else if (link == "bba-main") {
				frame.setAttribute("src", "packages/bba_bc.pdf");
			}else if (link == "mba-bana") {
				frame.setAttribute("src", "packages/mba_bc.pdf");
			}else if (link == "mba-dhan") {
				frame.setAttribute("src", "packages/mba_dc.pdf");
			}else if (link == "llb-city") {
				frame.setAttribute("src", "packages/llb_cc.pdf");
			}else if (link == "llb-bana") {
				frame.setAttribute("src", "packages/llb_bc.pdf");
			}else if (link == "llm") {
				frame.setAttribute("src", "packages/llm_cc.pdf");
			}else if (link == "ell") {
				frame.setAttribute("src", "packages/ell.pdf");
			}else if (link == "mae") {
				frame.setAttribute("src", "packages/mae.pdf");
			}else if (link == "te") {
				frame.setAttribute("src", "packages/btx.pdf");
			}else if (link == "ete") {
				frame.setAttribute("src", "packages/ebtx.pdf");
			}
		}

	</script>

</body>
</html>

<?php
	/*--   ____________________  PHP  __________________   --*/

	/*--   get login id   --*/
	$tId= $_SESSION["nub-login-id"];

	/*--   insert package into iframe   --*/
	if(strstr($tId, "TEAC") != FALSE){
		echo "<script>
						document.getElementById('embed').src= 'packages/cse.pdf';
					</script>";
	}elseif (strstr($tId, "TEAC") != FALSE) {
		echo "<script>
						document.getElementById('embed').src= 'packages/cse.pdf';
					</script>";
	}
?>
