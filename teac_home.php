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
<title>Northern University Bangladesh | Teacher-Home</title>
</head>
<style>
  div.card-1, div.card-2{width: 89%; margin:7% 5%; float: left; border: 3px solid grey;}
	@media only screen and (min-width: 426px) {
		h1.w3-animate-zoom{padding-top: 19%;}
		div.card-1{width: 28.3%; margin:7% 1% 7% 5%; border: 3px solid grey;}
		div.card-2{width: 28.3%; margin:7% 1%; border: 3px solid grey;}
	}
	@media only screen and (min-width: 769px) {
		h1.w3-animate-zoom{padding-top: 0%;}
		div.card-1{width: 31%; margin:5% 3% 15% 17%; border: 0;}
		div.card-2{width: 31%; margin:5% 3%; border: 0;}

    #content-container{width: 75%; margin: 0% 13%;}
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
			<li class="w3-blue"><a href="#">Home</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/result_submit.php">Result Submit</a></li>
			<li class="hide-medium hide-small show-large"><a href="http://localhost/web_programming/teac_reg_package.php">Registration Package</a></li>
		</ul>
		<!-- collapsable menu bar for short screen -->
		<div id="coll-menu" class="w3-hide">
		  <ul class="w3-navbar w3-left-align w3-large w3-light-grey">
		    <li><a href="http://localhost/web_programming/result_submit.php">Result Submit</a></li>
		    <li><a href="http://localhost/web_programming/teac_reg_package.php">Registration Package</a></li>
				<li><a href="http://localhost/web_programming/logout.php">Log out&nbsp&nbsp&nbsp<i class="fa fa-sign-out"></i></a>
				</li>
		  </ul>
		</div> <!-- collapsable menu bar for short screen ends -->
	</div> <!-- main menu ends -->

	<!-- containar of contents section -->
	<div class="row w3-padding-xlarge">
    <h1 id="semester-name" class="w3-center w3-animate-zoom"><span class="w3-text-indigo">Welcome!</span></br>Teachers Panel</h1>

    <div class="auto-margin">
      <!--1'st card-->
      <a href="http://localhost/web_programming/result_submit.php">
        <div class="hover-shadow-16 card-1">
          <img src= "nub_web_images/royal_gardens_2-wallpaper-1366x768.jpg" style="width:100%; height:10%;"/>
          <div class="w3-container" style="padding: 11% 7%;">
            <b>Result submit</b>
            <p>Click on it.</p>
          </div>
        </div>
      </a>
      <!--2'nd card-->
      <a href="http://localhost/web_programming/teac_reg_package.php">
        <div class="hover-shadow-16 card-2">
          <img src= "nub_web_images/royal_gardens_2-wallpaper-1366x768.jpg" style="width:100%; height:100%;"/>
          <div class="w3-container" style="padding: 11% 7%;">
            <b>Registration package</b>
            <p>Click on it.</p>
          </div>
        </div>
      </a>
    </div>
	</div> <!-- containar of contents section ends -->

	<!--pagination added-->
	<div class="w3-center w3-padding-32" style="margin-top: 11%;">
		<ul class="w3-pagination">
			<li><a class="w3-black" href="#">1</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/result_submit.php">2</a></li>
			<li><a class="w3-hover-black" href="http://localhost/web_programming/teac_reg_package.php">3</a></li>
      <li><a class="w3-hover-black" href="http://localhost/web_programming/result_submit.php"><i class="fa fa-angle-double-right"></i></a></li>
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

</script>

</body>
</html>
