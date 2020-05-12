<html>
<head>
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" >
<link href="css/style.css" rel="stylesheet" >
    


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

<style>
/* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
  width: 50%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
  border-radius: 5px;
  background-color: #ffffff;
  padding: 5px;
}
</style>
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

<br><br><br><br>


<?php
include 'connect.php';
session_start();
$id=$_SESSION["uid"];

    if(isset($_GET["threadID"]))
    {
        $thread = $_GET["threadID"];
        
    }
	//echo "<h2>Station ID received is : ",$thread,"</h2><br>";
	$sql="Select creatorid,content,time from message where thread_id=$thread order by time";
	$result = mysqli_query($link, $sql);
$_SESSION['tid'] = $thread;

$sql2="Select creatorid,subject,content,time from message where mid in(Select mid from thread where thread_id=$thread)";
$result2 = mysqli_query($link, $sql2);
$row2 = mysqli_fetch_assoc($result2);
echo "<h2> Subject : " .$row2["subject"]."</h2>";

//echo $fname;
echo "<table>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		$userid = $row["creatorid"];
		$sql1="Select fname,lname from user where uid=$userid";
		$result1 = mysqli_query($link, $sql1);
		while($row1 = mysqli_fetch_assoc($result1)) {
		$fname = $row1["fname"];
		$lname = $row1["lname"];
		}

		echo "<tr>
		<td>". $fname, $lname."</td>
		<td>". $row["content"]."</td>
		<td>". $row["time"]."</td> <tr>";
    }
} 
echo "</table>";

//else {
  //  echo "0 results";
//}


//On page 2

?>

<div align='left'>
<div class='container'>
  <form action='neighborhood2.php' method='Post'>

    

    <br><label for='subject'>Reply</label>
    <input type='text' id='message' name='message' placeholder='Write your message' size='200' height='200'>
	<input type="submit" value="Submit">
	
	<!--<a href='neighborhood2.php?threadID=$thread'><input type="submit" value="Submit">Submit</a>-->
    
</form>
</div>
</div>

</body>
</html>
