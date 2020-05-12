
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
<?php

include 'connect.php';
session_start();
$id=$_SESSION["uid"];

$message = mysqli_real_escape_string($link, $_REQUEST['message']);

//echo $message;
$tid = $_SESSION['tid'];
//echo $tid;
$sql0= "Select r_uid from requestblock where r_uid=$id and status>2";
$result0 = mysqli_query($link, $sql0);
if (mysqli_num_rows($result0) == 0)
	echo"You cannot post message as you are not member of the neighborhood";
else
{
$sql = "INSERT INTO message (creatorid,time,thread_id,content) VALUES ($id,CURRENT_TIMESTAMP,$tid, '$message')";
if(mysqli_query($link, $sql)){
    echo "Message sent";
	//echo "<h2>Station ID received is : ",$tid,"</h2><br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	
}
}
mysqli_close($link);
?>
<br>
<a href="neighborhood.php">Continue</a>
</body>
</html>
