<?php
    require_once 'library.php';
   // require_once 'login_action.php';
    if(!chkLogin()){
        header("Location: login.php");
    }
    $email = $_SESSION['email'];
    //echo $email;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Timeless   
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20110825

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>"Profile"</title>
<link href="stqwer.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="#"></strong><?php echo $_SESSION["uname"]; ?></strong> </a></h1>
				<!--<p>template design by <a href="http://www.freecsstemplates.org/">CSS Templates</a></p>-->
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		<ul>
			
			<li><a href="update_post.php">Update Faculty</a></li>
			<li><a href="retire_faculty.php">Retire Faculty</a></li>
			<li><a href="assign_post.php">Assign Posts</a></li>
            <li><a href="hierarchy.php">Update Hierarchy</a></li>
			<li><a href="reset_leaves.php">Reset Leaves</a></li>
			<li><a href="home_faculty.php">Home</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title"><a>Namasthe</a></h2>
						<p class="meta"><!--Posted by <a href="#">Someone</a> on August 10, 2011
							&nbsp;&bull;&nbsp; <a href="#" class="comments">Comments (64)</a> &nbsp;&bull;&nbsp; <a href="#" class="permalink">Full article</a>--></p>
						<div class="entry">
							<p><img src="images/mypic.jpg" width="220" height="210" alt="" class="alignleft border" /> 

<strong><h3><?php echo $_SESSION['uname']; ?></h3></strong><!--Please find my CV <a href="pdf/CV_of_VenkataKalyanTavva.pdf">here</a>.--></p>
	<div>
		<?php 
		
         echo "<form action='query.php' method ='post' >
			<div class='item'>
          <p>Database Queries Box</p>
          <textarea name = 'query1' rows='5' ></textarea>
        </div>
         <div class='btn-block'>
          <button type='submit' name='query' >Send</button>
        </div>
      </form>";
           ?>			</div>
						</div>
					</div>
					<!--<div class="post">
						<h2 class="title"><a href="#">Lorem ipsum sed aliquam</a></h2>
						<p class="meta">Posted by <a href="#">Someone</a> on August 8, 2011
							&nbsp;&bull;&nbsp; <a href="#" class="comments">Comments (64)</a> &nbsp;&bull;&nbsp; <a href="#" class="permalink">Full article</a></p>
						<div class="entry">
							<p><img src="images/img03.jpg" width="186" height="186" alt="" class="alignleft border" />Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus <a href="#">dapibus semper urna</a>. Pellentesque ornare, consectetuer nisl felis ac diam. Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. Mauris vitae nisl nec metus placerat consectetuer. </p>
						</div>
					</div>
					<div class="post">
						<h2 class="title"><a href="#">Phasellus pellentesque turpis </a></h2>
						<p class="meta">Posted by <a href="#">Someone</a> on August 8, 2011
							&nbsp;&bull;&nbsp; <a href="#" class="comments">Comments (64)</a> &nbsp;&bull;&nbsp; <a href="#" class="permalink">Full article</a></p>
						<div class="entry">
							<p><img src="images/img03.jpg" width="186" height="186" alt="" class="alignleft border" />Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc. Donec ipsum. Proin imperdiet est. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc.</p>
						</div>
					</div>-->
					<div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->
				<div id="sidebar">
					<ul>
						<li>
							<h2>Aliquam tempus</h2>
							<p>Mauris vitae nisl nec metus placerat perdiet est. Phasellus dapibus semper consectetuer hendrerit.</p>
						</li>
						<li>
							<h2>Categories</h2>
							<ul>
								<li><a href="#">Aliquam libero</a></li>
								<li><a href="#">Consectetuer adipiscing elit</a></li>
								<li><a href="#">Metus aliquam pellentesque</a></li>
								<li><a href="#">Suspendisse iaculis mauris</a></li>
								<li><a href="#">Urnanet non molestie semper</a></li>
								<li><a href="#">Proin gravida orci porttitor</a></li>
							</ul>
						</li>
						<li>
							<h2>Blogroll</h2>
							<ul>
								<li><a href="#">Aliquam libero</a></li>
								<li><a href="#">Consectetuer adipiscing elit</a></li>
								<li><a href="#">Metus aliquam pellentesque</a></li>
								<li><a href="#">Suspendisse iaculis mauris</a></li>
								<li><a href="#">Urnanet non molestie semper</a></li>
								<li><a href="#">Proin gravida orci porttitor</a></li>
							</ul>
						</li>
						<li>
							<h2>Archives</h2>
							<ul>
								<li><a href="#">Aliquam libero</a></li>
								<li><a href="#">Consectetuer adipiscing elit</a></li>
								<li><a href="#">Metus aliquam pellentesque</a></li>
								<li><a href="#">Suspendisse iaculis mauris</a></li>
								<li><a href="#">Urnanet non molestie semper</a></li>
								<li><a href="#">Proin gravida orci porttitor</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
<div id="footer">
		<p><font size="5">Know Thyself</font></p>
</div>
<!-- end #footer -->
</body>
</html>
