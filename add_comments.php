<?php
    require_once 'library.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
    $email = $_SESSION['email'];
	//$x=$_GET['variable1'];
?>
<?php
if(isset($_POST['add_comment']))
{
 $comment = $_POST['comment'];
 echo $comment;
 
 $query="SELECT * from facult.leave where sender_id='$email' and status =0";
		$result=pg_query($query);
		$result = pg_fetch_row($result);
		$leaveid=$result[0];
		$sender_id=$result[1];
		$pendingid=$result[2];
		
		$query="Select post from facult.faculty where facult.faculty.email='$email'";
		$post=pg_query($query);
		$post = pg_fetch_row($post);
		$post=$post[0];
		
		$query="SELECT next_post from facult.next_guy where start_post='$post'";
		$nextpost=pg_query($query);
		$nextpost = pg_fetch_row($nextpost);
		$nextpost=$nextpost[0];
		$query="INSERT INTO facult.comments (leave_id,sender_id,writer_post,comment) VALUES ('$leaveid','$email','$post','$comment')";
		pg_query($query);
		$query= "UPDATE facult.leave set pending_id='$nextpost' where leave_id='$leaveid'";
		pg_query($query);
		
}

	?>