<!DOCTYPE html>
<html lang="en">
<head>
<title>Pending Leaves  </title>
<body>
<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
	
	
    $email = $_SESSION['email'];
	$leave_id=$_GET['variable1'];
	$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
	$query="SELECT * from facult.leave where leave_id='$leave_id'";
	$leave=pg_query($query);
	$leave = pg_fetch_row($leave);
	echo " leave id -- '$leave[0]' sender_id -- '$leave[1]' apply date -- '$leave[4]'  start date -- '$leave[5]' end date -- '$leave[6]'";
	echo "<br />\n";
	$query="SELECT * from facult.comments where comments.leave_id='$leave_id' ";
	$result=pg_query($query);
			echo "<table><tr>
<th>CommentID</th>  
<th>Senderid</th>
<th>Writer post</th>
<th>Date of Apply</th>
<th>Comment</th>
</tr>";
	while ($row = pg_fetch_row($result)) 
		{ 
			$comment_id=$row[0];
			$sender_id=$row[2];
			$writerpost=$row[3];
			$comment=$row[5];
			$dat=$row[4];
			echo "<tr><td>" .$comment_id. "</td><td>" .$sender_id. "</td><td>" .  $writerpost  . "</td><td>"
.  $dat. "</td><td>".$comment ."</td></tr>";
			//echo "$comment_id    \t  ||   $sender_id  \t  ||     $writerpost || $dat  ||  $comment ";
			//echo "<br />\n";
		}
		
		echo "----------------------------------------- \n";
	$query="Select sender_id from facult.leave where facult.leave.leave_id=$leave_id";
    $sender_id=pg_query($query);
    $sender_id = pg_fetch_row($sender_id);
    $sender_id=$sender_id[0];
    $query="Select post from facult.faculty where facult.faculty.email='$sender_id'";
    $sender_post=pg_query($query);
    $sender_post = pg_fetch_row($sender_post);
    $sender_post=$sender_post[0];
	
	$query="Select post from facult.faculty where facult.faculty.email='$email'";
	$post=pg_query($query);
	$post = pg_fetch_row($post);
	$post=$post[0];

	$query="Select facult.start_end.end_post from facult.start_end where facult.start_end.start_post='$sender_post'";
	$end_post=pg_query($query);
	$end_post = pg_fetch_row($end_post);
    $end_post=$end_post[0];
	if($end_post==$post)
		$button_name="Accept";
	else
		 $button_name="Forward";
		echo "<form action='accept_action.php' method ='post' >
		<div class='input-group'>
			<label></label>
			<input type='hidden' id='inputLname3' name='leave_id' value = $leave_id>
		</div>
			<div class='item'>
          <p>Comments</p>
          <textarea name = 'comment' rows='5' ></textarea>
        </div>
         <div class='btn-block'>
          <button type='submit' name='reject' >Reject</button>
        </div>
		<div class='btn-block'>
          <button type='submit' name='forward' >$button_name</button>
        </div><div class='btn-block'>
          <button type='submit' name='sendback' >Send Back</button>
        </div>
      </form>";
	   echo "</table>";
		
?>
	</body>
</html>