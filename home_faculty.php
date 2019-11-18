<?php
    require_once 'library.php';
	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Faculty Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home_faculty.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#home_faculty.php">Department <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="profile_display.php?variable1=cse">Computer Science Engineering</a></li>
          <li><a href="profile_display.php?variable1=me">Mechanical Engineering</a></li>
          <li><a href="profile_display.php?variable1=ee">Electrical Engineering</a></li>
        </ul>
      </li>
	  <li><a href="official_profile_display.php">Offcials</a></li>
      <li><a href="prof_loggedin.php">My Profile</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
	<div>
		<?php  if(!chkLogin())
			echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span>Login</a></li> </ul>";
			else 
				echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-in'></span>Logout</a></li> </ul>";
		?>
	</div>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Professors Profiles </h3>
  <p><?php  display_db(); ?></p>
</div>

</body>
</html>
