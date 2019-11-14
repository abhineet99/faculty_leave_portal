<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php

   if(isset($_POST['reg'])){
       
        $pub_title = $_POST['pub_title'];
        $conf_name = $_POST['conf_name'];
        $year = $_POST['year'];
        $email = $_SESSION['email'];
        $publication=$pub_title.", ".$conf_name.", ".$year;
        $doc_one=$collection->findOne(
            ["email"=>$email]);
        $cur_pubs=(array)$doc_one['Publications'];
       // print_r($cur_pubs);
        array_push($cur_pubs,$publication);
       // print_r($cur_pubs);
        $doc_one=$collection->updateOne(
            ["email"=>$email],
            ['$set'=> ['Publications'=>$cur_pubs] ]);    

        echo "Updated!";
           echo"<br>";
        echo "<a href='prof_loggedin.php'>Home</a> ";
       
}

?>