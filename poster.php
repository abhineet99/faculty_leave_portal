<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
    $email = $_SESSION['email'];
    $x=$_GET['variable1'];
?>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body>
    <form class="form-horizontal" action="poster_action.php" method="post">
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Insert post</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="About" name="About" placeholder="About" required>
              <input type='hidden' name='var' value='<?php echo "$var";?>'/> 
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="reg">Apply</button>
            </div>
          </div>
    </form>
        <script src="myscript.js" type="text/javascript"></script>
    </body>
</html>