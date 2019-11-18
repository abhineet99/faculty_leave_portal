<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
	$email = $_SESSION['email'];
	$x=$_GET['email'];
	$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
	echo $x;
	$query = "Delete from facult.faculty where faculty.email='$x'";
	pg_query($query);
	header("Location: admin1.php");
	
?>