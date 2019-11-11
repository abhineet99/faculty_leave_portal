<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
    $email = $_SESSION['email'];
    echo $email;
?>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body>
    <form class="form-horizontal" action="update_about.php" method="post">
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Update your 'about'</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="About" name="About" placeholder="About" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="reg">Update</button>
            </div>
          </div>
    </form>
    <form class="form-horizontal" action="update_pubs.php" method="post">
          <div class="form-group">
            <label for="inputFname3" class="col-sm-2 control-label">Add a publication, Enter Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputFname3" name="pub_title" placeholder="Publication Title" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputLname3" class="col-sm-2 control-label">Enter the conference's names</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputLname3" name="conf_name" placeholder="Conference" required>
            </div>
          </div>    
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Enter the year</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" name="year" placeholder="Conference Year" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="reg">Add publication</button>
            </div>
          </div>
    </form>     
    <form class="form-horizontal" action="update_researchinterests.php" method="post">
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Update your research interests</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="research" name="research" placeholder="Research Interests" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="reg">Update</button>
            </div>
          </div>
    </form>
    <form class="form-horizontal" action="update_edu.php" method="post">      
           <div class="form-group">
            <label for="inputCpassword3" class="col-sm-2 control-label">Update your educational background</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="edu" name="edu" placeholder="Educational Background" required>
            <div id="error"></div>
            </div>
          </div>
        
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="reg">Update!</button>
            </div>
          </div>
    </form>

        <script src="myscript.js" type="text/javascript"></script>
    </body>
</html>