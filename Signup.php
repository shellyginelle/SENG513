<?php
    session_start();

	if (isset($_GET['page']) && $_GET['page'] == 'user')
	{
		$_SESSION['userpage'] = $_SESSION['id'];
		header ('Location: UserPage.php');
	}
	
	if (isset($_GET['category']))
	{
		$_SESSION['linkchoice'] = $_GET['category'];
		header('Location: Search.php');
	}
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Stylesheets/FormStylesheet.css" />
	<link rel="stylesheet" href="Stylesheets/navbar.css" />
	
	<script>
		$(document).ready(function () {
			$('#signup').submit(function(e) {
				if (!$('input[type=checkbox]:checked').length)
				{
					alert("Please check the privacy box!");
					
					return false;
				}
				
				return true;
			});
		});
	</script>
	
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="Home.php">
                    <img alt="Brand" class="brand" src="Stylesheets/Logo.jpg">
                </a>
                <p class="navbar-text" style="color: white; font-weight: bold; font-size: 18px;">PERSPECTIV
                <button type="button" class="btn btn-primary navbar-toggle" data-toggle="collapse" data-target="#Navbar" style="margin-top: -8px">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>
                </p>
            </div>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="nav navbar-nav navbar-right">
                    <?php 
						if (isset($_SESSION['login_user']))
							echo '<li><a href="Submit.php">Submit</a></li>';
					?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories  <span class="glyphicon glyphicon-menu-down"><small></small></span></a>
						<ul class="dropdown-menu">
                            <li><a href="?category=watercolour">Watercolour</a></li>
                            <li><a href="?category=acrylic">Acrylic</a></li>
                            <li><a href="?category=oil">Oil</a></li>
                            <li><a href="?category=pencil">Pencil</a></li>
                            <li><a href="?category=digital">Digital</a></li>
                            <li><a href="?category=photograph">Photograph</a></li>
                        </ul>
                    </li>
                    <li><a href="Search.php">Search</a></li>
                    <li><p class="navbar-text hidden-sm hidden-xs"> | </p></li>
					<?php 
						if (!isset($_SESSION['login_user']))
						{
							echo '<li class="active"><a href="Signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
							echo '<li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
						}
						
						else
						{
							echo '<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile  <span class="glyphicon glyphicon-menu-down"><small></small></span></a>
									<ul class="dropdown-menu">
										<li><a href="Edit.php">Edit Profile</a></li>
										<li class="divider"></li>
										<li><a href="?page=user"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
									</ul>
								</li>';
							echo '<li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
						}
					?>
                </ul>
            </div>
        </div>
    </nav>

	<nav class="navbar navbar-xs navbar-inverse navbar-fixed-bottom">
		<div class="container-fluid">
			<div class="footer-text navbar-header">
				<div class="dropup">
					<button class="btn dropdown-toggle inverse-dropdown" type="button" id="footer-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					perspectiv
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu inverse-dropdown" aria-labelledby="footer-dropdown" >
						<li id="footer-link-nav"><a href="About.php" style="color: #8D8D8D">About</a></li>
						<li id="footer-link-nav"><a href="Legal.php" style="color: #8D8D8D">Legal</a></li>
						<li id="footer-link-nav"><a href="Jobs.php" style="color: #8D8D8D">Jobs</a></li>
						<li id="footer-link-nav"><a href="Sitemap.php" style="color: #8D8D8D">Sitemap</a></li>
						<li role="separator" class="divider visible-xs"></li>
						<ul class="visible-xs" id="hide">
							<li>
								<img class="footer-btn" src="Assets/brand_assets/fb/FB-f-Logo__white_29.png"/>
								<a class="footer-link" style="padding: 0px 0px; color: #8D8D8D;" href="http://www.facebook.com">Facebook</a></li>
							<li>
								<img class="footer-btn" src="Assets/brand_assets/twitter/TwitterLogo_white.png"/>
								<a class="footer-link" style="padding: 0px 0px; color: #8D8D8D;" href="http://www.twitter.com">Twitter</a></li>
							<li>
								<img class="footer-btn" src="Assets/brand_assets/tumblr/tumblr_logo_white_transparent-32.png"/>
								<a class="footer-link" style="padding: 0px 0px; color: #8D8D8D;" href="http://www.tumblr.com">Tumblr</a></li>
							<li>
								<img class="footer-btn" src="Assets/brand_assets/insta/ig_glyph_logo.png"/>
								<a class="footer-link" style="padding: 0px 0px; color: #8D8D8D;" href="http://www.instagram.com">Instagram</a></li>
						</ul>
					</ul>
				</div>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a class="footer-link" style="padding: 0px 0px" href="http://www.facebook.com">
					<img class="footer-btn" src="Assets/brand_assets/fb/FB-f-Logo__white_29.png"/></a></li>
				<li><a class="footer-link" style="padding: 0px 0px" href="http://www.twitter.com">
					<img class="footer-btn" src="Assets/brand_assets/twitter/TwitterLogo_white.png"/></a></li>
				<li><a class="footer-link" style="padding: 0px 0px" href="http://www.tumblr.com">
					<img class="footer-btn" src="Assets/brand_assets/tumblr/tumblr_logo_white_transparent-32.png"/></a></li>
				<li><a class="footer-link" style="padding: 0px 0px" href="http://www.instagram.com">
					<img class="footer-btn" src="Assets/brand_assets/insta/ig_glyph_logo.png"/></a></li>
			</ul>
		</div>
	</nav>
	
    <h1 id="title">Create an Account</h1>
	
	<div id="result" 
		<?php 
			if (!isset($_SESSION['created']))
			{ 
				echo 'style="display: none;">';
			}
			
			else if ($_SESSION['created'] == FALSE)
			{
				echo '<div class="alert alert-danger" role="alert">Username/Email already exist!<br></div>';
				echo '';
			}
			
			else 
			{
				echo '<div class="alert alert-success" role="alert"><h3>User Created Successfully!</h3></div>';
			}
						
			unset($_SESSION['created']);
			
			echo '</div>';
		?>

    <div class="row">
        <form class = "form-signup" id="signup" name="signupForm" method = "post" action = "signupPage.php" enctype="multipart/form-data">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <p id="form-label">First Name</p>
                <input name="firstname" id="firstname" type="text" class="form-control" autofocus required>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-6">
                <p id="form-label">Last Name</p>
                <input name = "lastname" id = "lastname" input type="text" class="form-control" required>
            </div>
            
            <div class="col-xs-12">
                <p id="form-label">Username</p>
                <input name = "username" id = "username" input type="text" class="form-control" required/>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-6">
                <p id="form-label">Password:</p>
                <input name = "password" id = "password" input type="password" class="form-control" required/>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-6">
                <p id="form-label">Re-enter your password</p>
                <input name = "repassword" id ="repassword" input type="password" class="form-control" required/>
            </div>
            
            <div class="col-xs-12">
                <p id="form-label">Email</p>
                <input name  = "email" id = "email" input type="email" class="form-control" required/>
            </div>
            
            <div class="col-xs-12">
                <p id="form-label">Re-Enter Email</p>
                <input name = "reemail" id = "reemail" input type="email" class="form-control" required/>
            </div>
            
            <div class="col-xs-12">
                <p id="form-label">Country</p>
                <select name="Country" id="form-dropdown">
                    <option>Canada</option>
                    <option>United States</option>
                    <option>Europe</option>
                    <option>Australia</option>
                </select>
            </div>
			
			<div class="col-xs-12">
				<div class="fileUpload btn btn-primary">
					<span>Choose Avatar</span>
					<input type="file" name="fileToUpload" id="fileToUpload" class="upload">
				</div>
			</div>
            
            <div class="col-xs-12" id="privacy-box">
                   <input type="checkbox"> I agree to this <a href="https://s-media-cache-ak0.pinimg.com/736x/b2/87/6e/b2876e6043295d117542c6f05e7ff4f1.jpg" style="margin-left: 5px"> Privacy Agreement</a><br>
            </div>
			
			<div class="col-xs-12">
				<button type="login" class="btn" id="form-submit">Sign Up</button>
			</div>
        </form>
    </div>   


</body>
</html>