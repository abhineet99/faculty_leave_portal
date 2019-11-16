<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
    $email = $_SESSION['email'];
?>

<?php
if(isset($_POST['leavee'])){
	$startdate = $_POST['startdate'];
        $endate = $_POST['endate'];
        $comment = $_POST['comment'];
		//echo $comment;
		$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
		
		$query="SELECT COUNT(*) from facult.leave where sender_id='$email' AND status=0";
		$count=pg_query($query);
		$count = pg_fetch_row($count);
		$count=$count[0];
		if($count>0)
		{echo "You have already submitted one application";
		 echo "<a href='prof_loggedin.php'>Home</a>";
		}

		else
		{
		$query="Select post from facult.faculty where facult.faculty.email='$email'";
		$post=pg_query($query);
		$post = pg_fetch_row($post);
		$post=$post[0];
		
		
		$query="SELECT next_post from facult.next_guy where start_post='$post'";
		$nextpost=pg_query($query);
		$nextpost = pg_fetch_row($nextpost);
		echo $nextpost[0];
		$nextpost=$nextpost[0];
		
		$query="INSERT INTO facult.leave(sender_id,pending_id,status,dos,doe) VALUES ('$email'
		,'$nextpost',0,'$startdate','$endate')";
		pg_query($query);
		
		$query="SELECT leave_id from facult.leave where sender_id='$email' AND status=0";
		$leaveid=pg_query($query);
		$leaveid = pg_fetch_row($leaveid);
		$leaveid=$leaveid[0];
		
		$query="INSERT INTO facult.comments (leave_id,sender_id,writer_post,comment) VALUES ('$leaveid','$email','$post','$comment')";
		pg_query($query);
		}

}
	?>