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
    
    $sql = "INSERT INTO user (userID,Fname,Lname,username,password,email)
            VALUES ('$rnd_id', '$First_Name', '$Last_Name', '$UserName', '$PassWord','$User_Email')";
	
	if(mysqli_query($link, $sql))
	{
		echo "<p>Account Created Successfully!</p>";
        echo nl2br ("Welcome to the club \n");
        header("refresh:5; home.html");

	}
	else
	{
		echo "ERROR: Could not execute $sql." . mysqli_error($link);
	}
    
    mysqli_close($link);
?>