<?php

$id = isset($_GET['id']) ? $_GET['id']: '';
if ($id == '') {
	echo "<p>Please input an ID.</p>";
}
else {	
	// Form query.
	$q = "UPDATE videogames SET ";
	
	// Create array of value updates.
	$updates = array();
	foreach (array_keys($_GET) as $key) {
		if ($_GET[$key] != '' && $key != "id") {
			if ($key == "price") {
				$updates[] = "$key=$_GET[$key]";
			}
			else {
				$updates[] = "$key='$_GET[$key]'";
			}
		}
	}
	
	// Add them all to the query and finish query.
	if (count($updates) != 0) {
		$q .= implode(" AND ", $updates);
		$q .= " WHERE id=$id;";
		
		$conn = pg_connect("host=webcourse.cs.nuim.ie dbname=cs230 user=cs230teamd5 password=Iethopia");
		if (!$conn) {
			die("Error in connection: " . pg_last_error());
		}
		
		$result = pg_query($conn, $q);
		
		if (!$result) {
			die("Error in SQL query: " . pg_last_error());
		}
	
		echo "<p>Item edited. Probably. You might want to double check.</p>";
	}
	else {
		echo "<p>Please input details to be updated.</p>";
	}
}

?>