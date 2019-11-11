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
        $cur_pubs=(array)$doc['Publications'];
        array_push($cur_pubs,$publication);
        $doc_one=$collection->updateOne(
            ["email"=>$email],
            ['$set'=> ['Publication'=>$cur_pubs] ]);    

        echo "Updated!";
           echo"<br>";
        echo "<a href='register.php'>Update other stuff</a>  or <a href ='login.php'>logout</a>";
       
}

?>