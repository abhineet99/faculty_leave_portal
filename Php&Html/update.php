<?php
	require_once 'connection.php';
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
		   <form class="form-horizontal" action="update_grants.php" method="post">
          <div class="form-group">
            <label for="inputFname3" class="col-sm-2 control-label">Add info on grants</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputFname3" name="grant" placeholder="Publication Title" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="reg">Add grant</button>
            </div>
          </div>
    </form> 
    </form>  
		   <form class="form-horizontal" action="update_awards.php" method="post">
          <div class="form-group">
            <label for="inputFname3" class="col-sm-2 control-label">Add award</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputFname3" name="award" placeholder="Publication Title" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="reg">Add!</button>
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
    <form class="form-horizontal" action="update_desig.php" method="post">
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Update your designation</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="desig" name="desig" placeholder="Designation" required>
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
	<form method="post" action="del_pubs.php">  
            <p>
			</label>Select Publication to delete</label>
			<br>
			<select name="selectPub">
            <option value="">--- Select ---</option>  
            <?php
				$doc_one=$collection->findOne(
				["email"=>$email]
				,['projection'=>['_id'=>0,'Publications'=>1]]);
				
				if(sizeof($doc_one)==0){
					echo "No Publications Entered!";
				}
				else{
					$doc_one=$doc_one['Publications'];
					foreach($doc_one as $key=>$doc){
						echo $doc;
						echo '<option value='.$key.'>'.$doc.'</option>';
					}
				}
              
            ?>  
			</select>
			</p>
            <input type="submit" name="delete_pub" value="Delete Publication" class="btn btn-primary"/>  
        </form>  
			<form method="post" action="del_grants.php">  
            <p>
			</label>Select Grant to delete</label>
			<br>
			<select name="selectGrant">
            <option value="">--- Select ---</option>  
            <?php
				$doc_one=$collection->findOne(
				["email"=>$email]
				,['projection'=>['_id'=>0,'Grants'=>1]]);
				
				if(sizeof($doc_one)==0){
					echo "No Grants Entered!";
				}
				else{
					$doc_one=$doc_one['Grants'];
					foreach($doc_one as $key=>$doc){
						echo $doc;
						echo '<option value='.$key.'>'.$doc.'</option>';
					}
				}
              
            ?>  
			</select>
			</p>
            <input type="submit" name="delete_grant" value="Delete Grant" class="btn btn-primary"/>  
        </form>
			<form method="post" action="del_awards.php">  
            <p>
			</label>Select Award to delete</label>
			<br>
			<select name="selectAward">
            <option value="">--- Select ---</option>  
            <?php
				$doc_one=$collection->findOne(
				["email"=>$email]
				,['projection'=>['_id'=>0,'Awards'=>1]]);
				
				if(sizeof($doc_one)==0){
					echo "No Awards Entered!";
				}
				else{
					$doc_one=$doc_one['Awards'];
					foreach($doc_one as $key=>$doc){
						echo $doc;
						echo '<option value='.$key.'>'.$doc.'</option>';
					}
				}
              
            ?>  
			</select>
			</p>
            <input type="submit" name="delete_awards" value="Delete Award" class="btn btn-primary"/>  
        </form>
        <script src="myscript.js" type="text/javascript"></script>
    </body>
</html>