<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
    $email = $_SESSION['email'];
?>

<?php

    //getting my post
    $query="SELECT post from facult.faculty where email='$email";
    $post=pg_query($query);
    $post=pg_fetch_row($post);
    $post=$post[0];
    if($post=='faculty'){
        echo "You are not a cross cutting faculty!!\n";
        echo " <a href='prof_loggedin.php'>Home</a> ";
    }
    if($post=='hod')
	?>