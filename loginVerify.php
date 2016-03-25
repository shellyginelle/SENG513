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
    
    $email_address = mysqli_real_escape_string($link,$_POST['myusername']);
	$user_password = mysqli_real_escape_string($link,$_POST['mypassword']);
    

    
    $sql = "select * from user where password='$user_password' AND email='$email_address'";
    $result = mysqli_query($link,$sql);
    $rows = mysqli_num_rows($result);
    if ($rows == 1) 
    {
        echo nl2br ("Welcome to the club \n");
        $_SESSION['login_user']=$email_address; // Initializing Session
        header("refresh:5; home.html");

    } 
    else 
    {
         echo nl2br ("OH MAN WRONG EMAIL OR PASSWORD? KAPPA!\n");
    }
    
    mysqli_close($link);
?>