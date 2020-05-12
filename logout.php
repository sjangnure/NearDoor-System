<?php
// Initialize the session
include 'connect.php';
session_start();
$id=$_SESSION["uid"];
$sql="update session set logout=CURRENT_TIMESTAMP where userid=$id";

 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login2.php");
exit;
?>