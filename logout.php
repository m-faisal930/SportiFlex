<?php
session_start();

// Clear the session data
$_SESSION = array();
session_destroy();

// Clear the cookie by setting an expired time in the past
setcookie('user_token', '', time() - 3600);

// Redirect to the login page or any other page you prefer

header("Location: index");
exit();
?>
