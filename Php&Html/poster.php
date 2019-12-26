<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
	$email = $_SESSION['email'];
	$post =$_GET['post'];
	$department =$_GET['department'];
	$x=$_GET['action'];
	$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
	$query="select count(name) from facult.posts where name = '$post'";
	$valid_post=pg_query($query);
	$valid_post=pg_fetch_row($valid_post);
	$valid_post=$valid_post[0];
	if($valid_post!=0 && ($department=='cse' ||$department=='me'||$department=='ee'||$department==''))
	{
	$query ="Select max_leaves from facult.posts where posts.name='$post'";
	$max_leaves=pg_query($query);
	$max_leaves=pg_fetch_row($max_leaves);
	$max_leaves=$max_leaves[0];
	$borro=0;
	if($post!='faculty')
	{
		$query = "insert into facult.faculty(email,post,department,leaves_left,leaves_borrowed) Values('$x','faculty','$department','$max_leaves','$borro')";
		pg_query($query);
		$query ="Update facult.faculty set post ='$post' where email = '$x'";
	pg_query($query);
	echo $post;
	}
	else
	{
	$query = "insert into facult.faculty(email,post,department,leaves_left,leaves_borrowed) Values('$x','$post','$department','$max_leaves','$borro')";
	pg_query($query);
	}
	header("Location: admin1.php");
	}
	else
	{echo "Wrong Entries ";
           echo"<br>";
		   echo "<a href='admin1.php'>Admin_Home</a> ";
	}
?>
