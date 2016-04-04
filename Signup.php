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
    <link rel="stylesheet" href="Stylesheets/FormStylesheet.css" />
	
	<script>
		$(document).ready(function () {
			$('#signup').submit(function(e) {
				if (!$('input[type=checkbox]:checked').length)
				{
					alert("Please check the privacy box!");
					
					return false;
				}
				
				return true;
			});
		});
	</script>
	
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img alt="Brand" class="brand" src="Stylesheets/Logo.php">
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

    <h1 id="title">Create an Account</h1>

    <div class="row">
        <form class = "form-signup" id="signup" name="signupForm" method = "post" action = "signupPage.php">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <p id="form-label">First Name</p>
                <input name="firstname" id="firstname" type="text" class="form-control" autofocus required>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-6">
                <p id="form-label">Last Name</p>
                <input name = "lastname" id = "lastname" input type="text" class="form-control" required>
            </div>
            
            <div class="col-xs-12">
                <p id="form-label">Username</p>
                <input name = "username" id = "username" input type="text" class="form-control" required/>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-6">
                <p id="form-label">Password:</p>
                <input name = "password" id = "password" input type="password" class="form-control" required/>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-6">
                <p id="form-label">Re-enter your password</p>
                <input name = "repassword" id ="repassword" input type="password" class="form-control" required/>
            </div>
            
            <div class="col-xs-12">
                <p id="form-label">Email</p>
                <input name  = "email" id = "email" input type="email" class="form-control" required/>
            </div>
            
            <div class="col-xs-12">
                <p id="form-label">Re-Enter Email</p>
                <input name = "reemail" id = "reemail" input type="email" class="form-control" required/>
            </div>
            
            <div class="col-xs-12">
                <p id="form-label">Country</p>
                <select name="Country" id="form-dropdown">
                    <option>Canada</option>
                    <option>United States</option>
                    <option>Europe</option>
                    <option>Australia</option>
                </select>
            </div>
            
            <div class="col-xs-12" id="privacy-box">
                   <input type="checkbox"> I agree to this <a href="https://s-media-cache-ak0.pinimg.com/736x/b2/87/6e/b2876e6043295d117542c6f05e7ff4f1.jpg" style="margin-left: 5px"> Privacy Agreement</a><br>
            </div>
			
			<div class="col-xs-12">
				<button type="login" class="btn" id="form-submit">Sign Up</button>
			</div>
        </form>
    </div>   


</body>
</html>