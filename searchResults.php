<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "", "seng513_perspectiv");

	if($link === false)
	{
		die("ERROR: could not connect" . mysqli_connect_error());
	}
    else {
        //echo nl2br ("NICE CONNECTED!\n");
    }

    $search_field = mysqli_real_escape_string($link, $_POST['SearchField']);
    //echo "$search_field";

    $sql = "SELECT * FROM image
            WHERE Title LIKE '%$search_field%'";
	$_SESSION['sql'] = $sql;
	$result = mysqli_query($link,$sql);

    if($result)
	{
		if(mysqli_num_rows($result) > 0)
		{
			echo "<table cellpadding = '10' border '4' style ='width:50%;'>";
				echo "Images Containing $search_field";
				echo "<tr>";
					echo"<th>TITLE:</th>";
					echo"<th>DATE:</th>";
					echo"<th>CATEGORY:</th>";
					echo"<th>\tNumber of views:</th>";
				echo"</tr>";
			$_SESSION['results'] = $result;
			$_SESSION['search'] = $search_field;
				
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr>";
					echo "<td>" . $row['Title']. "</td>";
					echo "<td>" . $row['Date']. "</td>";	
					echo "<td>" . $row['Category']. "</td>";							
					echo "<td>" . $row['numViews']. "</td>";

				echo "</tr>";
			}
			echo "</table>";
			echo "\n";
			
			mysqli_free_result($result);
		}
		else
		{
			echo nl2br ("No matching artists for '$search_field'\n");
			echo nl2br ("  ");
		}
		
	}
	
	else {
		echo "ERROR: Could not execute $sql." . mysqli_error($link);
	}

	header('Location: Search.php');
?>


    