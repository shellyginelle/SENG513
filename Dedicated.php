<?php

	session_start();

    $link = mysqli_connect("localhost", "root", "", "seng513_perspectiv");

	if($link === false)
	{
		die("ERROR: could not connect" . mysqli_connect_error());
	}
	
	if (isset($_GET['run']))
	{
		$_SESSION['profile'] = $_GET['run'];
		header('Location: UserPage.php');
	}
	
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
    <link rel="stylesheet" href="Stylesheets/DedicatedStylesheet.css" />
	<link rel="stylesheet" href="Stylesheets/navbar.css" />
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
        <div id="outer" class="col-xs-12 col-sm-7 col-md-7">  
			<?php	
				$filename = $_POST['img'];
				echo '<img id="dedicated-img" src="' . $filename . '">';
				
				$temp = explode("/", $filename);
				
				$sql = "select * from image where ImageID='$temp[2]' and UserID='$temp[1]'";
				$result = mysqli_query($link, $sql);					
				$row = mysqli_fetch_assoc($result);
			?>
        </div>

        <div class="col-xs-12 col-sm-5 col-md-5 col-md-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading">Details</div>
                <div class="panel-body">
					<?php
						echo '<h3 id="header">' . $row["Title"] . '</h3>';
						echo '<p>' . $row["Caption"] . '</p>';
						echo '<hr align="middle" style="width: 70%; margin-top: 15px; margin-bottom: 15px;" />';
						echo '<p><b>Category: </b>' . $row["Category"] . '</p>';
						
						if ($row["AllowRating"] == "T")
							echo '<p><b>Rating: </b>4.2 / 5</p>';
						
						$numViews = $row["numViews"] + 1;
						
						echo "<p><b>Number of Views:</b> $numViews</p>";
						
						$sql1 = "UPDATE image SET numViews='$numViews' where UserID='$temp[1]' AND ImageID='$temp[2]'";
						if (!mysqli_query($link, $sql1))
							echo "ERROR: Could not execute $sql1." . mysqli_error($link);
						
						$sql2 = "select username from user where UserID='$temp[1]'";
						$result2 = mysqli_query($link, $sql2);
						if (!$result2)
							echo "ERROR: Could not execute $sql2." . mysqli_error($link);
						
						else 
						{
							$row1 = mysqli_fetch_row($result2);
							echo "<p><b>Artist: </b><a href='?run=" . $temp[1] . "'>$row1[0]</a></p>";
						}
						
						
					?>
					
                </div>
            </div>
        </div>
		
		<?php
			if ($row["AllowComments"] == "T")
				echo '<div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-7">
					<div class="panel panel-default">
						<div class="panel-heading">Comments</div>
						<div class="panel-body">
							<ul class="media-list">
								<li class="media">
									<div class="media">
										<div class="media-left media-middle">
											<img class="media-object" src="http://i50.photobucket.com/albums/f317/GrnDay1213/panda.png">
										</div>
										<div class="media-body">
											<h4 class="media-heading">Panda-Bear1234 says:</h4>
											<p>Great job, love the artwork youve done!</p>
											<p style="text-align: right; font-size: 10px;">23 minutes ago</p>
										</div>

										<hr align="middle" style="width: 70%; margin-top: 15px; margin-bottom: 15px;" />
									</div>

									<div class="media">
										<div class="media-left media-middle">
											<img class="media-object" src="http://www.danpontefract.com/wp-content/uploads/2013/05/watch.jpg">
										</div>
										<div class="media-body">
											<h4 class="media-heading">Time-is-everything says:</h4>
											<p>Your skill is impecable</p>
											<p style="text-align: right; font-size: 10px;">3 hours ago</p>
										</div>

										<hr align="middle" style="width: 100%; margin-top: 15px; margin-bottom: 15px;" />
									</div>
									
									<div class="media">
										<div class="media-left media-middle">
											<img class="media-object" src="http://www.danpontefract.com/wp-content/uploads/2013/05/watch.jpg">
										</div>
										<div class="media-body">
											<h4 class="media-heading">Time-is-everything says:</h4>
											<p>Your skill is impecable</p>
											<p style="text-align: right; font-size: 10px;">3 hours ago</p>
										</div>

										<hr align="middle" style="width: 100%; margin-top: 15px; margin-bottom: 15px;" />
									</div>
									
									<div class="media">
										<div class="media-left media-middle">
											<img class="media-object" src="http://www.danpontefract.com/wp-content/uploads/2013/05/watch.jpg">
										</div>
										<div class="media-body">
											<h4 class="media-heading">Time-is-everything says:</h4>
											<p>Your skill is impecable</p>
											<p style="text-align: right; font-size: 10px;">3 hours ago</p>
										</div>

										<hr align="middle" style="width: 100%; margin-top: 15px; margin-bottom: 15px;" />
									</div>
									
									<div class="media">
										<div class="media-left media-middle">
											<img class="media-object" src="http://www.danpontefract.com/wp-content/uploads/2013/05/watch.jpg">
										</div>
										<div class="media-body">
											<h4 class="media-heading">Time-is-everything says:</h4>
											<p>Your skill is impecable</p>
											<p style="text-align: right; font-size: 10px;">3 hours ago</p>
										</div>

										<hr align="middle" style="width: 100%; margin-top: 15px; margin-bottom: 15px;" />
									</div>
								</li>
							</ul>
							<a href="#" style="text-align: center; display: block; margin-top: -10px; margin-bottom: -10px;">Show additional comments</a>
						</div>
					</div>
				</div>';
		?>
    </div>
</body>
</html>