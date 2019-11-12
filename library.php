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
            $email=$doc['email'];
            echo $doc['First Name'];
            echo " ";
            echo $doc['Last Name'];
            echo "<br>";
            echo $doc['email'];
            echo "<br> <br>";
            
            $query=$collection->findOne(
                    ['email'=>$email],
                    ['projection'=>['_id'=>0,'Designation'=>1]]);
            if(sizeof($query)>0){
                echo "Designation: <br>";
                echo $doc['Designation'];
                echo "<br> <br>";
            }
            $query=$collection->findOne(
                ['email'=>$email],
                ['projection'=>['_id'=>0,'About'=>1]]);
            if(sizeof($query)>0){
                echo "About: <br>";
                echo $doc['About'];
                echo "<br> <br>";
            }
            $query=$collection->findOne(
                ['email'=>$email],
                ['projection'=>['_id'=>0,'Educational Background'=>1]]);            
            if(sizeof($query)>0){
                echo "Educational background <br>";
                echo $doc['Educational Background'];

                echo "<br> <br>";
            }
            $query=$collection->findOne(
                ['email'=>$email],
                ['projection'=>['_id'=>0,'Publications'=>1]]);            
            if(sizeof($query)>0){
            echo "Publications <br>";
            foreach($doc['Publications'] as $pub){
                echo $pub;
                echo"<br> <br>";
            }
            }
            $query=$collection->findOne(
                ['email'=>$email],
                ['projection'=>['_id'=>0,'Research Interests'=>1]]);            
            if(sizeof($query)>0){
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
        if(sizeof($_SESSION)>0){
            if($_SESSION["userLoggedIn"]== 1){
                return true;
            }
            else{
                return false;
            }
        }
        return false;    
    }
    function removeall(){
        unset($_SESSION["userLoggedIn"]);
        unset($_SESSION["uname"]);
        unset($_SESSION["email"]);
        return true;
    }

?>
