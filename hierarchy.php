<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
    $email = $_SESSION['email'];
?>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body>
    <form class="form-horizontal" action="add_in_next_guy.php" method="post">
          <div class="form-group">
            <label for="inputFname3" class="col-sm-2 control-label">Sender</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputFname3" name="sender" placeholder="Post" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputLname3" class="col-sm-2 control-label">Reciever</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputLname3" name="reciever" placeholder="Post" required>
            </div>
          </div>    
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="reg">Add  in next_guy</button>
            </div>
          </div>
    </form>
  <form class="form-horizontal" action="update_next_guy.php" method="post">
          <div class="form-group">
            <label for="inputFname3" class="col-sm-2 control-label">Sender</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputFname3" name="sender" placeholder="Post" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputLname3" class="col-sm-2 control-label">Reciever</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputLname3" name="reciever" placeholder="Post" required>
            </div>
          </div>    
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="reg">Update  in next_guy</button>
            </div>
          </div>
    </form>
  <form class="form-horizontal" action="add_in_start_end.php" method="post">
          <div class="form-group">
            <label for="inputFname3" class="col-sm-2 control-label">Sender</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputFname3" name="sender" placeholder="Post" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputLname3" class="col-sm-2 control-label">Reciever</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputLname3" name="reciever" placeholder="Post" required>
            </div>
          </div>    
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="reg">Add in start_end</button>
            </div>
          </div>
    </form>
  <form class="form-horizontal" action="update_start_end.php" method="post">
          <div class="form-group">
            <label for="inputFname3" class="col-sm-2 control-label">Sender</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="sender" name="sender" placeholder="Post" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputLname3" class="col-sm-2 control-label">Reciever</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputLname3" name="reciever" placeholder="Post" required>
            </div>
          </div>    
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="reg">Update in start_end</button>
            </div>
          </div>
    </form>	
        <script src="myscript.js" type="text/javascript"></script>
    </body>
</html>