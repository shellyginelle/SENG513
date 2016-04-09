<?php
    session_start();
	
	$link = mysqli_connect("localhost", "root", "", "seng513_perspectiv");
	if($link === false)
	{
		die("ERROR: could not connect" . mysqli_connect_error());
	}
	
	$linkchoice = '';
	
	if (isset($_GET['category']))
	{
		$_SESSION['linkchoice'] = $_GET['category'];
	}
	
	if (isset($_GET['page']) && $_GET['page'] == 'user')
	{
		$_SESSION['userpage'] = $_SESSION['id'];
		header ('Location: UserPage.php');
	}
	
	if (isset($_GET['run']))
		$linkchoice = $_GET['run'];
	else if (isset($_SESSION['linkchoice']))
		$linkchoice = $_SESSION['linkchoice'];
	
	$watercolour = "watercolour";
	$acrylic = "acrylic";
	$oil = "oil";
	$pencil = "pencil";
	$digital = "digital";
	$photograph = "photograph";
	
	if ($linkchoice == 'clear')
	{
		unset($_SESSION['sql']);
		unset($_SESSION['search']);
	}
	
	if (!isset($_SESSION['sql']))
		switch ($linkchoice) {
			case 'all' :
				$sql = "select * from image";
				break;
			case 'watercolour' :
				$sql = "select * from image where Category='watercolour'";
				break;
			case 'acrylic' :
				$sql = "select * from image where Category='$acrylic'";
				break;
			case 'oil' :
				$sql = "select * from image where Category='$oil'";
				break;
			case 'pencil' :
				$sql = "select * from image where Category='$pencil'";
				break;
			case 'digital' :
				$sql = "select * from image where Category='$digital'";
				break;
			case 'photograph' :
				$sql = "select * from image where Category='$photograph'";
				break;
			default:
				$sql = "select * from image";
				break;
		}
	
	else
	{
		$sql = $_SESSION['sql'];
	}
	
	if (isset($_GET['artistpage']))
	{
		$_SESSION['profile'] = $_GET['artistpage'];
		header ('Location: UserPage.php');
	}
	
	$result = mysqli_query($link,$sql);
	
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Stylesheets/SearchStylesheet.css" />
	<link rel="stylesheet" href="Stylesheets/style.css" />
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
					<ul class="navbar-nav nav-stacked dropdown-menu inverse-dropdown" aria-labelledby="footer-dropdown" >
						<li id="footer-link-nav"><a href="#">About</a></li>
						<li id="footer-link-nav"><a href="#">Legal</a></li>
						<li id="footer-link-nav"><a href="#">Privacy</a></li>
						<li id="footer-link-nav"><a href="#">Jobs</a></li>
						<li id="footer-link-nav"><a href="#">Sitemap</a></li>
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
	
	<main class="cd-main-content">
		<div class="cd-tab-filter-wrapper">
			<div class="cd-tab-filter">
				<ul class="cd-filters">
					<li class="placeholder"> 
						<a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
					</li> 
					<li class="filter"><a href="?run=all">All</a></li>
					<li class="filter"><a href="?run=watercolour">Watercolour</a></li>
					<li class="filter"><a href="?run=acrylic">Acrylic</a></li>
					<li class="filter"><a href="?run=oil">Oil</a></li>
					<li class="filter"><a href="?run=pencil">Pencil</a></li>
					<li class="filter"><a href="?run=digital">Digital</a></li>
					<li class="filter"><a href="?run=photograph">Photograph</a></li>
					<li class="filter right"><a href="?run=clear">Clear Search</a></li>
					
				</ul> <!-- cd-filters -->
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->
		<section class="cd-gallery">
			<div class="col-xs-12" id="gal">
				<?php 
					if (isset($_SESSION['search']))
						echo "<h2 style='text-align: left;'>Results for Titles Containing " . $_SESSION['search'] . ":</h2>";
					
					$t = 0;
					$noresult = false;
					
					if (mysqli_num_rows($result) == 0)
					{
						echo '<div class="alert alert-danger">No Results</div>';
					}
					
					while ($row = mysqli_fetch_assoc($result))
					{						
						if ($linkchoice == '')
							$linkchoice = "all";
						
						if (isset($_SESSION['search']))
						{
							if (strcasecmp($linkchoice, $row["Category"]) != 0 && strcasecmp($linkchoice, "all") != 0)
							{
								$t += 1;
								
								if (mysqli_num_rows($result) == $t)
								{
									echo '<div class="alert alert-danger" >No Results</div>';
								}
								continue;
							}
							
						}
							
						$dir = "uploads/" . $row['UserID'] . "/" . $row['ImageID'];
						
						$user = $row["UserID"];
						
						$sql1 = "select username from user where UserID='$user'";
						$result1 = mysqli_query($link,$sql1);
						$row1 = mysqli_fetch_row($result1);
						
						echo '<form class="search" name="search" method="post" action="Dedicated.php">';
						
						echo '<div class="media">';
						echo '<div class="media-left media-middle">';
						echo '<input type="image" name="img" alt="submit" style="width: 150px;" id="search-img" src="' . $dir . '" value="' . $dir . '">';
						echo '</div>';
						echo '<div class="media-body">';
						echo '<h3 class="media-heading">' . $row["Title"] . '</h3>';
						echo '<p><b>Category: </b>' . $row["Category"] . '</p>';
						echo '<p><b>Number of Views: </b>' . $row["numViews"] . '</p>';
						echo "<p><b>Artist: </b><a href='?artistpage=" . $user . "'>$row1[0]</a></p>";
						echo '</div>';
						echo '</div>';
						
						echo '<hr align="middle" style="width: 70%; margin-top: 15px; margin-bottom: 15px;" />';
						
						echo '</form>';
					}
					
					mysqli_close($link);
				?>
			</div>
			
			
		</section> <!-- cd-gallery -->

		<div class="cd-filter">
			<form class = "form-search" name = "form-search" method = "post" action = "searchResults.php">
				<div class="cd-filter-block">
					<h4>Search</h4>
					
					<div class="cd-filter-content">
						<input type="search" name ="SearchField" id = "SearchField">
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
				
				<div class="cd-filter-block">
					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter="" type="radio" name="radioButton" id="mostRecent" checked>
							<label class="radio-label" for="radio1">Most Recent</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="topRated">
							<label class="radio-label" for="radio2">Top Rated</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div>
				
				<hr align="middle" style="width: 70%; margin-top: 15px; margin-bottom: 15px;" />

				<div class="cd-filter-block">
					<h4>Number of Results</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="results" id="results">
								<option value="">Choose an option</option>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="50">50</option>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<button type="login" class="btn" id="form-submit" style="margin-left: auto; margin-right: auto; display: block;">Search</button>
			</form>

			<a href="#0" class="cd-close">Close</a>
		</div> <!-- cd-filter -->

		<a href="#0" class="cd-filter-trigger">Filters</span></a>
	</main> <!-- cd-main-content -->
	<div id="carbonads-container">
		<div class="carbonad">
			<script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?zoneid=1673&serve=C6AILKT&placement=codyhouseco" id="_carbonads_js"></script>
		</div>
		<a href="#0" class="close-carbon-adv">Close</a>
	</div> <!-- #carbonads-container -->
	
	<div class="text-center" style="<?php if (mysqli_num_rows($result) < 5) echo 'display: none'; ?>">
		<ul class="pagination">
			<li class="disabled">
				<a href="#">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
			</li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li>
				<a href="#">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</li>
		</ul>
	</div>
<script src="Stylesheets/jquery-2.1.1.js"></script>
<script src="Stylesheets/jquery.mixitup.min.js"></script>
<script src="Stylesheets/main.js"></script> <!-- Resource jQuery -->
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  	ga('create', 'UA-48014931-1', 'codyhouse.co');
  	ga('send', 'pageview');

  	jQuery(document).ready(function($){
  		$('.close-carbon-adv').on('click', function(event){
  			event.preventDefault();
  			$('#carbonads-container').hide();
  		});
  	});
</script>
	
	
</body>
</html>