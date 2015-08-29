<?php
# Fetch comment details.
$name = $_POST["user"];
$rating = $_POST["rating"];
$text = str_replace("'", "''", $_POST["content"]);
$game_id = $_POST["game_id"];
$date = date("Y-m-d");

# Connect to database.
$conn_string = "host=webcourse.cs.nuim.ie dbname=cs230 user=cs230teamd5 password=Iethopia";
$conn = pg_pconnect($conn_string);

# Form query.
$q = "INSERT INTO comments " .
	"(text, rating, date, game_id, name) " .
	"VALUES ('" . $text . "', " .
	($rating == "NULL" ? $rating : (int)$rating) .
	", '". $date . "', " . (int)$game_id . ", '" . $name . "');";

# Finally, add comment.
$result = pg_query($conn, $q);

# Also, update rating of game if necessary.
if ($rating != "NULL") {
	$n = pg_num_rows(pg_query($conn, "SELECT * FROM comments WHERE " .
		"game_id=$game_id AND rating IS NOT NULL;"));
	$game = pg_query($conn, "SELECT rating FROM videogames WHERE " .
		"id=$game_id;");
	$curr_rating = pg_fetch_row($game)[0];
	
	# Formula for new rating...
	# (old_rating * (n - 1) + comment_rating) / n,
	# where n is the number of comments INCLUDING the one just added.
	$new_rating = ($curr_rating * ($n - 1) + $rating) / $n;
	pg_query($conn, "UPDATE videogames SET rating=$new_rating WHERE id=$game_id;");
}
?>
<p>Comment submitted!</p>