<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php
   $var = removeall();
		session_destroy();
        if($var){
            header("Location:home_faculty.php");
        }
        else{
            echo "Error!";
        }
?>
