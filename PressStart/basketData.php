<?php
# Given a list of item ID's, return the details of each item.


# First, connect to the server and create base query.
$conn_string = "host=webcourse.cs.nuim.ie dbname=cs230 user=cs230teamd5 " .
	"password=Iethopia";
$conn = pg_pconnect($conn_string);
$query = "SELECT * FROM videogames WHERE ";

# Number of items to be fetched.
$len = count($_POST);

# Append each item's ID to query.
$ids = array_keys($_POST);
for ($i = 0; $i < $len-1; $i++) {
	$query .= "id=$ids[$i] or ";
}
$final_id = $ids[$len-1];
$query .= "id=$final_id;";


# Make query.
$result = pg_query($conn, $query);

# Get results and print them.
if ($result) {
	# Store price-related data to be printed alongside the page.
	$quantity = 0;
	$item_cost = 0.0;
	$total_cost = 0.0;
	
	# Prepare table.
	echo "<table id=\"baskettable\">";
	echo "<tr id=\"basketheadings\">" .
		"<th>Title</th>" .
		"<th>Unit Price</th>" .
		"<th>Item Cost</th>" .
		"<th>Quantity</th>" .
		"<th id=\"adjust\">Adjust Quantity</th>" .
		"</tr>";
	
	# Print data to table.
	while ($row = pg_fetch_row($result)) {
		$quantity = $_POST[$row[0]];
		$item_cost = $quantity * $row[2];
		$total_cost +=  $item_cost;
		
		echo "<tr id=\"item$row[0]\" class=\"items\">" .
			"<td>$row[1]</td>" .
			"<td>€<var id=\"unitprice$row[0]\">$row[2]</var></td>" .
			"<td>€<var id=\"itemcost$row[0]\">$item_cost</var></td>" .
			"<td><var id=\"quant$row[0]\">$quantity</var></td>" .
			"<td class=\"adjustbuttons\">" .
			"<button id=\"myButton3\" onclick=\"decQuantity($row[0])\">-</button>" .
			"<button id=\"myButton3\" onclick=\"incQuantity($row[0])\">+</button>" .
			"<button id=\"myButton3\" onclick=\"removeItem($row[0])\">Remove</button>" .
			"</td>" .
			"</tr>";
	}
	echo "</table>";
	
	# Use a var tag so that the total price can be adjusted using jQuery as
	# the user changes items in basket.
	echo "<b><p>Total cost: €<var id=\"totalcost\">$total_cost</var></p></b>";
}
?>