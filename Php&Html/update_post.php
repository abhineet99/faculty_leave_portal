<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
    $email = $_SESSION['email']; ?>
	
	
	
	<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body>
	<div>
	<?php
	require_once __DIR__ . "/vendor/autoload.php";
require_once 'library.php';

               echo " <form action='post_update_faculty.php'>
  Email:<br>
  <input type='text' name='email' value=''>
  <br>
  New Post:<br>
  <input type='text' name='newpost' value=''>
  <br><br>
  <input type='submit' value='Submit'>
</form> ";
        ?> 
</div>
    </body>
</html>