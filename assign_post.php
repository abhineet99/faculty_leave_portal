<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
    $email = $_SESSION['email'];
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
           if($result[0]==0  && $email1!='admin@mydb.com' )
           {
            echo $doc['First Name'];
            echo " ";
            echo $doc['Last Name'];
            echo "<br>";
            echo "<a href='poster.php?variable1=$email1'>clickme</a>";
            echo "<br />\n";
            echo "-------------------------------------------------------------- \n";
           }     
        }
        ?>    