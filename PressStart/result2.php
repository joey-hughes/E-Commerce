<!DOCTYPE HTML>
<html>
<head>
	<title>Press Start Games</title>
	<meta charset="UTF-8">
	<link id="pagestyle" rel="stylesheet" type="text/css" href="css/PressStart.css">

	
		<!-- All code relating to basket. -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/basket.js"></script>
</head>	
<body>
<div id="container">
<?php include 'header.php';?>
<h2>Advanced Search</h2>

<?php

//this stores the value of what was inputted into the search
$key= isset($_GET['search']) ? $_GET['search']: '';
//this sorts the list generated
$sorterPrice= isset($_POST['sorterPrice']) ? $_POST['sorterPrice']: 'Price Desc';
//this sorts the list generated
$sorterGenre= isset($_POST['sorterGenre']) ? $_POST['sorterGenre']: '';
//this sorts the list generated
$sorterConsole= isset($_POST['sorterConsole']) ? $_POST['sorterConsole']: '';





 echo '<form method="get" action="result2.php">'; ?>
Search by Game Name!<input type="text" name="search" placeholder="Search for Games!"/>
<input type="submit" />
</form>
<br>

<?php echo '<form id="horbar" method="post" action="result2.php?search=' .$key. '">'; ?>
Sort By Price:<select name="sorterPrice">
	<option value="Price DESC">Price (High to Low)</option>
	<option value="Price">Price (Low to High)</option>
	</select>
	<input type="submit" value="Sort"/>
</form>

 <?php echo '<form id="horbar" method="post" action="result2.php?search=' .$key.'">'; ?>
Sort By Genre:<select name="sorterGenre">
	<option value="Action">Action</option>
	<option value="Adventure">Adventure</option>
	<option value="Horror">Horror</option>
	<option value="Shooter">Shooter</option>
	<option value="Sport">Sports</option>
</select>
	<input type="submit" value="Sort"/>
</form>

 <?php echo '<form id="horbar" method="post" action="result2.php?search=' .$key. '">'; ?>
Sort By Console:<select name="sorterConsole">
	<option value="PS4">PS4</option>
	<option value="PS3">PS3</option>
	<option value="Xbox 360">Xbox 360</option>
	<option value="Xbox One">Xbox One</option>
	<option value="Wii U">Wii U</option>
	<option value="Wii ">Wii</option>
</select>
	<input  type="submit" value="Sort"/>
</form>

<div id="search">

<table class="filtercont" style="width:100%; float:left; clear:right;">
		<tr class="filtercont">
			<th class="filtercont">Cover Art</th>
			<th class="filtercont">Title</th>
			<th class="filtercont">Price</th>
			<th class="filtercont">Genre</th>
			<th class="filtercont">Platform</th>
			<th class="filtercont">Rating</th>
			<th class="filtercont">Release Date</th>
			<th class="filtercont">Publisher</th>
			<th class="filtercont">Basket</th>
		</tr>

		<div style="height:5px; width:100%;">
		</div>


<?php


	// attempt a connection
	$dbh = pg_connect("host=webcourse.cs.nuim.ie dbname=cs230 user=cs230teamd5 password=Iethopia");
	if (!$dbh) {
		die("Error in connection: " . pg_last_error());
	}

	
	if (isset($_GET['sorterPlatform']) && isset($_GET['sorterGenreHead'])) {
		//this stores the value of what was inputted into the search
		$key='';
		$sorterConsole = $_GET['sorterPlatform'];
		$sorterGenre=$_GET['sorterGenreHead'];
		$sql3 = "SELECT * FROM videogames where LOWER(title) like LOWER ('%". $key ."%') and
		LOWER(genre) like LOWER('%". $sorterGenre . "%') and LOWER(Console) like LOWER('%" . $sorterConsole . "%')
		order by " . $sorterPrice;
		
	
		//store the result
		$result2 = pg_query($dbh, $sql3);
	
		if (!$result2) {
			die("Error in SQL query: " . pg_last_error());
		}

	
	
		
		// iterate over result set
		// print each row
		
		while ($row = pg_fetch_array($result2)) {

	
			//execute query to generate images for each game
			$sql2="SELECT DISTINCT url from images where game_id=". $row[0] . "and url like '%1.jpg'";
			//store result
			$resultImage=pg_query($dbh,$sql2);
	
			echo "<tr>";
			$img=pg_fetch_row($resultImage)[0];
			echo '<td class="filtercont"><img src="'. $img .'"></td>';
			echo "<td><a href=\"itempagefj.php?id=" . $row[0] . "\">" . $row[1] . "</td>";
			echo"<td>".  $row[2] ."</td>";
			echo"<td>".  $row[3] ."</td>";
			echo"<td>".  $row[4] ."</td>";
			echo"<td>".  $row[5] ."</td>";
			echo"<td>".  $row[6] ."</td>";
			echo"<td>".  $row[7] ."</td>";
			// Generate button that, when clicked, calls JS function to add item ID to list
			// in session storage. This list holds the IDs of all items in the basket.
			echo "<td> <button id=\"myButton\" onclick=\"addToBasket($row[0]);\">Add</button> </td>";
			echo "</td> </tr>";
			
	}
		echo"</table>";
	
		echo"</div>";
		// free memory
	pg_free_result($result2);
	
	}
	
	else{

			
	// execute query
	$sql = "SELECT * FROM videogames where 
	LOWER( title) like LOWER ('%" . $key . "%') and LOWER(genre) like LOWER('%". $sorterGenre . "%') and LOWER(Console) like LOWER('%" . $sorterConsole . "%')
	order by " . $sorterPrice;
	
	

	//store the result
	$result = pg_query($dbh, $sql);
	
	if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}
	
	

	

	
	
# Fixes formatting problem on wide screens.
echo "<br><br><br>";
echo '<div id= "search">';
	// iterate over result set
	// print each row
	echo "<table>";
	while ($row = pg_fetch_array($result)) {

	
	//execute query to generate images for each game
	$sql2="SELECT DISTINCT url from images where game_id=". $row[0] . "and url like '%1.jpg'";
	//store result
	$resultImage=pg_query($dbh,$sql2);
	
		echo "<tr>";
		$img=pg_fetch_row($resultImage)[0];
		echo '<td><img src="'. $img .'"></td>';
		echo "<td><a href=\"itempagefj.php?id=" . $row[0] . "\">" . $row[1] . "</td>";
		echo"<td>".  $row[2] ."</td>";
		echo"<td>".  $row[3] ."</td>";
		echo"<td>".  $row[4] ."</td>";
		echo"<td>".  $row[5] ."</td>";
		echo"<td>".  $row[6] ."</td>";
		echo"<td>".  $row[7] ."</td>";
		// Generate button that, when clicked, calls JS function to add item ID to list
		// in session storage. This list holds the IDs of all items in the basket.
		echo "<td> <button id=\"myButton\" onclick=\"addToBasket($row[0]);\">Add</button> </td>";
		echo "</td> </tr>";
		echo"</tr>";
	}
	echo"</table>";
	
	echo"</div>";
	// free memory
	pg_free_result($result);
	}
	
	
	
	// close connection
	pg_close($dbh);
	?>
	
<?php include 'footer.php';?>