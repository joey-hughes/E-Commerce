<!DOCTYPE html>
<html>

<head>
	<title>Item Page</title>
	
	<!-- Includedor comment and basket systems. -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/comment.js"></script>
	<script src="js/basket.js"></script>
	
	<link rel="stylesheet" href="css/PressStartfj.css">
	
	<!-- Have jQuery above, but might not work. If it doesn't, uncomment this. -->
	<!-- <script type="text/JavaScript" src="js/jquery-1.10.1.min.js"></script> -->
	<script type="text/JavaScript" src="js/jquery.lightbox-0.5.min.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="css/jquery.lightbox-0.5.css">
</head>


<body>

<?php include("header.php"); ?>

<?php
# Connect to database.
$conn_string = "host=webcourse.cs.nuim.ie dbname=cs230 user=cs230teamd5 password=Iethopia";
$conn = pg_pconnect($conn_string);
if (!$conn) {
	echo "Error making connection";
	exit;
}

# Retrieve item ID from url, which will be of the form "www.website.com/?id=1".
$id = $_GET["id"];

# Form queries and get data.
$q = "SELECT * FROM videogames WHERE id=$id;";
$result = pg_query($conn, $q);

$img_q = "SELECT url FROM images WHERE game_id=$id;";
$images = pg_query($conn, $img_q);

# Generate page content.
if (!$result) {
	echo "An error occurred.\n";
	exit;
}
else {
	# Print cover image.
	$image_arr = array();
	$cover = '';
	while ($img = pg_fetch_row($images)) {
		# Cover images are of the form name1.jpg, so if you find an image
		# like that, set it to be the cover variable. Otherwise, add it
		# to a list.
		if (strstr($img[0], "1.")) {
			$cover = $img[0];
		}
		else {
			$image_arr[] = $img[0];
		}
	}
	# We want to print the cover image at the top.
	echo "<img id=\"cover_image\" src=\"$cover\">";
	
	# Check database to see which index corresponds to which attribute!
	# e.g. $row[1] gives the title, $row[2] gives the price, etc.
	$row = pg_fetch_row($result);
	echo "<h1 id=\"title\">$row[1]</h1>";
	echo "<button onclick=\"addToBasket($id)\">Add to Basket</button>";
	echo "<p class=\"details\">Rating: $row[5]</p>";
	echo "<p class=\"details\">Price: $row[2]</p>"; 
	echo "<p class=\"details\">Genre: $row[3]</p>";
	echo "<p class=\"details\">Console: $row[4]</p>";
	echo "<p class=\"details\">Publisher: $row[7]</p>";
	echo "<p class=\"details\">Publication Date: $row[6]</p>";
	echo "<p id=\"description\">$row[8]</p>";
}

# Print all the images with lightbox-required tags.
if ($images) {
	echo '<div id="w">';
	echo '<div id="content">';
	echo '<div id="thumbnails">';
	foreach ($image_arr as $url) {
		echo "<a href=\"$url\"><img class=\"picture\" src=\"$url\"></a>";
	}
	echo '</div></div></div>';
}

## COMMENTS SECTION ##

# Form query.
$comment_q = "SELECT text, rating, date, name FROM comments WHERE game_id=$id";

# Get comments and print header, as well as the number of comments.
$comment_result = pg_query($conn, $comment_q);
if ($comment_result) {
	$n = pg_num_rows($comment_result);
	if ($n == 0) {
		echo "<h2 id=\"comments\">No Comments</h2>";
	}
	else {
		echo "<h2 id=\"comments\">$n " . ($n == 1 ? "Comment" : "Comments") . "</h2>";
	}
}
else {
	echo "<p>Can't fetch comments.</p>";
}
?>

<!-- Submit comment form. -->
<div id="comment_form">
Name: <input id="name_input" type="text" name="user">

Rating:
<select id="rating_input" name="rating">
	<option value="NULL">no rating</option>
	<option value="1">1 star</option>
	<option value="2">2 stars</option>
	<option value="3">3 stars</option>
	<option value="4">4 stars</option>
	<option value="5">5 stars</option>
</select> <br>

Text: <input id="text_input" type="text" name="content"> <br>

<!-- Contains game_id, to be stored with the comment. -->
<?php echo "<input type=\"hidden\" id=\"game_id\" value=\"$id\">"; ?>
<br>

<button id="submit_button" type="button" onclick="submitComment()">Submit</button> <br>
</div>

<!-- Use this element to print errors to the user. -->
<p id="errors" style="color:red"></p>

<?php
if ($comment_result) {
	# Print comments...if there are any.
	$comment = '';
	while ($row = pg_fetch_row($comment_result)) {
		$comment .= "<p class=\"comments\">$row[3] ($row[2]) " .
			"<br> Rating: ";
		if (is_null($row[1])) {
			$comment .= "No Stars";
		}
		else {
			$comment .= "$row[1] " . ($row[1] == 1 ? "Star" : "Stars");
		}
		$comment .= "<br>$row[0]</p>"; 
		echo $comment;
		$comment = '';
	}
}
?>

<?php include("footer.php"); ?>

<script type="text/JavaScript">
	$(function() {
		$("#thumbnails a").lightBox();
	});
</script>
</body>

</html>