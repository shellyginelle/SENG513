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
	
	<?php 
		$link = mysqli_connect("localhost", "root", "", "seng513_perspectiv");

		if($link === false)
		{
			die("ERROR: could not connect" . mysqli_connect_error());
		}
		else {
			echo nl2br ("NICE CONNECTED!\n");
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
			
			$inputname = $user . "_" . $row['ImageID'];
			
			echo $inputname;
			
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

</body>
</html>
