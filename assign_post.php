<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
    $email = $_SESSION['email']; ?>
	
	
	
	<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body>
	<div>
	<?php
	require_once __DIR__ . "/vendor/autoload.php";
require_once 'library.php';
$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
$m=(new MongoDB\Client);
		$dp=$m->profile_fac;
		$collection=$dp->fac_prof;
		$doclist=$collection->find();
		foreach($doclist as $doc)
		{
           $email1=$doc['email'];
		   $query="Select count(email) from facult.faculty where faculty.email='$email1'";
		   $result=pg_query($query);
           $result = pg_fetch_row($result);
		   $query="Select count(email) from facult.archive_faculty where email='$email1'";
		   $result1=pg_query($query);
           $result1 = pg_fetch_row($result1);
           if($result[0]==0  && $result1[0]==0 &&$email1!='admin@mydb.com' )
           {
            echo $doc['First Name'];
            echo " ";
            echo $doc['Last Name'];
            echo "<br>";
            echo " <form action='poster.php'>
  Post:<br>
  <input type='text' name='post' value=''>
  <input type='hidden' name='action' value='$email1'>
  <br>
  Department:<br>
  <input type='text' name='department' value=''>
  <br><br>
  <input type='submit' value='Submit'>
</form> ";
            echo "<br />\n";
            echo "--------------------------------------------------------------";
			echo "<br />\n";
           }     
        }
		echo "<a href='admin1.php'>Admin_Home</a> ";
        ?> 
</div>
    </body>
</html>