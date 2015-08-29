/* 
 * Add items to "basket", an object stored in localStorage as a string.
 * Key is item ID, value is the quantity.
 */
function addToBasket (id) {
	// If basket storage is already in place, add item/quantity to it.
	if (localStorage.basketList) {
		var basket = JSON.parse(localStorage.basketList);
		// ...if that item isn't already in the basket.
		if (!basket.hasOwnProperty(id)) {
			basket[id] = 1;
			localStorage.basketList = JSON.stringify(basket);
			alert("Item has been added to basket!");
		}
		else {
			alert("Item already in basket!");
		}
		
	}
	// Otherwise, create it with the item we want inside it.
	else {
		var basket = {}
		basket[id] = 1;
		localStorage.basketList = JSON.stringify(basket);
		alert("Item has been added to basket!");
	}
}

/* Add 1 to the quantity of an item in the basket, adjust price. */
function incQuantity (id) {
	var basket = JSON.parse(localStorage.basketList);
	basket[id]++;
	localStorage.basketList = JSON.stringify(basket);
	
	// Update quantity.
	$("#quant" + id.toString()).text(basket[id].toString());
	
	// Update overall price for this item (quantity * price)
	var old_price = parseFloat($("#itemcost" + id.toString()).text());
	var unit_price = parseFloat($("#unitprice" + id.toString()).text());
	// Fix floating point inaccuracy....
	var new_price = Math.round((old_price + unit_price) * 100) / 100;
	$("#itemcost" + id.toString()).text(new_price.toString());
	
	// Update overall cost of purchase.
	var old_cost = parseFloat($("#totalcost").text());
	var new_cost = Math.round((old_cost + unit_price) * 100) / 100;
	$("#totalcost").text(new_cost.toString());
}

/* Remove 1 from the quantity of an item in the basket, adjust price. */
function decQuantity (id) {
	var basket = JSON.parse(localStorage.basketList);
	if (basket[id] > 1) {
		basket[id]--;
		localStorage.basketList = JSON.stringify(basket);
		
		// Update quantity.
		$("#quant" + id.toString()).text(basket[id].toString());
		
		// Update overall price for this item.
		var old_price = parseFloat($("#itemcost" + id.toString()).text());
		var unit_price = parseFloat($("#unitprice" + id.toString()).text());
		// Fix floating point inaccuracy....
		var new_price = Math.round((old_price - unit_price) * 100) / 100;
		$("#itemcost" + id.toString()).text(new_price.toString());
		
		// Update total cost of purchase.
		var old_cost = parseFloat($("#totalcost").text());
		var new_cost = Math.round((old_cost - unit_price) * 100) / 100;
		$("#totalcost").text(new_cost.toString());
	}
}

/* Remove an item from the basket, adjust price. */
function removeItem (id) {
	var basket = JSON.parse(localStorage.basketList);
	if (basket.hasOwnProperty(id)) {
		// Store item cost involved before deleting it.
		var reduction = parseFloat($("#itemcost" + id.toString()).text());
		
		// Remove that item from the basket page/storage.
		delete basket[id];
		localStorage.basketList = JSON.stringify(basket);
		$("#item" + id.toString()).remove();
		
		// Update total cost.
		var old_cost = parseFloat($("#totalcost").text());
		if ($(".items").length) {
			var new_cost = Math.round((old_cost - reduction) * 100) / 100;
			$("#totalcost").text(new_cost.toString());
		}
		else {
			$("#totalcost").remove();
			$("#proceed").html("");
			$("#basket").text("Basket is empty!");
		}
	}
}

/* Empties basket. */
function emptyBasket () {
	localStorage.basketList = "{}";
	window.location.replace("https://webcourse.cs.nuim.ie/cs230/cs230teamD5/orderconfirmed.php");
}

/*
 * Prints content of basket to an element with ID of "basket", using jQuery 
 * AJAX functionality to request data for the basket's content.
 *
 * Variable: pg - boolean, whether you're on the checkout page. If you are,
 * then remove the column for editing quantity. It's a hacky way to do things,
 * but it's the easiest way without creating a new function/passing more data/
 * other complicated things.
 */
function genBasket (checkout) {
	// Script will only run when page has loaded, so as to prevent strange
	// rendering order & other problems.
	$(document).ready(function() {
		if (localStorage.basketList && localStorage.basketList != "{}") {
			// Prepare IDs to send to the server.
			var data_in = JSON.parse(localStorage.basketList);
			$.post("basketData.php", data_in, function(data_out, status) {
				if (status == "success") {
					$("#basket").html(data_out);
					if (checkout) {
						$("#adjust").remove();
						$(".adjustbuttons").remove();
					}
					else {
						$("#proceed").html("<input id=\"myButton\" type=\"submit\" value=\"Proceed to Checkout\">");
					}
				}
				else {
					alert("Failed to get data! Or something!");
				}
			});
		}
		else {
			$("#basket").text("Basket is empty!");
		}
	});
}