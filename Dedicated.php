﻿<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Stylesheets/DedicatedStylesheet.css" />
	<link rel="stylesheet" href="Stylesheets/FormStylesheet.css" />
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="Home.html">
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

    <nav class="navbar navbar-xs navbar-inverse navbar-fixed-bottom hidden-xs">
        <div class="container-fluid">
            <p id="legal-text">@Legal Stuff goes here with social media links</p>
        </div>
    </nav>

    <div class="row">
        <div id="outer" class="col-xs-12 col-sm-7 col-md-7">  
            <div id="img-container" class="col-md-7 col-xs-12">
                <img id="dedicated-img" src="https://davidmceown.files.wordpress.com/2012/08/ctm12_001.jpg">
            </div>
        </div>

        <div class="col-xs-12 col-sm-5 col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Details</div>
                <div class="panel-body">
                    <h3>Title One</h3>
                    <h4>Caption:</h4>
                    <p>This is the caption for this image. The user can place whatever text to describe their piece of art here.</p>
                    <hr align="middle" style="width: 70%; margin-top: 15px; margin-bottom: 15px;" />
                    <p>Category: Watercolour</p>
                    <p><b>Rating: </b>4.2 / 5</p>
                    <p><b>Number of Views:</b> 412</p>
                    <p><b>Artist:</b> NameOfArtist</p>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-7">
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
                                    <p>Great job, love the artwork you've done!</p>
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
                        </li>
                    </ul>
                    <a href="#" style="text-align: center; display: block; margin-top: -10px; margin-bottom: -10px;">Show additional comments</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>