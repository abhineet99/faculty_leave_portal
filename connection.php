<?php
    require_once __DIR__ . "/vendor/autoload.php";
    try{
		$m=(new MongoDB\Client);

     //echo "Connection to database Successfull!";echo"<br />";

    $db = $m->try_1_nov_9;
    //echo "Databse loginreg selected";
    $collection = $db->fac_prof; 
    //echo "Collection userdata Selected Successfully";
    }
    catch (Exception $e){
        die("Error. Couldn't connect to the server. Please Check");
    }
       session_start();
?>