<?php	

// Form base query.
$q = "INSERT INTO videogames ";

if ($_GET["title"] != '' && $_GET["price"] != '') {
	// Create arrays for fields/values.
	$fields = array();
	$values = array();
	foreach (array_keys($_GET) as $key) {
		// Add 'em.
		if ($_GET[$key] != '' && $key != "id") {
			$fields[] = "$key";
			if ($key == "price") {
				$values[] = "$_GET[$key]";
			}
			else {
				$values[] = "'$_GET[$key]'";
			}
		}
	}
	// Polish off query.
	$q .= "(" . implode(", ", $fields) . ") ";
	$q .= " VALUES (" . implode(", ", $values) . ");";
	
	$conn = pg_connect("host=webcourse.cs.nuim.ie dbname=cs230 user=cs230teamd5 password=Iethopia");
	if (!$conn) {
		die("Error in connection: " . pg_last_error());
	}
	
	$result = pg_query($conn, $q);
	
	if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}

	echo "<p>Item inserted. Probably. You might want to double check.</p>";
}
else {
	echo "<p>Please don't leave title or price blank.</p>";
}


?>