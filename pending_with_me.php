<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
    $email = $_SESSION['email'];
?>

<?php

    //getting my post
	$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
		
    $query="SELECT post from facult.faculty where email='$email'";
    $post=pg_query($query);
    $post=pg_fetch_row($post);
    $post=$post[0];
    if($post=='faculty'){
        echo "You are not a cross cutting faculty!!\n";
        echo " <a href='prof_loggedin.php'>Home</a> ";
    }
    else{
        if($post=='hod'){
            //need to query department
            $query="SELECT department from facult.faculty where email='$email'";
            $dept=pg_query($query);
            $dept=pg_fetch_row($dept);
            $dept=$dept[0];
			//echo $dept;
            $query="SELECT * from facult.faculty,facult.leave where faculty.email=leave.sender_id AND facult.faculty.department='$dept' AND facult.leave.pending_id='hod' AND facult.leave.status=0";
			$result=pg_query($query);
			echo "Leave id        \t  Sender_id       \t  Date of Apply";
			echo "<br />\n";
			while ($row = pg_fetch_row($result)) 
		{
			$leave_id=$row[0];
			//$pending_id=$row[2];
			$senderid=$row[1];
			$doa=$row[4];
			echo "$leave_id    \t     $senderid \t       $doa  ";
			echo "<a href='show_leaves.php?variable1=$leave_id'>clickme</a>";
			echo "<br />\n";
            //INSERT CODE to display all these parameters(comments)
        }
		}
        else{
            //no need to fetch department in this case
            $query="SELECT * from facult.leave where facult.leave.pending_id='$post' AND facult.leave.status=0";
            $result=pg_query($query);
			echo "Leave id        \t  Sender_id       \t  Date of Apply";
			echo "<br />\n";
			while ($row = pg_fetch_row($result)) 
		{
			$leave_id=$row[0];
			//$pending_id=$row[2];
			$senderid=$row[1];
			$doa=$row[4];
			echo "$leave_id    \t     $senderid  \t       $doa  ";
			echo "<a href='show_leaves.php?variable1=$leave_id'>clickme</a>";
			echo "<br />\n";
			//print all these results and give link to leave details (comments)
        }
		}
    }
	?>