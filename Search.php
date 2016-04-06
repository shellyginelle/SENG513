<?php
    session_start();
	
	$link = mysqli_connect("localhost", "root", "", "seng513_perspectiv");
	if($link === false)
	{
		die("ERROR: could not connect" . mysqli_connect_error());
	}
	
	function a () {
		echo "YAY a";
	}
	
	$linkchoice = '';
	
	if (isset($_GET['run']))
		$linkchoice = $_GET['run'];
	else
		$linkchoice = '';
	
	$watercolour = "watercolour";
	$acrylic = "acrylic";
	$oil = "oil";
	$pencil = "pencil";
	$digital = "digital";
	$photograph = "photograph";
	
	switch ($linkchoice) {
		case 'all' :
			$sql = "select * from image";
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
	
	<script src="Stylesheets/modernizr.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img alt="Brand" class="brand" src="Stylesheets/Logo.jpg">
                </a>
                <p class="navbar-text" style="color: white; font-weight: bold; font-size: 20px;">
                    PERSPECTIV
                    <button type="button" class="btn btn-primary navbar-toggle" data-toggle="collapse" data-target="#Navbar" style="margin-top: -8px">
                        <span class="glyphicon glyphicon-menu-hamburger"></span>
                    </button>
                </p>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="Navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Submit</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories  <span class="glyphicon glyphicon-menu-down"><small></small></span></a>
                        <ul class="dropdown-menu">
                            <li><a target="_blank" href="GridLayout.html">Grid Layout</a></li>
                            <li><a target="_blank" href="Glyphicon.html">Glyphicons</a></li>
                            <li><a target="_blank" href="Buttons.html">Button Groups</a></li>
                            <li><a target="_blank" href="InputGroups.html">Input Groups</a></li>
                            <li><a target="_blank" href="DropMenus.html">Dropdowns</a></li>
                            <li><a target="_blank" href="Navigation.html">Navigation</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Search</a></li>
                    <li><p class="navbar-text hidden-sm hidden-xs"> | </p></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
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
				</ul> <!-- cd-filters -->
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->
		<section class="cd-gallery">
			<div class="col-xs-12">
				<?php 
					$watercolour = "watercolour";
					
					$result = mysqli_query($link,$sql);
					
					while ($row = mysqli_fetch_assoc($result))
					{
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
						echo '<p><b>Artist: </b>' . $row1[0] . '</p>';
						echo '</div>';
						echo '</div>';
						
						echo '<hr align="middle" style="width: 70%; margin-top: 15px; margin-bottom: 15px;" />';
						
						echo '</form>';
					}
					
					mysqli_close($link);
				?>

                <div class="text-center">
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
			</div>
		</section> <!-- cd-gallery -->

		<div class="cd-filter">
			<form>
				<div class="cd-filter-block">
					<h4>Search</h4>
					
					<div class="cd-filter-content">
						<input type="search">
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
								<option value="20">20/option>
								<option value="50">50/option>
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