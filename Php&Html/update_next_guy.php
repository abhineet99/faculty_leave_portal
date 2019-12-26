<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
	
?>

<?php

   if(isset($_POST['reg'])){
       
        $sender = $_POST['sender'];
		 $reciever = $_POST['reciever'];
		$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
	$query="select count(start_post) from facult.next_guy where start_post='$sender'";
	$result=pg_query($query);
	$result=pg_fetch_row($result);
	if($result[0]!=0)
	{
	$query = "Update facult.next_guy set  next_post='$reciever' where start_post= '$sender'";
	pg_query($query);
	echo "Updated!";
	}
	else
	{
		echo "Not in Table ";
	}
           echo"<br>";
        echo "<a href='admin1.php'>Home</a> ";
       
}

?>