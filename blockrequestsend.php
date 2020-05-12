
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
  <!--<a class="navbar-brand" href="#">Website</a>
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
    <!--<form class="form-inline my-2 my-lg-0" action="search.php">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
  </div>
</nav>
<br>
</br>
<br>
<?php
include 'connect.php';
//echo "neighborhood";
session_start();
$id=$_SESSION["uid"];
$sql0= "Select r_uid from requestblock where r_uid=$id and status>2";
$result0 = mysqli_query($link, $sql0);
if (mysqli_num_rows($result0) > 0)
	echo"You are already member of a block";

$sql2 = "Select status from requestblock where r_uid=$id";
$result2 = mysqli_query($link, $sql2);

	if (mysqli_num_rows($result2) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($result2)) {
		$sid=$row["status"];
		//echo $sid;
		

	}
}
	
if($sid<3){
			echo "You have a pending block request";

}
	
else
{
	//echo"0 results";
	//insert request in requestblock
	$sql1 = "Select blockid from address where uid='$id'";
	$result1 = mysqli_query($link, $sql1);

	if (mysqli_num_rows($result1) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($result1)) {
		$bid=$row["blockid"];
		//echo $bid;
	}
}

	
	$sql="Insert into requestblock values ('$id','$bid','0')";
		
		if(mysqli_query($link, $sql)){
			echo "Request Sent";
} 

		else {
			//echo "ERROR: Could not send request...Try again in sometime ";
}

	
	
	
	
}


?>

