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

    $First_Name =  mysqli_real_escape_string($link,$_POST['firstname']);
    $Last_Name = mysqli_real_escape_string($link,$_POST['lastname']);  
    $Username= mysqli_real_escape_string($link,$_POST['username']);
	$password = mysqli_real_escape_string($link,$_POST['password']);
	$email = mysqli_real_escape_string($link,$_POST['email']);
	
	$id = $_SESSION['id'];
    
    $sql = "UPDATE user SET email='$email', Fname='$First_Name', Lname='$Last_Name', password='$password', username='$Username' WHERE UserID='$id'";
	
	if(mysqli_query($link, $sql))
	{
		$_SESSION['updated'] = TRUE;
		$target_dir = 'uploads/' . $id . '/avatar.jpg';
		
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		
		$temp = explode(".", $_FILES["fileToUpload"]["name"]);
		$newfilename = "avatar" . "." . end($temp);
		
		 $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(file_exists($_FILES['fileToUpload']['tmp_name']) && is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)) {
					echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				}
			}
		}			
		else {
				echo "File is not an image.";
				
				if (!copy('uploads/avatar.jpg', $target_dir))
					echo "NO COPY";
		} 
	}
	else
	{
		echo "ERROR: Could not execute $sql." . mysqli_error($link);
	}
	
	header('Location: Edit.php');
	
    mysqli_close($link);
?>