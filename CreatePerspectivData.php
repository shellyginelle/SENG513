<?php

	$link = mysqli_connect("localhost", "root", "", "seng513_perspectiv");

	if($link === false)
	{
		die("ERROR: could not connect" . mysqli_connect_error());
	}
    else {
        echo nl2br ("NICE CONNECTED!\n");
    }
    
    $sql = "CREATE TABLE IF NOT EXISTS user(userID INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT, Fname CHAR(255) NOT NULL, Lname CHAR(255) NOT NULL, 
	email VARCHAR(255) NULL, password VARCHAR(255) NOT NULL)";
	if(mysqli_query($link, $sql))
	{
		echo nl2br ("Table user successfully created!\n");
	}
	else
	{
		echo "ERROR: not able to execute $sql".mysqli_error($link);
	}
?>