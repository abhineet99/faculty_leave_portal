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
            echo $doc['name'];
            echo "<br>";
            echo $doc['Designation'];
            echo "<br>";
            echo $doc['ResearchIntern'];
            echo "<br>";
            echo "<br>";

        }
        $arrays = array(
            
            "How to kill Vineet",
            "Deep Learning for fudu guy detection",
            "Kyu pdh rha h bro",
            "last publication"
        
        );
        $doc_one=$collection->updateOne(
                                        ["name"=>"Abhineet"],
                                        ['$set'=> ['pubs'=>$arrays] ]);
     

	}
    function register($document){
        global $collection;
        $collection->insertOne($document);
        return true;
    }
    
    function chkemail($email){
        global $collection;
        $temp = $collection->findOne(array('Email Address'=> $email));
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
        $temp = $collection->findOne(array('Email Address'=> $email));
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
