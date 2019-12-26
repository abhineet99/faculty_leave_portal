<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
	$email = $_GET['email'];
	$new_post=$_GET['newpost'];
	$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
	$query="select count(email) from facult.faculty where faculty.email='$email'";
	$valid_post=pg_query($query);
	$valid_post=pg_fetch_row($valid_post);
	$valid_post=$valid_post[0];
	$query="select count(name) from facult.posts where name = '$new_post'";
	$vpost=pg_query($query);
	$vpost=pg_fetch_row($vpost);
	$vpost=$vpost[0];
	if($valid_post!=0 && $vpost!=0)
	{$query ="Update facult.faculty set post ='$new_post' where email = '$email'";
	pg_query($query);
	
	header("Location: admin1.php");}
	else
	{echo "Wrong Entries ";
           echo"<br>";
		   echo "<a href='admin1.php'>Admin_Home</a> ";
	}
?>