<!DOCTYPE html>
<html lang="en">
<head>
<title>Leave Details  </title>
<title>Leave  </title>
<body>
<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
	
	
    $email = $_SESSION['email'];
	$x=$_GET['variable1'];
	$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
		
		$query="SELECT * from facult.comments where leave_id='$x' ";
		$result=pg_query($query);
		$query1="SELECT * from facult.leave where leave_id='$x' ";
		$result1=pg_query($query1);
		$result1=pg_fetch_row($result1);
		
		//$count = pg_fetch_all($count);
		echo "<table><tr>
<th>Writer</th>  
<th>Comment</th>
<th>Date Of Comment</th>
<th>Link </th>
</tr>";
		while ($row = pg_fetch_row($result)) 
		{ 
			$comment_id=$row[0];
			//$pending_id=$row[2];
			$writerpost=$row[3];
			$comment=$row[5];
			$dat=$row[4];
			echo "<tr><td>" .$writerpost. "</td><td>" .  $comment  . "</td><td>"
.  $dat. "</td></tr>";
		}
		echo "</table>";
		$query="Select post from facult.faculty where facult.faculty.email='$email'";
		$post=pg_query($query);
		$post = pg_fetch_row($post);
		$post=$post[0];
			//if($result1[2]==$post)
			echo "<form action='add_comments.php' method ='post' >
			<div class='item'>
          <p>Comments</p>
          <textarea name = 'comment' rows='5' ></textarea>
        </div>
         <div class='btn-block'>
          <button type='submit' name='add_comment' >Send</button>
        </div>
      </form>";
echo "---------------------";
echo "<br />\n";
	
	?>