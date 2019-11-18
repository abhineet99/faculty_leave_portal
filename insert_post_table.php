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
	$query = $query = "INSERT INTO facult.posts VALUES ('$sender','$reciever')";
	pg_query($query);
           //echo"<br>";
        echo "<a href='admin1.php'>Home</a> ";
       
}

?>