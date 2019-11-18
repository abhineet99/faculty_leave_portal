<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
	$query="UPDATE facult.faculty set leaves_left=facult.posts.max_leaves-facult.faculty.leaves_borrowed,leaves_borrowed=0 from facult.posts where facult.faculty.post=facult.posts.name
";
pg_query($query);
	echo "Reset Done";
  echo"<br>";
        echo "<a href='admin1.php'>Home</a> ";
?>