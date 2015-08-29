<?php

$id = isset($_GET['id']) ? $_GET['id']: '';
if ($id == '') {
	echo "<p>Please input an ID.</p>";
}
else {
	$conn = pg_connect("host=webcourse.cs.nuim.ie dbname=cs230 user=cs230teamd5 password=Iethopia");
	if (!$conn) {
		die("Error in connection: " . pg_last_error());
	}
		
	$q = "DELETE FROM videogames WHERE id=$id;";
	$result = pg_query($conn, $q);
		
	if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}
	
	echo "<p>Item deleted. Probably. You might want to double check.</p>";
}

?>