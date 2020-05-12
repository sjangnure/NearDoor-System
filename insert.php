<html>

<body>
Continue to login :<a href="login2.php">Login</a>
</body>
</html>
<?php
include 'connect.php';
// Escape user inputs for security
//$userid = mysqli_real_escape_string($link, $_REQUEST['userid']);
$fname = mysqli_real_escape_string($link, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($link, $_REQUEST['lname']);
$passid = md5('hashkeyvalue'.mysqli_real_escape_string($link, $_REQUEST['passid']));
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
$date = mysqli_real_escape_string($link, $_REQUEST['date']);
$apartment = mysqli_real_escape_string($link, $_REQUEST['apartment']);
$Street = mysqli_real_escape_string($link, $_REQUEST['Street']);
$block = mysqli_real_escape_string($link, $_REQUEST['block']);
$state = mysqli_real_escape_string($link, $_REQUEST['state']);
$country = mysqli_real_escape_string($link, $_REQUEST['country']);
$nid = mysqli_real_escape_string($link, $_REQUEST['neighborhood']);
$zip = mysqli_real_escape_string($link, $_REQUEST['zip']);

 
// attempt insert query execution
//$sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('$fname', '$lname', '$email')";
$sql1 = "INSERT INTO user (fname, lname, password, uphone_no, uemail, Gender, dob) VALUES ('$fname', '$lname', '$passid', '$phone', '$email', '$gender', '$date')";
$sql2 = "Select uid from user where uemail='$email'";

/*
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
*/

if(mysqli_query($link, $sql1)){
    //echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link);
}
$result = mysqli_query($link, $sql2);
if (mysqli_num_rows($result) > 0) 
{
	while($row=mysqli_fetch_assoc($result))
//echo "";
//$row = mysqli_fetch_assoc($result);

$uid=$row['uid'];
//echo "id is: ",$uid;
}
$sql3 = "INSERT INTO address (uid,apt_no, street, blockid, state, country,nid,zip ) VALUES ($uid,'$apartment', '$Street', '$block', '$state', '$country', '$nid', '$zip')";
if(mysqli_query($link, $sql3)){
   // echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>