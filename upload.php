<?php

	session_start();

    $link = mysqli_connect("localhost", "root", "", "seng513_perspectiv");

	if($link === false)
	{
		die("ERROR: could not connect" . mysqli_connect_error());
	}
    else {
        echo nl2br ("NICE CONNECTED!\n");
    }
	
	$sql = "select numImages from user where UserID='{$_SESSION['id']}'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_row($result);
	$imageName = $row[0] + 1;
	
	$target_dir = 'uploads/' . $_SESSION['id'] . '/';
	
	echo $target_dir;
	
	$target_file = basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	
	$temp = explode(".", $_FILES["fileToUpload"]["name"]);
	$newfilename = $imageName . "." . end($temp);
	
	$UserID = $_SESSION['id'];
	$Title = mysqli_real_escape_string($link,$_POST['title']);
	$Caption = mysqli_real_escape_string($link,$_POST['caption']);
	$Category = mysqli_real_escape_string($link,$_POST['category']);
	
	$today = getDate();
	$date = $today['mon'] . "/" . $today['mday'] . "/" . $today['year'];
	$d = mysqli_real_escape_string($link, $date);
	$numViews = 0;
	
	if (isset($_POST['rating']))
		$rating = 'T';
	else
		$rating = 'F';
	
	if (isset($_POST['comments']))
		$comments = 'T';
	else
		$comments = 'F';
	
	echo "RAWR";
	echo $_FILES["fileToUpload"]["error"];
	
 	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
		
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfilename)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				$sql1 = "UPDATE user SET numImages='$imageName' where UserID='$UserID'";
				mysqli_query($link, $sql1);
				
				$sql = "Insert into image (UserID, ImageID, Title, Caption, Category, AllowRating, AllowComments, Date, numViews)
					VALUES ('$UserID', '$newfilename', '$Title', '$Caption', '$Category', '$rating', '$comments', '$d', '$numViews')";
			
				if (!mysqli_query($link, $sql))
					echo "ERROR: Could not execute $sql." . mysqli_error($link);
				
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	} 
	
	if ($uploadOk == 1)
		$_SESSION['upload'] = true;
	else
		$_SESSION['upload'] = false;
	
	header('Location: Submit.php');
	
	mysqli_close($link);
?>