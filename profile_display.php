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
$department=$_GET['variable1'];
$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
$m=(new MongoDB\Client);
		$dp=$m->profile_fac;
		$collection=$dp->fac_prof;
		$doclist=$collection->find();
		foreach($doclist as $doc)
		{
           $email=$doc['email'];
		   $query="Select department,post from facult.faculty where faculty.email='$email'";
		   $result=pg_query($query);
		   $result = pg_fetch_row($result);
		   //$result=$result[0];
		   if($result[0]==$department)
		   {
			   echo $doc['First Name'];
			   echo " ";
			   echo $doc['Last Name'];
               echo "<br>";
			   echo "post = '$result[1]' \n";
			   echo "<li><a href='show_prof.php'>clickme</a></li>";
		   }
		}
?>
</div>
</body>
</html>