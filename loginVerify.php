<?php

    $link = mysqli_connect("localhost", "root", "", "seng513_perspectiv");

	if($link === false)
	{
		die("ERROR: could not connect" . mysqli_connect_error());
	}
    else {
        echo nl2br ("NICE CONNECTED!\n");
    }
    
?>