<!DOCTYPE html>
<html>

<head>
	<title>Basket</title>
	<link id="pagestyle" rel="stylesheet" type="text/css" href="css/PressStart.css">
	
	<!-- All code relating to basket. -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/JavaScript" src="js/basket.js"></script>
</head>


<body id="admin">
<div id="container">
<?php include("header.php");  ?>

<h1 id="basketheader">Basket</h1>
<!-- The basket table will be loaded into this div when fetched. -->
<div id="basket">
<p id="loadingtext">...Loading...</p>
</div>

<script type="text/JavaScript">
	// Parameter == false, print basket for basket page.
	genBasket(false);
</script>

<form id="proceed" action="checkoutFINAL.php">

</form>

<?php include("footer.php"); ?>
</div>

</body>

</html>