<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php

   if(isset($_POST['reg'])){
       
        $award_info = $_POST['award'];
		$email = $_SESSION['email'];
        $doc_one=$collection->findOne(
            ["email"=>$email]);
        $cur_pubs=(array)$doc_one['Awards'];
		
       // print_r($cur_pubs);
        array_push($cur_pubs,$award_info);
		
       // print_r($cur_pubs);
        $doc_one=$collection->updateOne(
            ["email"=>$email],
            ['$set'=> ['Awards'=>$cur_pubs] ]);    

        echo "Updated!";
           echo"<br>";
        echo "<a href='prof_loggedin.php'>Home</a> ";
       
}

?>