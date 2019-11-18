<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
    $email = $_SESSION['email'];
?>
<?php
if(isset($_POST['query'])){
        $query = $_POST['query1'];
		$facult=pg_connect("host=localhost port =5432 dbname=prof_leave user =postgres password = mahi121");
		$result=pg_query($query);
		while ($row = pg_fetch_row($result)) 
		{
			var_dump( $row);
			echo"<br> ";
		}
		      echo"<br>";
        echo "<a href='admin1.php'>Home</a> ";
}
		