<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php

   if(isset($_POST['reg'])){
       
        $about = $_POST['About'];
        $email = $_SESSION['email'];
        
        $doc_one=$collection->updateOne(
            ["email"=>$email],
            ['$set'=> ['About'=>$about] ]);
    


        echo "Updated!";
           echo"<br>";
        echo "<a href='register.php'>Update other stuff</a>  or <a href ='login.php'>logout</a>";
       
}

?>