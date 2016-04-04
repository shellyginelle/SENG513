<?php
    session_start();

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Stylesheets/HomeStylesheet.css" />
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
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

    <nav class="navbar navbar-xs navbar-inverse navbar-fixed-bottom hidden-xs">
        <div class="container-fluid">
            <p id="legal-text">@Legal Stuff goes here with social media links</p>
        </div>
    </nav>

    <div class="row">
        <div class="col-xs-6 col-sm-4 col-md-3">
            <div id="f1_container">
                <div id="f1_card" class="shadow">
                    <div class="front face">
                        <div class="home-img1"></div>
                    </div>
                    <div class="back face center">
                        <span id="center-text">Watercolour</span>
                    </div>
                </div>
            </div>
        </div>
                        
        <div class="col-xs-6 col-sm-4 col-md-3">
            <div id="f1_container">
                <div id="f1_card" class="shadow">
                    <div class="front face">
                        <div class="home-img2"></div>
                    </div>
                    <div class="back face center">
                        <span id="center-text">Acrylic</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-6 col-sm-4 col-md-3">
            <div id="f1_container">
                <div id="f1_card" class="shadow">
                    <div class="second-row">
                        <div class="front face">
                            <div class="home-img3"></div>
                        </div>
                        <div class="back face center">
                            <span id="center-text">Pencil</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-6 hidden-sm col-md-3">
            <div id="f1_container">
                <div id="f1_card" class="shadow">
                    <div class="second-row">
                        <div class="front face">
                            <div class="home-img4"></div>
                        </div>
                        <div class="back face center">
                            <span id="center-text">Digital</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>