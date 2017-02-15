<?php

  /*--   destroy session & session varriable when "logout button" in clicked   --*/
  session_start();
  if($_SESSION["nub-admin-login-check"] == "yes"){

    $_SESSION["nub-admin-login-check"]= "no";

    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    header('Location: http://localhost/web_programming/admin_login.php');
  }

?>
