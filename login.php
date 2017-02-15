<?php
session_start();
?>
<!doctype html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="http://localhost/web_programming/nubStyle.css">
<link rel="stylesheet" href="http://localhost/web_programming/font-awesome-4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="w3.css">
<title> Northern University Bangladesh | Login</title>
<style>
  /*--  size of sign up message when window is resized   --*/
  .col-signup-message{margin-left: 0; width: 100%;}
  .sign-input{width: 100%;}
  #sign-up{height: 700px;}
  @media only screen and (min-width: 426px) {
    .col-signup-message{margin-left: 19%; width: 61%;}
    .sign-input{width: 255px;}
  }
  @media only screen and (min-width: 769px) {
    .col-signup-message{margin-left: 37.5%; width: 25%;}
  }

  /* mouse over link */
  a:hover {
      color: #00bfff;
  }
</style>

</head>

<body style="background: white url('nub_web_images/looking_up_at_buildings-wallpaper-1366x768.jpg') no-repeat fixed; background-size: 100% 100%;">
 <!--log-in page container-->
<div class="row" style="display: flex; flex-direction: column; align-content: center;">
<!--logo added-->
<div class="w3-container w3-center w3-section">
  <img src="nub_web_images/NUB-Logo.gif" alt="nub logo"/>
</div>

<!--input feild card-->
<div class="w3-col l3 m7 s11 w3-card-24 w3-section auto-margin row" style="padding: 0 3%; background: white;">
  <h2>Log in with your ID</h2>
  <form action="http://localhost/web_programming/login_data.php" method="post">
    <p>
      <label class="w3-label"><b>ID:</b></label>
      <input class="w3-input w3-border" name="id" required="" type="id" />
    </p>
    <p>
      <label class="w3-label"><b>Password:</b></label>
      <input class="w3-input w3-border" name="password" type="password" />
    </p>
    <!-- log in button -->
    <div class="col-12">
      <button class="w3-btn w3-dark-grey w3-round-large w3-ripple w3-right button-top-margin" name="login-button" type="submit">Login&nbsp<i class="fa fa-sign-in"></i></button>
    </div>
  </form>
</div> <!--input feild card ends-->

<!--sign up notification panel added-->
<div class="col-signup-message w3-section w3-panel w3-pale-green w3-center" style="padding: 15px 5px;">
  <a onclick="myFunction()" style="text-decoration: underline; cursor: pointer;">Sign up!</a>
</div>

</div> <!--log-in page ends-->

<!--   sign-up page start   -->
<div class="w3-col l4 m7 s11 w3-container w3-hide w3-animate-zoom w3-display-topright" id="sign-up" style="padding: 0 3%; background: #f2f2f2; opacity:0.97;">
  <h1>Sign Up</h1>
  <!--   close button added   -->
  <a href="javascript:void(0)" onclick="myFunction()" class="w3-closenav w3-xlarge w3-display-topright" style="padding:6px 24px">
    <i class="fa fa-remove"></i>
  </a>

  <!--   "student" or "teacher" button   -->
  <div id="teac_student">
    <p>Sign up as a student:
      <button class="w3-btn w3-teal" id="student-button">Student</button>
    </p>
    <b>or</b>
    <p>Sign up as a teacher:
      <button class="w3-btn w3-teal" onclick="displayContent()" id="teacher-button">Teacher</button>
    </p>
  </div>

  <!-- incorrect message password not correct -->
  <p id="incorrect-mess" class="w3-text-red"></p>

    <!--    contents of sigh up added   -->
    <div id="sign-up-content" class="w3-animate-right">
      <!-- sign-up input field -->
      <form action="" method="post" id="sign_form">
        <p>
          <b class="w3-label">Name:</b>
          <input class="w3-right sign-input" name="name"/>
        </p>
        <p>
          <b class="w3-label">ID:</b>
          <input class="w3-right sign-input" name="s_id"/>
        </p>
        <p>
          <b class="w3-label">Department:</b>
          <input class="w3-right sign-input" name="department"/>
        </p>
        <p id="batch-input">
          <b class="w3-label">Batch:</b>
          <input class="w3-right sign-input" name="batch"/>
        </p>
        <!--   for teacher (joining date)   -->
        <p id="join-date-input">
          <b class="w3-label">Joining-date:</b>
          <input class="w3-right sign-input" type="date" id="join-date"/>
        </p>
        <p>
          <b class="w3-label">Contact:</b>
          <input class="w3-right sign-input" name="contact"/>
        </p>
        <p>
          <b class="w3-label">Email:</b>
          <input class="w3-right sign-input" name="email"/>
        </p>
        <p>
          <b class="w3-label">Address:</b>
          <textarea class="w3-right sign-input" name="address" rows="3" cols="30"></textarea>
        </p>
        <p style="margin-top: 75px; margin-bottom: 25px;">
          <input class="w3-radio" type="radio" name="gender" value="male" checked>
          <label class="w3-validate">Male</label>
          &nbsp
          <input class="w3-radio" type="radio" name="gender" value="female">
          <label class="w3-validate">Female</label>
        </p>
        <p>
          <b class="w3-label">Password:</b>
          <input class="w3-right" name="s_password" type="password" style="width: 200px;"/>
        </p>
        <p>
          <b class="w3-label">Confirm-password:</b>
          <input class="w3-right" name="re_password" type="password" style="width: 200px;" onkeydown = "if (event.keyCode == 13)document.getElementById('sign-up-button').click()"/>
        </p>
      </form>
      <!-- sign up button -->
      <div class="col-12">
        <button class="w3-btn w3-teal w3-margin-bottom w3-margin-top w3-right" onclick="signUp()" id="sign-up-button">Sign up</button>
      </div> <!-- sign-up input field ends -->
    </div> <!-- sign-up contents ends --> <p id="demo" class="w3-red"></p>

