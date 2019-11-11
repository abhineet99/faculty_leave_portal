<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php

   if(isset($_POST['reg'])){
       
        $about = $_POST['About'];
        //echo $about;
        $email = $_SESSION['email'];
        
        $doc_one=$collection->updateOne(
            ["email"=>$email],
            ['$set'=> ['About'=>$about] ]);
    


        echo "Updated!";
           echo"<br>";
        echo "<a href='home.php'>Home</a> ";
       
}

?>