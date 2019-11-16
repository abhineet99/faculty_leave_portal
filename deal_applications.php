<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
	
	
    $email = $_SESSION['email'];
	$x=$_GET['variable1'];
	$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
