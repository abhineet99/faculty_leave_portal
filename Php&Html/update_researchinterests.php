<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php

   if(isset($_POST['reg'])){
       
        $research = $_POST['research'];
        $email = $_SESSION['email'];
        
        $doc_one=$collection->updateOne(
            ["email"=>$email],
            ['$set'=> ['Research Interests'=>$research] ]);
    


        echo "Updated!";
           echo"<br>";
           echo "<a href='home.php'>Home</a> ";
       
}

?>