<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
    $email = $_SESSION['email'];
?>

<?php
//assuming I hav $email and $leave_id,$comment
if(isset($_POST['forward']))
{
	$leave_id=$_POST['leave_id'];
	//echo "asdfghjkjhgfdfghj,hgfsdfghjmnfddfghnm";
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
	 $comment = $_POST['comment'];
	 //echo $leave_id;
	 if($button_name=="Accept")
	 {
    $facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
    $query="SELECT dos,doe from facult.leave where leave_id=$leave_id ";
    $result=pg_query($query);
    $result=pg_fetch_row($result);
    $dos = $result[0];
    $doe= $result[1];
    $days=$doe-$dos;

    //query for applier's ID
    $query="Select sender_id from facult.leave where facult.leave.leave_id=$leave_id";
    $sender_id=pg_query($query);
    $sender_id = pg_fetch_row($sender_id);
    $sender_id=$sender_id[0];
    //query to get available leaves
    $query="Select leaves_left,post,leaves_borrowed from facult.faculty where facult.email='$sender_id'";
    $result=pg_query($query);
    $result=pg_fetch_row($result);
    $apply_post=$result[1];
    $leaves_left=$result[0];
    $leaves_borrowed=$result[2];
    $query="SELECT max_leaves from facult.faculty where name='$apply_post'";
    $result=pg_query($query);
    $result=pg_fetch_row($result);
    $max_leaves=$result[0];

    if($days>$leaves_left){
        $diff=$days-$leaves_left;
        $leaves_borrowed=$leaves_borrowed+$diff;
        $leaves_left=0;
        $query="UPDATE facult.faculty SET leaves_left=$leaves_left,leaves_borrowed=$leaves_borrowed where  faculty.email='$sender_id'";
        pg_query($query);
    }
    else{
        $leaves_left= $leaves_left-$days;
        $query="UPDATE facult.faculty SET leaves_left=$leaves_left where  faculty.email='$sender_id'";
    }
    $query="UPDATE facult.leave SET status=1 where leave_id=$leave_id ";
    $execute=pg_query($query);
    $query="Select post from facult.faculty where facult.faculty.email='$email'";
    $post=pg_query($query);
    $post = pg_fetch_row($post);
    $post=$post[0];

    if($comment!=NULL){
        $query="INSERT INTO facult.comments(leave_id,sender_id,writer_post,comment) VALUES($leave_id,'$sender_id','$post','$comment')";
        $execute=pg_query($query);

    }
    echo "Done!";
    echo "<a href='prof_loggedin.php'>Home</a>";
	 }
	 else 
	 {
		  $facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
    $query="Select post from facult.faculty where facult.faculty.email='$email'";
    $post=pg_query($query);
    $post = pg_fetch_row($post);
    $post=$post[0];
    $query="Select  next_post from facult.next_guy where facult.next_guy.start_post='$post'";
    $next_post=pg_query($query);
    $next_post = pg_fetch_row($next_post);
    $next_post=$next_post[0];
    $query="UPDATE facult.leave SET pending_id='$next_post' where leave_id=$leave_id AND status=0";
    $execute=pg_query($query);
    $query="Select sender_id from facult.leave where facult.leave.leave_id=$leave_id";
    $sender_id=pg_query($query);
    $sender_id = pg_fetch_row($sender_id);
    $sender_id=$sender_id[0];
    if($comment!=NULL){
        $query="INSERT INTO facult.comments(leave_id,sender_id,writer_post,comment) VALUES($leave_id,'$sender_id','$post','$comment')";
        $execute=pg_query($query);
    }
    echo "Done!";
    echo "<a href='prof_loggedin.php'>Home</a>";
	 }
}
if(isset($_POST['reject']))
{$leave_id=$_POST['leave_id'];
$comment = $_POST['comment'];
	$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
    $query="UPDATE facult.leave SET status=-1 where leave_id=$leave_id ";
    $execute=pg_query($query);
    $query="Select post from facult.faculty where facult.faculty.email='$email'";
    $post=pg_query($query);
    $post = pg_fetch_row($post);
    $post=$post[0];
    $query="Select sender_id from facult.leave where facult.leave.leave_id=$leave_id";
    $sender_id=pg_query($query);
    $sender_id = pg_fetch_row($sender_id);
    $sender_id=$sender_id[0];
    if($comment!=NULL){
        $query="INSERT INTO facult.comments(leave_id,sender_id,writer_post,comment) VALUES($leave_id,'$sender_id','$post','$comment')";
        $execute=pg_query($query);
    }
    echo "Done!";
    echo "<a href='prof_loggedin.php'>Home</a>";
}
if(isset($_POST['sendback']))
{
	$leave_id=$_POST['leave_id'];
$comment = $_POST['comment'];
	$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
    $query="Select post from facult.faculty where facult.faculty.email='$email'";
    $post=pg_query($query);
    $post = pg_fetch_row($post);
    $post=$post[0];
    $query="Select sender_id from facult.leave where facult.leave.leave_id=$leave_id";
    $sender_id=pg_query($query);
    $sender_id = pg_fetch_row($sender_id);
    $sender_id=$sender_id[0];
    $query="Select post from facult.faculty where facult.faculty.email='$sender_id'";
    $sender_post=pg_query($query);
    $sender_post = pg_fetch_row($sender_post);
    $sender_post=$sender_post[0];
    $query="UPDATE facult.leave SET pending_id='$sender_post' where leave_id=$leave_id AND status=0";
    $execute=pg_query($query);
    if($comment!=NULL){
        $query="INSERT INTO facult.comments(leave_id,sender_id,writer_post,comment) VALUES($leave_id,'$sender_id','$post','$comment')";
        $execute=pg_query($query);
    }
    echo "Done!";
    echo "<a href='prof_loggedin.php'>Home</a>";
}
?>