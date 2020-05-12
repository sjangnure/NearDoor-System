
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
    <!--<form class="form-inline my-2 my-lg-0" action="search.php">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
  </div>
</nav>
<br>
<br>
<br>


<div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
     <!-- <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>-->
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <!--<div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>-->
        <h3>Personal info</h3>
        <?php
		include 'connect.php';
		session_start();
		$id=$_SESSION['uid'];
		$sql= "Select fname,lname,uemail,uphone_no,short_info,family_info,password from user where uid='$id'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) == 0)
			echo"session not logged in";
		else
			while($row = mysqli_fetch_assoc($result)) {
			$fname=$row["fname"];
			$lname=$row["lname"];
			$uemail=$row["uemail"];
			$uphone_no=$row["uphone_no"];
			$short_info=$row["short_info"];
			$family_info=$row["family_info"];
			$password=$row["password"];
			}
		//echo $fname;
		  

        echo '<form class="form-horizontal" action="updateuser.php" method="POST" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="fname" id="fname" value="'.$fname.'">
            </div>
          </div>';
        echo '<div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="lname" id="lname" value="'.$lname.'">
            </div>
          </div>';
         echo '<div class="form-group">
            <label class="col-lg-3 control-label">Phone Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="phone" id="phone" value="'.$uphone_no.'">
            </div>
          </div>';
        echo '<div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email" id="email" value="'.$uemail.'">
            </div>
          </div>';
		 echo '<div class="form-group">
            <label class="col-lg-3 control-label">Password:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" name="password" id="password" value="'.$password.'">
            </div>
          </div>';
         echo '<div class="form-group">
            <label class="col-md-3 control-label">Short Information:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="sinfo" id="sinfo" value="'.$short_info.'">
            </div>
          </div>';
		 echo '<div class="form-group">
            <label class="col-md-3 control-label">Family Description:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="familydesc" id="familydesc" value="'.$family_info.'">
            </div>
          </div>';
		  ?>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="Submit" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>




</body>
</html>

