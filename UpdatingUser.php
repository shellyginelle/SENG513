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
	}
	else
	{
		echo "ERROR: Could not execute $sql." . mysqli_error($link);
	}
	
	header('Location: Edit.php');
	
    mysqli_close($link);
?>