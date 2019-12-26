<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php

   if(isset($_POST['reg'])){
       
        $grant_info = $_POST['grant'];
		$email = $_SESSION['email'];
        $doc_one=$collection->findOne(
            ["email"=>$email]
			,['projection'=>['_id'=>0,'Grants'=>1]]);
		if(sizeof($doc_one)>0){
        $cur_pubs=(array)$doc_one['Grants'];
       // print_r($cur_pubs);
        array_push($cur_pubs,$grant_info);}

       // print_r($cur_pubs);
	   else
		$cur_pubs=(array)$grant_info;
        $doc_one=$collection->updateOne(
            ["email"=>$email],
            ['$set'=> ['Grants'=>$cur_pubs] ]);    

        echo "Updated!";
           echo"<br>";
        echo "<a href='prof_loggedin.php'>Home</a> ";
       
}

?>