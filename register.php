<?php
    require_once 'library.php';
    if(chkLogin()){
        header("Location: home.php");
    }
?>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register_action.php">

		<div class="input-group">
			<label>First Name</label>
			<input type="text" id="inputFname3" name="fname" placeholder="First Name" required >
		</div>
		<div class="input-group">
			<label>Last Name</label>
			<input type="text" id="inputLname3" name="lname" placeholder="Last Name" required>
		</div>
			<div class="input-group">
			<label>email</label>
			<input type="email" id="inputEmail3" name="email" placeholder="Email" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" id="pass" name="pass" placeholder="Password" required>
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" id="cpass" name="cpass" onblur="chk()" placeholder="Confirm Password" required>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>
