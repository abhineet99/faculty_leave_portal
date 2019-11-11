<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php

   if(isset($_POST['reg'])){
       
        $desig = $_POST['desig'];
        $email = $_SESSION['email'];
        
        $doc_one=$collection->updateOne(
            ["email"=>$email],
            ['$set'=> ['Designation'=>$desig] ]);
    


        echo "Updated!";
           echo"<br>";
           echo "<a href='home.php'>Home</a> ";
       
}

?>