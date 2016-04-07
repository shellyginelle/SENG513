<?php
    session_start();
	
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
                <p class="navbar-text" id="perspectiv">
                    PERSPECTIV
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
					<?php 
						if (!isset($_SESSION['login_user']))
						{
							echo '<li><a href="Signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
							echo '<li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
						}
						
						else
						{
							echo '<li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
						}
					?>
                </ul>
            </div>
        </div>
    </nav>
	
	<div class="row">
		<div class="outer col-md-5 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">My Bio</div>
				<div class="panel-body">
					<div class="col-xs-4">
						<img class="img-responsive img-thumbnail" src="uploads/114744/avatar.jpg" />
					</div>
					<div class="col-xs-8">
						<?php
							$user = $_SESSION['profile'];
							
							$sql = "select * from user where UserID='$user'";
							$result = mysqli_query($link,$sql);
							$row = mysqli_fetch_assoc($result);
							
							echo '<h3><b>' . $row["username"] . '</b></h3>';
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
				<div class="panel-heading">Posts</div>
				<div class="row" id="img-row">
					<?php
						$sql2 = "select * from image where UserID='$user'";
						$result2 = mysqli_query($link,$sql2);
						if (!$result2)
							echo "ERROR: Could not execute $sql2." . mysqli_error($link);
						
						while ($row1 = mysqli_fetch_assoc($result2))
						{
							$file = "uploads/" . $user . "/" . $row1["ImageID"];
							
							echo '<div class="panel panel-default" id="images">
									<div class="panel-body">';
							echo '<input type="image" alt="submit" class="img-responsive img-thumbnail" src="' . $file . '" />';
							echo '</div></div>';
						}
						
					?>
	
				</div>
			</div>
		</div>
	</div>


</body>
</html>