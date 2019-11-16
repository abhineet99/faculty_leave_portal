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
		echo "Leave detail----------";
		echo "<br />\n";
		while ($row = pg_fetch_row($result)) 
		{ 
			$comment_id=$row[0];
			//$pending_id=$row[2];
			$writerpost=$row[3];
			$comment=$row[5];
			$dat=$row[4];
			echo "$comment    \t  ||   $writerpost  \t  ||     $dat  ";
			echo "<br />\n";
		}
			if($result1[2]=='faculty')
			echo "<form action='add_comments.php' method ='post' >
			<div class='item'>
          <p>Comments</p>
          <textarea name = 'comment' rows='5' ?variable1=$x></textarea>
        </div>
         <div class='btn-block'>
          <button type='submit' name='add_comment' >Send</button>
        </div>
      </form>";
echo "---------------------";
echo "<br />\n";
	
	?>