</div> <!--sign-up page ends-->

	<!---    ____________     javascript    _____________     --->

<script>
  /* function to display "sign-up" page */
  function myFunction() {
      var x = document.getElementById("sign-up");
      if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
      } else {
          location.reload();
      }
  }

  /*--   function to insert sign-up info in database when sign-up button is clicked   --*/
  function signUp(){
    /*--   get vlaue of input fields   --*/
    var name= document.getElementsByName('name')[0].value;
    var id= document.getElementsByName('s_id')[0].value;
    /*--   remove spaces   --*/
    id= id.replace(/\s+/g,'');

    var department= document.getElementsByName('department')[0].value;
    /*--   remove spaces   --*/
    department= department.replace(/\s+/g,'');

    var batch= document.getElementsByName('batch')[0].value;
    /*--   remove spaces   --*/
    batch= batch.replace(/\s+/g,'');
    /*--   lower case string   --*/
    batch= batch.toLowerCase();

    var contact= document.getElementsByName('contact')[0].value;
    var email= document.getElementsByName('email')[0].value;
    var address= document.getElementsByName('address')[0].value;
    if(document.getElementsByName('gender')[0].checked){
      var gender= 'male';
    }else if(document.getElementsByName('gender')[1].checked){
      var gender= 'female';
    }
    var password= document.getElementsByName('s_password')[0].value;
    var rePassword= document.getElementsByName('re_password')[0].value;
    var joinDate= document.getElementById('join-date').value;

    /*--   check if input fields are properly field   --*/
    if(name == "")document.getElementById('incorrect-mess').innerHTML= "*Please fill 'Name' field !!!";
    else if(id == "")document.getElementById('incorrect-mess').innerHTML= "*Please fill 'ID' field !!!";
    else if(department == "")document.getElementById('incorrect-mess').innerHTML= "*Please fill 'Department' field !!!";
    else if(password == "")document.getElementById('incorrect-mess').innerHTML= "*Please fill 'Password' field !!!";
    else if(password != rePassword)
      document.getElementById('incorrect-mess').innerHTML= "*Confirm your password !!!";
    else if((batch == "") || (joinDate == "")){
      /*--  get array of input   --*/
      var input = '{"id":"'+id+'", "name":"'+name+'", "department":"'+department+'", "batch":"'+batch+'","address":"'+address;
      input+= '","contact":"'+contact+'","email":"'+email+'","gender":"'+gender+'","password":"'+password+'","join_date":"'+joinDate+'"}';

      /*--   sever request   --*/
			var xmlhttp = new XMLHttpRequest();
			var url = "http://localhost/web_programming/sign_up_data.php?q=";

			xmlhttp.onreadystatechange=function() {
			    if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == "teacher"){
              alert("You cannot 'login' untill admin approve your sign-up!");
              location.reload();
            }else{
              alert("You cannot 'login' untill admin approve your sign-up!");
              location.reload();
            }
			    }
			}
			xmlhttp.open("GET", url+input, true);
			xmlhttp.send();
    }
  }

  /*--   display 'none' sign up contents   --*/
  document.getElementById('sign-up-content').style.display= "none";

  /*--   add event listener to "Student" button   --*/
  document.getElementById('student-button').addEventListener('click', displayContent);

  /*--   add event listener to "Teacher" button   --*/
  document.getElementById('teacher-button').addEventListener('click', displayContent);

  /*--   function to display block sign up content   --*/
  function displayContent(){
    document.getElementById('teac_student').style.display= "none"; //display 'none' teac and student button
    document.getElementById('sign-up-content').style.display= "block";

    /*--   choose student or teacher content   --*/
    if(this.innerHTML == "Student"){
      document.getElementById('join-date-input').style.display= "none";
    }else if(this.innerHTML == "Teacher"){
      document.getElementById('batch-input').style.display= "none";
    }
  }

</script>

</body>
</html>

	<!-- _________________      PHP    __________________ -->
