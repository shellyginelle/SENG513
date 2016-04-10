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
    <link rel="stylesheet" href="Stylesheets/navbar.css" />
    <style type="text/css"></style>
    <link rel="stylesheet" href="Stylesheets/FormStylesheet.css" />
    <style type="text/css"></style>
</head>
<body style="padding-top: 60px; padding-bottom: 40px;">
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
                            <li><a href="">Watercolour</a></li>
                            <li><a href="">Acrylic</a></li>
                            <li><a href="">Oil</a></li>
                            <li><a href="">Pencil</a></li>
                            <li><a href="">Digital</a></li>
                            <li><a href="">Photograph</a></li>
                        </ul>
                    </li>
                    <li><a href="Search.php">Search</a></li>
                    <li><p class="navbar-text hidden-sm hidden-xs"> | </p></li>
					<?php 
						if (!isset($_SESSION['login_user']))
						{
							echo '<li><a href="Signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
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
						<li id="footer-link-nav"><a href="About.php" style="color: white">About</a></li>
						<li id="footer-link-nav"><a href="Legal.php" style="color: white">Legal</a></li>
						<li id="footer-link-nav"><a href="Jobs.php" style="color: white">Jobs</a></li>
						<li id="footer-link-nav"><a href="Sitemap.php" style="color: white">Sitemap</a></li>
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

	<h1>jobs</h1>
    <p>perspectiv is HIRING PEOPLE WHO ARE GOING TO PAY US</p>

</body>
</html>