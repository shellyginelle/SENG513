<!DOCTYPE html>

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
                <a class="navbar-brand" href="#">
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

    <nav class="navbar navbar-xs navbar-inverse navbar-fixed-bottom hidden-xs">
        <div class="container-fluid">
            <p id="legal-text">@Legal Stuff goes here with social media links</p>
        </div>
    </nav>

    <h1 style="margin-bottom: 20px;">Create an Account</h1>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <p id="form-label">First Name</p>
            <input type="text" class="form-control">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <p id="form-label">Last Name</p>
            <input type="text" class="form-control" id="basic-url">
        </div>
        <div class="col-xs-12">
            <p id="form-label">UserName</p>
            <input type="text" class="form-control" id="basic-url" />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <p id="form-label">Password:</p>
            <input type="password" class="form-control">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <p id="form-label">Re-enter your pusheen password</p>
            <input type="password" class="form-control" id="basic-url">
        </div>
        <div class="col-xs-12">
            <p id="form-label">Email</p>
            <input type="text" class="form-control" id="basic-url" />
        </div>
        <div class="col-xs-12">
            <p id="form-label">Re-Enter Email</p>
            <input type="text" class="form-control" id="basic-url" />
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
            <form>
                <input type="checkbox"> I agree to this <a href="#">Privacy Agreement</a><br>
            </form>
        </div>
    </div>   

    <button type="button" class="btn" id="form-submit">follow</button>

</body>
</html>