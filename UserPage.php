<?php
    session_start();
	
	if (isset($_GET['page']) && $_GET['page'] == 'user')
	{
		$_SESSION['userpage'] = $_SESSION['id'];
		header ('refresh: 0; Location: UserPage.php');
	}
	
	if (isset($_GET['category']))
	{
		$_SESSION['linkchoice'] = $_GET['category'];
		header('Location: Search.php');
	}
	
	$link = mysqli_connect("localhost", "root", "", "seng513_perspectiv");
	if($link === false)
	{
		die("ERROR: could not connect" . mysqli_connect_error());
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
    <link rel="stylesheet" href="Stylesheets/UserStylesheet.css" />
	<link rel="stylesheet" href="Stylesheets/navbar.css" />
	
	<script>
		$(document).ready(function () {
		var $container = $('.container');

		$container.imagesLoaded(function () {
			$container.masonry({
				itemSelector: '.post-box',
				columnWidth: '.post-box',
				transitionDuration: 0
				});
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
	
	<div class="row">
		<div class="outer col-md-5 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">My Bio</div>
				<div class="panel-body">
					<div class="col-xs-4">					
						<?php
							if (isset($_SESSION['userpage']))
							{
								$user = $_SESSION['id'];
								unset($_SESSION['userpage']);
								$_SESSION['page'] = $user;
							}
							
							else if (isset($_SESSION['profile']))
							{
								$user = $_SESSION['profile'];
								unset($_SESSION['profile']);
								$_SESSION['page'] = $user;
							}
							
							else {
								$user = $_SESSION['page'];
							}
							
							$_SESSION['page'] = $user;
							
							$sql = "select * from user where UserID='$user'";
							$result = mysqli_query($link,$sql);
							$row = mysqli_fetch_assoc($result);
							
							echo '<div id="avatar">';
							
							echo '<img class="img-responsive img-thumbnail" src="uploads/' . $user . '/avatar.jpg" />';
							
							echo '</div>';
							echo '</div>';
							echo '<div class="col-xs-8" id="userinfo">';
							
							echo '<h3 id="header"><b>' . $row["username"] . '</b></h3>';
							echo '<p><b>Total Number of Posts: </b>' . $row["numImages"] . '</p>';
							
							$sql1 = "select numViews from image where UserID='$user'";
							$result1 = mysqli_query($link,$sql1);
							
							if (!$result1)
								echo "ERROR: Could not execute $sql1." . mysqli_error($link);
							
							$totalpage = 0;
							
							while ($row1 = mysqli_fetch_assoc($result1))
							{
								$totalpage += intval($row1["numViews"]);
							}
							
							echo "<p><b>Total Page Views: </b>$totalpage</p>";
							echo '<hr align="middle" style="width: 70%; margin-top: 15px; margin-bottom: 15px;" />
									<h4><b>About User</b></h4>';
							echo '<p><b>Name: </b>' . $row["Fname"] . ' ' . $row["Lname"]. '</p>';
							echo '<p><b>Email: </b>' . $row["email"] . '</p>';
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="container col-md-7 col-sm-12 col-xs-12 col-md-offset-5">
			<div class="panel panel-default">
				<div class="panel-heading">Posts
					<div class="btn-group pull-right" style="margin-top: -5px">
						<a href="?style=masonry" class="btn btn-default btn-sm">
							<span class="glyphicon glyphicon-th-large"></span>
						</a>
						<a href="?style=list" class="btn btn-default btn-sm">
							<span class="glyphicon glyphicon-th-list"></span>
						</a>
					</div>
				</div>
					<?php
						$sql2 = "select * from image where UserID='$user'";
						$result2 = mysqli_query($link,$sql2);
						if (!$result2)
							echo "ERROR: Could not execute $sql2." . mysqli_error($link);
						
						if (isset($_GET['style']) && $_GET['style'] != 'list')
							echo '<div class="row" id="img-row">';
						else
							echo '<div class="contain">';
						
						while ($row1 = mysqli_fetch_assoc($result2))
						{
							$file = "uploads/" . $user . "/" . $row1["ImageID"];
							
							if (!isset($_GET['style']) || $_GET['style'] == 'list')
							{
								echo '<form class="search" name="search" method="post" action="Dedicated.php">';
						
								echo '<div class="media">';
								echo '<div class="media-left media-middle">';
								echo '<input type="image" name="img" alt="submit" style="width: 150px;" id="search-img" src="' . $file . '" value="' . $file . '">';
								echo '</div>';
								echo '<div class="media-body">';
								echo '<h4 class="media-heading">' . $row1["Title"] . '</h4>';
								echo '<p><b>Category: </b>' . $row1["Category"] . '</p>';
								echo '<p><b>Number of Views: </b>' . $row1["numViews"] . '</p>';
								echo '</div>';
								echo '</div>';
							}
							
							else {
								echo '<form class="search" name="search" method="post" action="Dedicated.php">';
									echo '<div class="panel panel-default" id="images">
											<div class="panel-body">';
									echo '<input type="image" alt="submit" name="img" class="img-responsive img-thumbnail" src="' . $file . '" value="' . $file . '"/>';
									echo '</div></div>';
								echo '</form>';
							}
						}
						
						echo '</div>';
						
					?>
	
			</div>
		</div>
	</div>


</body>
</html>