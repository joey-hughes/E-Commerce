<!DOCTYPE html>

<html>

<head>
	<link id="pagestyle" rel="stylesheet" type="text/css" href="css/PressStart.css">
	<title>admin_login</title>
</head>
<body id="admin">
	<div id="container">
		<?php include("header.php"); ?>
	
	<div id="DescriptionAndNews">
	<h2>Administrator Login</h2>
	
<form method="get" action="adminauth.php">
<p>Username: <input type="text" name="name" placeholder="Type Username Here"/></p>
<p>Password: <input type="password" name="pass" placeholder="Type Password Here"/></p>
<input type="submit" id="myButton" style="float:left"/>
</form>
</div>

<!-- footer -->
	<div style="width:100%; clear:left; clear:right;">
	<!-- Generates footer using php. To edit footer, go to "footer.php". -->
	<?php include("footer.php"); ?>
	</div>
	</div>
</body>
</html>