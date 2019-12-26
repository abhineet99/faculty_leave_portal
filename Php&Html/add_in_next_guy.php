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
	$query="select count(name) from facult.posts where name='$sender'";
	$result1=pg_query($query);
	$result1=pg_fetch_row($result1);
	if($result1[0]==1)
	{
	if($result[0]==0)
	{
	$query = "INSERT INTO facult.next_guy VALUES ('$sender','$reciever')";
	pg_query($query);
	echo "Updated!";
	}
	else
	{
		echo " Already in Table ";
	}
	}
	else 
		echo "Not in --- table";
           echo"<br>";
        echo "<a href='admin1.php'>Home</a> ";
       
}

?>