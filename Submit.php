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

    <nav class="navbar navbar-xs navbar-inverse navbar-fixed-bottom hidden-xs">
        <div class="container-fluid">
            <p id="legal-text">@Legal Stuff goes here with social media links</p>
        </div>
    </nav>

    <h1 id="title">Submit</h1>
	
	<div id="result" 
		<?php 
			if (!isset($_SESSION['upload']))
			{ 
				echo 'style="display: none;">';
			}
			
			else if ($_SESSION['upload'] == false)
			{
				echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '<br></div>';
				echo '';
			}
			
			else 
			{
				echo '<div class="alert alert-success" role="alert"><h3>Upload Successful!</h3></div>';
			}
						
			unset($_SESSION['upload']);
			
			echo '</div>';
		?>
	
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="fileToUpload" id="fileToUpload" class="btn">
		<p id="form-label">Title</p>
		<input name="title" type="text" class="form-control" required>
		<p id="form-label">Caption</p>
		<textarea name="caption" class="form-control" required></textarea>
		<p id="form-label">Category</p>
		<select name="category" id="form-dropdown">
			<option value="Watercolour">Watercolour</option>
			<option value="Acrylic">Acrylic</option>
			<option value="Oil">Oil</option>
			<option value="Pencil">Pencil</option>
			<option value="Digital">Digital</option>
			<option value="Photograph">Photograph</option>
		</select>
		
		<p id="form-label">Additional Tags (Separate each tag with a comma)</p>
		<textarea class="form-control" name="tags"></textarea>

		<div id="privacy-box">
			<input type="checkbox" name="rating"> Allow for ratings<br>
		</div>
		<div id="privacy-box" style="margin-top: 10px;">
			<input type="checkbox" name="comments"> Allow for comments<br>
		</div>

		<button type="login" class="btn" id="form-submit" name="submit">Submit</button>
	</form>
</body>
</html>