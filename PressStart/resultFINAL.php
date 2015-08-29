<!DOCTYPE html>

<html>

<head>
	<title>Press Start Games</title>
	<meta charset="UTF-8">
	<link id="pagestyle" rel="stylesheet" type="text/css" href="PressStartfj.css">
	
	<!-- All code relating to basket. -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/basket.js"></script>
</head>

<body>
<?php include 'header.php';
?>
<?php
//this stores the value of what was inputted into the search
$key= isset($_GET['search']) ? $_GET['search']: '';
//this sorts the list generated
$sorter= isset($_POST['sorter']) ? $_POST['sorter']: 'title';





 echo '<form method="get" action="result.php">'; ?>
Search by name, genre or developer: <input type="text" name="search" placeholder="Search for Games!"/><br />
<input type="submit" />
</form>
<br>

<?php echo '<form method="post" action="result.php?search=' .$key. '">'; ?>
Sort By:<select name="sorter">
	<option value="title">Alphabetically</option>
	<option value="Price DESC">Price (High to Low)</option>
	<option value="Price">Price (Low to High)</option>
	<option value="Publication_Date">Release Date</option>
	<option value="console">Platform</option>
	<option value="genre">Genre</option>
	<option value="Rating">Rating</option>
	<option value="publisher">Developer</option>
	</select>
	<input type="submit" value="Sort"/>
</form>

<div id= "search">
	<table>
		<tr>
			<th>Cover Art</th>
			<th>Title</th>
			<th>Price</th>
			<th>Genre</th>
			<th>Platform</th>
			<th>Rating</th>
			<th>Release Date</th>
			<th>Publisher</th>
			<th>Basket</th>
			<?php
				// attempt a connection
				$dbh = pg_connect("host=webcourse.cs.nuim.ie dbname=cs230 user=cs230teamd5 password=Iethopia");
				if (!$dbh) {
					die("Error in connection: " . pg_last_error());
				}
				
				// execute query
				$sql = "SELECT * FROM videogames where 
				LOWER( title) like LOWER ('%" . $key . "%')
				or LOWER(genre) like LOWER('%" . $key . "%')
				or LOWER(publisher) like LOWER('%" . $key . "%')
				order by " . $sorter;
				
				
				
				//store the result
				$result = pg_query($dbh, $sql);
				
				if (!$result) {
					die("Error in SQL query: " . pg_last_error());
				}
				
				
				echo '';
				// iterate over result set
				// print each row

				while ($row = pg_fetch_array($result)) {
				
				//execute query to generate images for each game
				$sql2="SELECT DISTINCT url from images where game_id=". $row[0] . "and url like '%1.jpg'";
				//store result
				$resultImage=pg_query($dbh,$sql2);
				
					echo "<tr>";
					$img=pg_fetch_row($resultImage)[0];
					echo '<td><img src="'. $img .'"></td>';
					echo "<td><a href=\"itempage.php?id=" . $row[0] . "\">" . $row[1] . "</td>";
					echo"<td>".  $row[2] ."</td>";
					echo"<td>".  $row[3] ."</td>";
					echo"<td>".  $row[4] ."</td>";
					echo"<td>".  $row[5] ."</td>";
					echo"<td>".  $row[6] ."</td>";
					echo"<td>".  $row[7] ."</td>";
					// Generate button that, when clicked, calls JS function to add item ID to list
					// in session storage. This list holds the IDs of all items in the basket.
					echo "<td> <button onclick=\"addToBasket($row[0]);\">Add</button> </td>";
					echo "</td> </tr>";
				}

				
				
				// free memory
				pg_free_result($result);
				// close connection
				pg_close($dbh);
				?>
			
</table>
	
</div>
	
	
</body>	

<?php include 'footer.php';?>

</html>