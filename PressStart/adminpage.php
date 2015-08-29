<!DOCTYPE html>

<html>

	<head>
		<title>admin_page</title>
		<link id="pagestyle" rel="stylesheet" type="text/css" href="css/PressStart.css">
	</head>
	<body>
	
		<?php include("header.php"); ?>
		
		<div id="container">
			
			<h2>Admin Area</h2>
			
			<div id ="adminbox">
							
				<!-- DELETE ITEM FORM -->
				<h3>Delete Item</h3>
				<form method="get" action="admindelete.php">
					<p>
						<table>
							<tr>
								<td class="inprw">
									<label class="inplabel" for="id">Game ID:</label> 
								</td>
								<td class="inprw">	
									<input class="inpbx"type="text" name="id" placeholder="Type ID Here"/><br />
									
								</td>
							</tr>
							<tr>
								<td class="inprw">
									<input type="submit" value="Delete"/>
								</td>
							</tr>
						</table>
						
					</p>
				</form>


				<!-- EDIT ITEM FORM -->
				<h3>Edit Item</h3>
				<form method="get" action="adminedit.php">
					<p>
						<table>
							<tr>
								<td class="inprw">
									<label class="inplabel" for="id">Game ID:</label>
								</td>
								<td class="inprw">
									<input class="inpbx" type="text" name="id" placeholder="Type ID Here"/>
								</td>
							</tr>
							<tr>
								<td class="inprw">
									<label class="inplabel" for="title">Game Name:</label>
								</td>
								<td class="inprw">
									<input class="inpbx"type="text" name="title" placeholder="Type Title Here"/>
								</td>
							</tr>
							<tr>
								<td class="inprw">
									<label class="inplabel" for="price">Price:</label>
								</td>
								<td class="inprw">
									<input class="inpbx"type="text" name="price" placeholder="Type Price Here"/>
								</td>
							</tr>
							<tr>
								<td class="inprw">
									<label class="inplabel" for="genre">Genre:</label>
								</td>
								<td class="inprw">
									<input class="inpbx"type="text" name="genre" placeholder="Type Genre Here"/>
								</td>
							</tr>
							<tr>
								<td class="inprw">
									<label class="inplabel" for="console">Console:</label>
								</td>
								<td class="inprw">
									<input class="inpbx"type="text" name="console" placeholder="Type Console Here"/>
								</td>
							</tr>
							<tr>
								<td class="inprw">
									<label class="inplabel" for="publication_date">Release Date:</label>
								</td>
								<td class="inprw">
									<input class="inpbx"type="text" name="publication_date" placeholder="Type yyyy-mm-dd Here"/>
								</td>
							</tr>
							<tr>
								<td class="inprw">
									<label class="inplabel" for="publisher">Publisher:</label>
								</td>
								<td class="inprw">
									<input class="inpbx"type="text" name="publisher" placeholder="Type Publisher Here"/>
								</td>
							</tr>
							<tr>
								<td class="inprw">
									<label class="inplabel" for="description">Description:</label>
								</td>
								<td class="inprw">
									<input class="inpbx"type="text" name="description" placeholder="Type Description Here"/>
								</td>
							</tr>
							<tr>
								<td class="inprw">
									<input type="submit" value="Edit"/>
								</td>
							</tr>
						</table>
						
					</p>
				</form>
					

				<!-- INSERT ITEM FORM -->
				<h3>Insert New Item</h3>
				<form method="get" action="admininsert.php">
					<p>
						<table>
							<tr>
								<td class="inprw">
									<label class="inplabel" for="title">Game Name:</label> 
								</td>
								<td class="inprw">
									<input class="inpbx"type="text" name="title" placeholder="Type Title Here"/>
								</td>
							</tr>
							<tr>
								<td class="inprw">
									<label class="inplabel" for="price">Price:</label> 
								</td>
								<td class="inprw">
									<input class="inpbx"type="text" name="price" placeholder="Type Price Here"/>
								</td>
							</tr>
							<tr>
								<td class="inprw">		
									<label class="inplabel" for="genre">Genre:</label>
								</td>
								<td class="inprw">		
									<input class="inpbx"type="text" name="genre" placeholder="Type Genre Here"/>
								</td>
							</tr>
							<tr>
								<td class="inprw">		
									<label class="inplabel" for="console">Console:</label>
								</td>
								<td class="inprw">		
									<input class="inpbx"type="text" name="console" placeholder="Type Console Here"/>
								</td>
							</tr>
							<tr>
								<td class="inprw">		
									<label class="inplabel" for="publication_date">Release Date:</label> 
								</td>
								<td class="inprw">
									<input class="inpbx"type="text" name="publication_date" placeholder="Type yyyy-mm-dd Here"/>
								</td>
							</tr>
							<tr>
								<td class="inprw">		
									<label class="inplabel" for="publisher">Publisher:</label> 
								</td>
								<td class="inprw">	
									<input class="inpbx"type="text" name="publisher" placeholder="Type Publisher Here"/>
								</td>
							</tr>		
							<tr>
								<td class="inprw">		
									<label class="inplabel" for="description">Description:</label> 
								</td>
								<td class="inprw">		
									<input class="inpbx"type="text" name="description" placeholder="Type Description Here"/>
								</td>
							<tr>
								<td class="inprw">		
									<input type="submit" value="Insert" />
								</td>
							</tr>
						</table>
					</p>
				</form>
				
			</div>
		</div>
		
		<?php include("footer.php"); ?>
		
	</body>
</html>