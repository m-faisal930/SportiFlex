<?php
session_start();

// Check if the user is not logged in
if ($_SESSION['adminLoggedIn'] !== true) {
  echo "<script>alert('Please Login First'); window.location.href = '../faisal';</script>";
  exit;
}
?>





<?php
session_start();

// Clear the session data
$_SESSION = array();
session_destroy();


// Redirect to the login page or any other page you prefer

header("Location: ../index");
exit();
?>
