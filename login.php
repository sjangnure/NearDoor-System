<html>
<head>
      <link rel="stylesheet" href="style.css" media="screen">
<head>
<?php
include 'connect.php';

if ( isset( $_POST['submit'] ) )
{
$userid	= $_REQUEST['userid'];	
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$pwd = $_REQUEST['passid'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$gender = $_REQUEST['gender'];
$date = $_REQUEST['date'];
$apartment = $_REQUEST['apartment'];
$Street = $_REQUEST['Street'];
$block = $_REQUEST['block'];
$state = $_REQUEST['state'];
$country = $_REQUEST['country'];-
$zip = $_REQUEST['zip'];
}
echo "$userid";
?>
</html>