<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php

   if(isset($_POST['reg'])){
       
        $fname = $_POST['About'];
        $doc_one=$collection->updateOne(
            ["name"=>"Abhineet"],
            ['$set'=> ['pubs'=>$arrays] ]);
    

        if($query){
            register($arrays);
            header("Location: login.php");
            }
       else{
        echo "Updated!";
           echo"<br>";
        echo "<a href='register.php'>Update other stuff</a>  or <a href ='login.php'>logout</a>";
       }
}

?>