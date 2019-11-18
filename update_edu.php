<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php

   if(isset($_POST['reg'])){
       
        $edu = $_POST['edu'];
       // echo $edu;
        $email = $_SESSION['email'];
       // echo $email;
        global $collection;
        $doc_one=$collection->updateOne(
            ["email"=>$email],
            ['$set'=> ['Educational Background'=>$edu] ]);
    


        echo "Updated!";
           echo"<br>";
        echo "<a href='prof_loggedin.php'>Home</a> ";

       
}

?>
