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
	
	$random_id_length = 6; 
	$rnd_id = uniqid(rand(),1); 
	$rnd_id = strip_tags(stripslashes($rnd_id)); 
	$rnd_id = str_replace(".","",$rnd_id); 
	$rnd_id = strrev(str_replace("/","",$rnd_id)); 
	$rnd_id = substr($rnd_id,0,$random_id_length);
    
    $First_Name =  mysqli_real_escape_string($link,$_POST['firstname']);
    $Last_Name = mysqli_real_escape_string($link,$_POST['lastname']);
    $UserName = mysqli_real_escape_string($link,$_POST['username']);
    $PassWord = mysqli_real_escape_string($link,$_POST['password']);   
    $User_Email = mysqli_real_escape_string($link,$_POST['email']);
	$numImages = 0;
    
    $sql = "INSERT INTO user (userID,Fname,Lname,username,password,email,numImages)
				VALUES ('$rnd_id', '$First_Name', '$Last_Name', '$UserName', '$PassWord','$User_Email','$numImages')";
	
 	if(mysqli_query($link, $sql))
	{ 
		echo "<p>Account Created Successfully!</p>";
        echo nl2br ("Welcome to the club \n");
		mkdir("uploads/" . $rnd_id);
		$_SESSION['created'] = true;
		$target_dir = 'uploads/' . $rnd_id . '/avatar.jpg';
		
		echo $target_dir;
	
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
		
		header('Location: Signup.php');
 	}
	
	else
	{
		echo "ERROR: Could not execute $sql." . mysqli_error($link);
	} 
	
    
    mysqli_close($link);
?>