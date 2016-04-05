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
	
	$sql1 = "select * from user where password='$user_password' AND username='$email_address'";
	$result1 = mysqli_query($link,$sql1);
    $rows1 = mysqli_num_rows($result1);

    if ($rows == 1) 
    {
        echo nl2br ("Welcome to the club \n");
		
		$row = mysqli_fetch_row($result);
		
        $_SESSION['login_user']=$email_address; // Initializing Session
		$_SESSION['id']=$row[0];
		
		echo $_SESSION['id'];
        header("Location: Home.php");

    } 
	
	else if ($rows1 == 1)
	{
		echo nl2br ("Welcome to the club \n");
		
		$row = mysqli_fetch_row($result1);
		
        $_SESSION['login_user']=$email_address; // Initializing Session
		$_SESSION['id']=$row[0];
		
		echo $_SESSION['id'];
        header("Location: Home.php");
	}
	
    else 
    {
         echo nl2br ("OH MAN WRONG EMAIL OR PASSWORD? KAPPA!\n");
    }
    
    mysqli_close($link);
?>