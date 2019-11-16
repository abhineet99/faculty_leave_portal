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
    else{
        if($post=='hod'){
            //need to query department
            $query="SELECT department from facult.faculty where email='$email";
            $dept=pg_query($query);
            $dept=pg_fetch_row($dept);
            $dept=$dept[0];
            $query="SELECT facult.leave.leave_id,facult.leave.sender_id,facult.leave.doa from facult.faculty where email='$email";
        }
    }
	?>