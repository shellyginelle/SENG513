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
    <link rel="stylesheet" href="Stylesheets/SearchStylesheet.css" />
    <script src="SearchBar.js"></script>
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

    <div class="input-group" id="search-box">
        <span class="input-group-btn">
            <a href="#menu-toggle" class="btn btn-default hidden-md hidden-lg" id="menu-toggle">Filters</a>
        </span>
        <input type="text" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
        </span>
    </div>

    <nav class="navbar navbar-xs navbar-inverse navbar-fixed-bottom hidden-xs">
        <div class="container-fluid">
            <p id="legal-text">@Legal Stuff goes here with social media links</p>
        </div>
    </nav>

    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li><h3>Filters</h3></li>
                
                <li><input type="radio" checked> Sort by Most Recent<br /></li>
                <li><input type="radio"> Sort by Highest Rating<br /></li>
                <li><hr align="middle" style="width: 100px;" /></li>
                
                <li><h4>Categories</h4></li>
                <li><input type="checkbox" checked> Watercolour<br /></li>
                <li><input type="checkbox"> Acrylic<br /></li>
                <li><input type="checkbox"> Oil<br /></li>
                <li><input type="checkbox"> Pencil<br /></li>
                <li><input type="checkbox"> Digital<br /></li>
                <li><input type="checkbox"> Photograph<br /></li>

                <li><hr align="middle" style="width: 100px;" /></li>
                
                <li><h4>Number of Results</h4></li>
                <li><input type="radio" checked> 10<br /></li>
                <li><input type="radio"> 20<br /></li>
                <li><input type="radio"> 50<br /></li>
                
                <li><button type="button" class="btn" id="form-submit">Apply</button></li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <h2 style="padding-bottom: 20px;">Search results for Waterfalls: </h2>
                </div>
                <div class="col-md-12">
                    <?php 
						$link = mysqli_connect("localhost", "root", "", "seng513_perspectiv");

						if($link === false)
						{
							die("ERROR: could not connect" . mysqli_connect_error());
						}
						
						$watercolour = "watercolour";
						
						$sql = "select * from image where Category='$watercolour'";
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
							
							echo '</form>';
						}
						
						mysqli_close($link);
					?>

                    <hr align="middle" style="width: 70%; margin-top: 10px; margin-bottom: 10px;" />
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
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#menu-toggle").click(function (e) {
                if ($("#wrapper").hasClass("active")) {
                    e.preventDefault();
                    $("#wrapper").removeClass("active");
                }

                else {
                    $("#wrapper").addClass("active");
                }
            });
        });
    </script>
</body>
</html>