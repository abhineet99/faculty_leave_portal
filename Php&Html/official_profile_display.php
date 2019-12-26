<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div><?php
require_once __DIR__ . "/vendor/autoload.php";
require_once 'library.php';
$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
$m=(new MongoDB\Client);
		$dp=$m->profile_fac;
		$collection=$dp->fac_prof;
		$doclist=$collection->find();
		foreach($doclist as $doc)
		{
           $email=$doc['email'];
		   $query="Select post from facult.current_cross_cutting where current_cross_cutting.faculty_id='$email'";
		   $result=pg_query($query);
		   $result = pg_fetch_row($result);
		      $query="Select count(post) from facult.current_cross_cutting where current_cross_cutting.faculty_id='$email'";
		   $result1=pg_query($query);
		   $result1 = pg_fetch_row($result1);
		   //$result=$result[0];
		   if($result1[0]!=0)
		   {
			   echo $doc['First Name'];
			   echo " ";
			   echo $doc['Last Name'];
			   $las=$doc['Last Name'];
			   $full=$doc['First Name'];
               echo "<br>";
			   echo "post = '$result[0]' \n";
			   echo "<li><a href='show_prof.php?variabl1=$email&variabl2=$full&variabl3=$las'>Profile Link</a></li>";
			   echo "<<----------------------------------------------------->>";
			   echo "</br \n>";
		   }
		}
?>
</div>
</body>
</html>