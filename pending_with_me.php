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
			echo "<table><tr>
<th>Leave ID</th>  
<th>post</th>
<th>Sender_id</th>
<th>Date of Apply</th>
<th>Link </th>
</tr>";
        if($post=='hod'){
            //need to query department
            $query="SELECT department,post from facult.faculty where email='$email'";
            $dept=pg_query($query);
            $dept1=pg_fetch_row($dept);
            $dept=$dept1[0];
			$poster=$dept1[1];
			//echo $dept;
            $query="SELECT leave.leave_id,leave.sender_id,leave.doa from facult.faculty,facult.leave where faculty.email=leave.sender_id AND facult.faculty.department='$dept' AND facult.leave.pending_id='hod' AND facult.leave.status=0";
			$result=pg_query($query);
			//echo "Leave id        \t  Sender_id       \t  Date of Apply";
			//echo "<br />\n";
			while ($row = pg_fetch_row($result)) 
		{
			$leave_id=$row[0];
			//$pending_id=$row[2];
			$senderid=$row[1];
			$doa=$row[2];
			$query1="SELECT post from facult.faculty where email='$senderid'";
            $dept1=pg_query($query1);
            $dept1=pg_fetch_row($dept1);
            $poster=$dept1[0];
			//$poster=$dept1[1];
			echo "<tr><td>" .$leave_id. "</td><td>" .$poster. "</td><td>" .  $senderid  . "</td><td>"
.  $doa. "</td><td><a href='deal_applications.php?variable1=$leave_id'>Link</a></td></tr>";
			//echo "$leave_id    \t     $senderid \t       $doa  ";
			//echo "<a href='deal_applications.php?variable1=$leave_id'>clickme</a>";
			//echo "<br />\n";
            //INSERT CODE to display all these parameters(comments)
        }
		}
        else{
            //no need to fetch department in this case
            $query="SELECT leave.leave_id,leave.sender_id,leave.doa from facult.leave where facult.leave.pending_id='$post' AND facult.leave.status=0";
            $result=pg_query($query);
			while ($row = pg_fetch_row($result)) 
		{
			$leave_id=$row[0];
			//$pending_id=$row[2];
			$senderid=$row[1];
			$doa=$row[2];
			$query1="SELECT post from facult.faculty where email='$senderid'";
            $dept1=pg_query($query1);
            $dept1=pg_fetch_row($dept1);
            $poster=$dept1[0];
			echo "<tr><td>" .$leave_id. "</td><td>" .$poster. "</td><td>" .  $senderid  . "</td><td>"
.  $doa. "</td><td><a href='deal_applications.php?variable1=$leave_id'>Link</a></td></tr>";
			//echo "$leave_id    \t     $senderid  \t       $doa  ";
			//echo "<a href='deal_applications.php?variable1=$leave_id'>clickme</a>";
			//echo "<br />\n";
			//print all these results and give link to leave details (comments)
        }
		}
		echo "</table>";
    }
	?>
	</body>
</html>