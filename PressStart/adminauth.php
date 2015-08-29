<?php
//store the values submitted
$name = isset($_GET['name']) ? $_GET['name']: '';
$pass = isset($_GET['pass']) ? $_GET['pass']: '';

// attempt a connection
$dbh = pg_connect("host=webcourse.cs.nuim.ie dbname=cs230 user=cs230teamd5 password=Iethopia");
if (!$dbh) {
	die("Error in connection: " . pg_last_error());
}
	
//execute query
$sql= "SELECT * FROM login_admin WHERE user_name= '". $name . "' AND user_pass= '". $pass . "';";
$result = pg_query($dbh, $sql);
	
if (!$result) {
	die("Error in SQL query: " . pg_last_error());
}

if (pg_fetch_row($result)) {
	header("Location: " . "adminpage.php", false, 302);
	exit;
}
else {
	echo "<p>Invalid credentials</p>";
}
?>