<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php

   if(isset($_POST['delete_pub'])){
       
        $key = $_POST['selectPub'];
		//print( (string)$pub_to_del);echo "<br>";
       // echo $edu;
        $email = $_SESSION['email'];
       // echo $email;
	   
        global $collection;
        $doc_one=$collection->findOne(
            ["email"=>$email]);
		$doc_one=(array)$doc_one['Publications'];
		if(sizeof($doc_one)==0)
			echo "No publications to be deleted!";
		else{
		unset($doc_one[$key]);
		//print_r($doc_one);
		
		$doc_one=$collection->updateOne(
            ["email"=>$email],
            ['$set'=> ['Publications'=>$doc_one] ]);  
		
    


        echo "Deleted!";}
           echo"<br>";
        echo "<a href='prof_loggedin.php'>Home</a> ";

       
}


?>
