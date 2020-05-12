
<!doctype html>
<html lang="en">
  <head>
    
    <title>Jumbotron Template · Bootstrap</title>


    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" >

    


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
 <!-- <a class="navbar-brand" href="#">Website</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
-->
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="page1.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="blockreq.php">Block Request</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="friendreq.php">Friend Request</a>
      </li>
	  <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>-->
    </ul>
    
  </div>
</nav>
<br>
<br>
<br>
<?php

include 'connect.php';
session_start();
// Escape user inputs for security
$subject = mysqli_real_escape_string($link, $_REQUEST['subject']);
$recipient = mysqli_real_escape_string($link, $_REQUEST['recipient']);
$message = mysqli_real_escape_string($link, $_REQUEST['message']);

 
// attempt insert query execution
$id=$_SESSION["uid"];
$sql0= "Select r_uid from requestblock where r_uid=$id and status>2";
$result0 = mysqli_query($link, $sql0);
if (mysqli_num_rows($result0) == 0)
	echo"You cannot post message as you are not member of the block";
else
{
$sql = "INSERT INTO message (creatorid,subject, recipient_type,time,content) VALUES ('$id','$subject', '$recipient',CURRENT_TIMESTAMP(), '$message')";
$sql1 = "Select mid from message where creatorid=$id order by time DESC limit 1";

//$sql1="Insert into thread (t) values"

if(mysqli_query($link, $sql)){
    echo "Message posted";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	
}
	$result1 = mysqli_query($link, $sql1);

if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
		$mid=$row["mid"];
		//echo $mid;
		$sql2="Insert into thread (mid) values ('$mid')";
		
		if(mysqli_query($link, $sql2)){
    //echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
	
}

    }
	} else {
    echo "0 results";
	
}

$sql3 = "Select thread_id from thread where mid=$mid";
$result3 = mysqli_query($link, $sql3);

if (mysqli_num_rows($result3) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result3)) {
		$tid=$row["thread_id"];
		//echo $tid;
		$sql4="Update message set thread_id=$tid where mid=$mid";
		
		if(mysqli_query($link, $sql4)){
    //echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql4. " . mysqli_error($link);
	
}

    }
	} else {
    echo "0 results";
	
}

if ($recipient=='block')
{
$sql5 = "Select blockid from address where uid='$id'";
$result5 = mysqli_query($link, $sql5);

if (mysqli_num_rows($result5) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result5)) {
		$bid=$row["blockid"];
		echo $bid;
	}
}
$sql6 = "Select uid from address where blockid='$bid'";
$result6 = mysqli_query($link, $sql6);

if (mysqli_num_rows($result6) > 0) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result6)) 
	{
		$usid=$row["uid"];
		$sql7 = "INSERT INTO recipient VALUES ('$mid','$usid')";
		if(mysqli_query($link, $sql7))
		{
			//echo "Records added successfully.";
		} else
		{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			
		}
	}
}
}

if ($recipient=='neighborhood')
{
$sql8 = "Select nid from address where uid='$id'";
$result8 = mysqli_query($link, $sql8);

if (mysqli_num_rows($result8) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result8)) {
		$nid=$row["nid"];
		
	}
}
$sql9 = "Select uid from address where nid='$nid'";
$result9 = mysqli_query($link, $sql9);

if (mysqli_num_rows($result9) > 0) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result9)) 
	{
		$usid=$row["uid"];
		$sql10 = "INSERT INTO recipient VALUES ('$mid','$usid')";
		if(mysqli_query($link, $sql10))
		{
			//echo "Records added successfully.";
		} else
		{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			
		}
	}
}
}


}
// close connection
mysqli_close($link);
?>
<br>
<a href="page1.html">Continue</a>
</body>
</html>
