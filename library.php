<?php
	require_once __DIR__ . "/vendor/autoload.php";
    // echo extension_loaded("mongodb") ? "loaded\n" : "not loaded\n";
    session_start();
	function display_db(){
		$m=(new MongoDB\Client);
		$dp=$m->try_1_nov_9;
		$collection=$dp->fac_prof;
        //$collection->insertOne(["name"=>"Abhineet","Designation"=>"FuduProf","ResearchIntern"=>"Aish"]);
        //$collection->insertOne(["name"=>"Piyush","Designation"=>"LmaoProf","ResearchIntern"=>"AishHiAish"]);
        $doclist=$collection->find();
        foreach($doclist as $doc){
            
            echo $doc['First Name'];
            echo " ";
            echo $doc['Last Name'];
            echo "<br>";
            echo $doc['email'];
            echo "<br> <br>";
            $query=$collection->findOne({'email'=> $email,{'Designation' : {$exists : true }}});
            if(!is_null($doc['Designation'])){
                echo "Designation: <br>";
                echo $doc['Designation'];
                echo "<br> <br>";
            }
            if(!is_null($doc['About'])){
                echo "About: <br>";
                echo $doc['About'];
                echo "<br> <br>";
            }
            if(!is_null($doc['Educational Background'])){
                echo "Educational background <br>";
                echo $doc['Educational Background'];

                echo "<br> <br>";
            }
            if(!is_null($doc['Publications'])){
            echo "Publications <br>";
            foreach($doc['Publications'] as $pub){
                echo $pub;
                echo"<br> <br>";
            }
            }
            if(!is_null($doc['Research Interests'])){
                echo "Research Interests <br>";
                echo $doc['Research Interests'];
                echo "<br>";
            }
            echo "-------------------------------------------------------------";
            echo "<br>";       
            echo "<br>";

        }

     

	}
    function register($document){
        global $collection;
        $collection->insertOne($document);
        return true;
    }
    
    function chkemail($email){
        global $collection;
        $temp = $collection->findOne(array('email'=> $email));
        if(empty($temp)){
        return true;
        }
        else{
            return false;
        }
    }
    function setsession($email){
     
       
        
        $_SESSION["userLoggedIn"] = 1;
        global $collection;
        $temp = $collection->findOne(array('email'=> $email));
        $_SESSION["uname"] = $temp["First Name"];
        $_SESSION["email"] = $email;
        return true;
        
    }
    function chkLogin(){
        
        //var_dump($_SESSION);
        
        if($_SESSION["userLoggedIn"]== 1){
            return true;
        }
        else{
            return false;
        }
    }
    function removeall(){
        unset($_SESSION["userLoggedIn"]);
        unset($_SESSION["uname"]);
        unset($_SESSION["email"]);
        return true;
    }

?>
