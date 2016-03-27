<?php
    session_start();

?><!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Stylesheets/FormStylesheet.css" />
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="Home.html">
                    <img alt="Brand" class="brand" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Boostrap_logo.svg/2000px-Boostrap_logo.svg.png">
                </a>
                <p class="navbar-text" style="color: white; font-weight: bold; font-size: 18px;">
                    PERSPECTIV
                    <button type="button" class="btn btn-primary navbar-toggle" data-toggle="collapse" data-target="#Navbar" style="margin-top: -8px">
                        <span class="glyphicon glyphicon-menu-hamburger"></span>
                    </button>
                </p>
            </div>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">My Bio</a></li>
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

    <nav class="navbar navbar-xs navbar-inverse navbar-fixed-bottom hidden-xs">
        <div class="container-fluid">
            <p id="legal-text">@Legal Stuff goes here with social media links</p>
        </div>
    </nav>
       
    <div class="row">
        <form class = "form-signin" name = "form1" method = "post" action = "loginVerify.php">
        <div class="col-xs-12 col-sm-6 col-md-6">
                <h1 style="margin-bottom: 20px">Login</h1>
                <p id="form-label">Email/Username:</p>
                <input name="myusername" id="myusername" type="text" class="form-control" placeholder="Email Address" autofocus>
                
                <p id="form-label">Password</p>
                <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password">
                <button type="login" class="btn" id="form-submit">Login</button>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">
            <h1 style="margin=bottom: 20px">Sign Up</h1>
            <p id="signup-text">Join our website today to comment on art pieces, talk to artists and post your own work!</p>
            <p>Also, you can recieve feedback from other people around the world, along with ratings, critiques, and much more.</p>
            <button onclick="location.href='Signup.html'" type="button" class="btn" id="form-signup" href="Signup.html">Sign Up</button>
        </div>
        </form>
    </div>
    
</body>
</html>