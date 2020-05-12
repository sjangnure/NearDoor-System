
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
  </button>-->
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
</body>
</html>

<?php
include 'connect.php';
session_start();
$id=$_SESSION["uid"];

$sql = "Select fname,lname from user where uid in (Select user1 from request where user2=$id and type='friend' and status='accepted')";
$sql1 = "Select fname,lname from user where uid in (Select user2 from request where user1=$id and type='friend' and status='accepted')";
$result = mysqli_query($link, $sql);
$result1 = mysqli_query($link, $sql1);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		//$usid=$row["uid"];
		echo "Name : ". $row["fname"]." " .$row["lname"]."<br>";
    }
} 
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
		//$usid=$row["uid"];
		echo "Name : ". $row["fname"]." " .$row["lname"]."<br>";
    }
} 
if (mysqli_num_rows($result) == 0 and ($result1) == 0)
		echo "You have no friends";

?>