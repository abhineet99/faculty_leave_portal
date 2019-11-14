<?php

    require_once 'library.php';
	display_db();
    if(chkLogin()){
        header("Location: prof_loggedin.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login_action.php">
		<div class="input-group">
			<label>Username</label>
			<input type="text" id="exampleInputEmail3" name="email" placeholder="Email" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" id="exampleInputPassword3" name="pass" placeholder="Password" required>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>


</body>
</html>


