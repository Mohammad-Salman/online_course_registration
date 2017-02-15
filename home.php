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
		h1.w3-animate-zoom{padding-top: 0%;}
		div.card-1{width: 26.5%; margin:15% 1.3% 15% 7%; border: 0;}
		div.card-2{width: 26.5%; margin:15% 1.3%; border: 0;}
		div.card-3{width: 26.5%; margin:15% 7% 15% 1.3%; border: 0;}
	}

</style>
</head>

<body>
	<!--main menu added-->
	<div class="w3-top">
		<ul class="w3-navbar w3-light-grey w3-large w3-card-12">
			<li class="hide-large w3-light-grey w3-opennav w3-right">
		    <a href="javascript:void(0);" onclick="myFunction()">☰</a>
		  </li>
			<li><a class="w3-green w3-xlarge" style="padding-top: 3.3px; padding-bottom: 3.3px;"><i class="fa fa-home"></i></a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/registration_package.php" >Registration Package</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/course_registration.php">Course Registration</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/result.php">Result</a></li>
			<li class="w3-right w3-dropdown-hover">
			  <a  class="w3-large hide-medium hide-small show-large" href="javascript:void(0)"><i class="fa fa-user"></i></a>
			  <div class="w3-dropdown-content w3-border w3-card-4 w3-center w3-light-grey" style="right:0">
			    <a href="http://localhost/web_programming/profile.php">Profile</a>
			    <a href="http://localhost/web_programming/logout.php">Log Out</a>
			  </div>
			</li>
		</ul>
		<!-- collapsable menu bar for short screen -->
		<div id="coll-menu" class="w3-hide">
		  <ul class="w3-navbar w3-left-align w3-large w3-light-grey">
		    <li><a href="http://localhost/web_programming/registration_package.php">Registration Package</a></li>
		    <li><a href="http://localhost/web_programming/course_registration.php">Course Registration</a></li>
		    <li><a href="http://localhost/web_programming/result.php">Result</a></li>
				<li><a href="http://localhost/web_programming/logout.php">Log out&nbsp&nbsp&nbsp<i class="fa fa-sign-out"></i></a>
				</li>
		  </ul>
		</div> <!-- collapsable menu bar for short screen ends -->
	</div>
	<!--slider added-->
	<div class="hide-small show-medium w3-center bgimg-paralex bgimg-home" style="height:597px;">
		<h2 class="hide-medium show-small show-large w3-serif w3-text-white w3-xlarge"  style="padding-top: 11%;">Knowledge for inovation and change</h2>
		<h1 class="w3-jumbo w3-wide w3-animate-zoom" style="color: rgb(250,225,173);">NUB</h1>
	</div>
	<!--containar of contents section-->
	<div class="row">
		<!--3 cards of links added-->
		<div id="content-container">
			<!--1'st card-->
			<a href="http://localhost/web_programming/registration_package.php">
				<div class="hover-shadow-16 card-1">
					<img src= "nub_web_images/HD-Education-Wallpapers-620x349.png" style="width:100%; height:100%;"/>
					<div class="w3-container" style="padding: 11% 7%;">
						<b>Package</b>
						<p>Click on this papper to watch and download registration package.</p>
					</div>
				</div>
			</a>
			<!--2'nd card-->
			<a href="http://localhost/web_programming/course_registration.php">
				<div class="hover-shadow-16 card-2">
					<img src= "nub_web_images/3D-Education-Photos-620x349.jpg" style="width:100%; height:100%;"/>
					<div class="w3-container" style="padding: 11% 7%;">
						<b>Registration</b>
						<p>Click on this papper to do your registration online.</p>
					</div>
				</div>
			</a>
			<!--3'rd card-->
			<a href="http://localhost/web_programming/result.php">
				<div class="hover-shadow-16 card-3">
					<img src= "nub_web_images/book-1659717_1920.jpg" style="width:100%; height:100%;"/>
					<div class="w3-container" style="padding: 11% 7%;">
						<b>Result</b>
						<p>Click on this papper to see your semester result.</p>
					</div>
				</div>
			</a>
		</div><!--3 cards of linds ends-->

		<!--right side navigation panel-->
		<?php require 'side_navigation.php';?>

	</div><!--containar of contents ends-->

	<!--pagination added-->
	<div class="w3-center w3-padding-32">
		<ul class="w3-pagination">
			<li><a class="w3-black" href="">1</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/registration_package.php">2</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/course_registration.php">3</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/result.php">4</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/registration_package.php">»</a></li>
		</ul>
	</div>

	<!-- footer added -->
	<?php require 'footer.php';?>

	  <!---    ____________     javascript    _____________     --->

	<script>

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

	</script>


</body>
</html>
