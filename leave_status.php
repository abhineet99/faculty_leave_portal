<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
    $email = $_SESSION['email'];
	$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
		
		$query="SELECT * from facult.leave where sender_id='$email' and status !=0";
		$result=pg_query($query);
		//$count = pg_fetch_all($count);
		echo "Processed Leaves-----------";
		echo "<br />\n";
		while ($row = pg_fetch_row($result)) 
		{
			//$query= "Select doa from facult.leaves where facult.comments.sender_id='$email' and facult.comments.leave_id='$row[2]'"; 
			$leave_id=$row[0];
			//$pending_id=$row[2];
			$status=$row[3];
			$doa=$row[4];
			echo "Leave id        \t  Status       \t  Date of Apply";
			echo "<br />\n";
			echo "$leave_id    \t     $status  \t       $doa  ";
			echo "<a href='show_leaves.php?variable1=$leave_id'>clickme</a>";
			echo "<br />\n";
		}
echo "---------------------";
echo "<br />\n";

$query="SELECT * from facult.leave where sender_id='$email' and status =0";
		$result=pg_query($query);
		//$count = pg_fetch_all($count);
		echo "Pending Leaves-----------";
		echo "<br />\n";
		echo "Leave id        \t  Status       \t  Date of Apply";
			echo "<br />\n";
		while ($row = pg_fetch_row($result)) 
		{
			$leave_id=$row[0];
			$status=$row[3];
			$doa=$row[4];
			echo "$leave_id    \t     $status  \t       $doa  ";
			echo "<a href='show_leaves.php?variable1=$leave_id'>clickme</a>";
			echo "<br />\n";
		}
		
    //echo $email;
?>