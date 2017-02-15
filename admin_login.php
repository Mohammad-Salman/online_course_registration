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
<title> Northern University Bangladesh | Admin-Login</title>
<style>
  /*--  size of sign up message when window is resized   --*/
  .col-signup-message{margin-left: 0; width: 100%}
  @media only screen and (min-width: 500px) {
    .col-signup-message{margin-left: 19%; width: 61%}
  }
  @media only screen and (min-width: 768px) {
    .col-signup-message{margin-left: 37.5%; width: 25%}
  }

  /* mouse over link */
  a:hover {
      color: #00bfff;
  }
</style>

</head>

<body style="background: white url('nub_web_images/downtown_toronto_night_black_and_white-wallpaper-1366x768.jpg') no-repeat fixed; background-size: 100% 100%;">
 <!--log-in page container-->
<div class="row" style="display: flex; flex-direction: column; align-content: center;">
<!--logo added-->
<div class="w3-container w3-center w3-section">
  <img src="nub_web_images/NUB-Logo.gif" alt="nub logo"/>
</div>

<!--input feild card-->
<div class="w3-col l3 m7 s11 w3-card-24 w3-section auto-margin row" style="padding: 0 3%; background: white;">
  <h2 class="w3-center">Admin Login</h2>
  <span id="invalid" class="w3-text-red"></span>
  <form action="" method="post">
    <p>
      <label class="w3-label"><b>ID:</b></label>
      <input class="w3-input w3-border" name="id" required="" type="id" />
    </p>
    <p>
      <label class="w3-label"><b>Password:</b></label>
      <input class="w3-input w3-border" name="password" required="" type="password" />
    </p>
    <!-- log in button -->
    <div class="col-12">
      <button class="w3-btn w3-dark-grey w3-round-large w3-ripple w3-right button-top-margin" name="login-button" type="submit">Login&nbsp<i class="fa fa-sign-in"></i></button>
    </div>
  </form>
</div> <!--input feild card ends-->

</div> <!--log-in page ends-->

	<!---    ____________     javascript    _____________     --->

<script>

</script>

</body>
</html>

	<!-- _________________      PHP    __________________ -->

<?php
/*-- connect to database --*/
require 'connect_database.php';

if (isset($_POST['login-button'])){
  /*--   get value of input field   --*/
  $id = $_POST['id'];
  $password = md5($_POST['password']);

  /*--   check database for log in varification   --*/
  $sql = "SELECT profession FROM profile WHERE user_id = '$id' AND password = '$password'";
  $result= $conn->query($sql);

  /*--   set session variables   --*/
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
      $_SESSION["nub-admin-login-check"] = "yes";
      $_SESSION["nub-login-check"]= "no";
      $_SESSION["nub-admin-login-time"] = date("r");
      $_SESSION["nub-admin-login-id"] = $id;

      $conn->close();
      if ($row['profession'] == 'administrator') {
        header('Location: http://localhost/web_programming/admin_home.php');
        exit;
      }else{
        echo "<script>
                document.getElementById('invalid').innerHTML= 'Username or Password was invalid!';
              </script>";
      }
    }

  }else{
    echo "<script>
            document.getElementById('invalid').innerHTML= '*Username or Password was invalid!';
          </script>";
  }
}

?>
