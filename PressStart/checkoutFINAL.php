<!DOCTYPE html>
<html>
<head>
	
	<meta name="description" content="PressStart Games: Providing the latest best sellers on the top platforms.">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8">
	
	<link rel="icon" type="image/png" href="images/favicon.ico">
	<link id="pagestyle" rel="stylesheet" type="text/css" href="css/PressStart.css">
	
	<title>Press Start Games</title>
	
	<style>
		<!-- leave style here, can be used to style individual pages -->
	</style>
	<script src="PressStart.js">
		<!-- link for script -->
	</script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/basket.js"></script>
	
	</head>
<body>
<script>
function formValidation()  
{    
	//initialising variables and linking them to the html input boxes
var uname = document.registration.username; 
var lname = document.registration.lastname; 
var uadd = document.registration.address;  
var ucountry = document.registration.country;  
var uzip = document.registration.zip;  
var uemail = document.registration.email;  
var umsex = document.registration.msex;  
var ufsex = document.registration.fsex;   
{  
if(allLetter(uname))  
{  
if(aLetter(lname))
{
if(alphanumeric(uadd))  
{   
if(countryselect(ucountry))  
{  
if(allnumeric(uzip))  
{  
if(ValidateEmail(uemail))  
{  
if(validsex(umsex,ufsex))  
{  
}    
}  
}   
}
}  
}  
}  
}  
return false;  
  
} 
// function userid_validation(uid,mx,my)  
// {  
// var uid_len = uid.value.length;  
// if (uid_len == 0 || uid_len >= my || uid_len < mx)  
// {  
// alert("User Id should not be empty / length be between "+mx+" to "+my);  
// uid.focus();  
// return false;  
// }  
// return true;  
// }  
// function passid_validation(passid,mx,my)  
// {  
// var passid_len = passid.value.length;  
// if (passid_len == 0 ||passid_len >= my || passid_len < mx)  
// {  
// alert("Password should not be empty / length be between "+mx+" to "+my);  
// passid.focus();  
// return false;  
// }  
// return true;  
// }  
function allLetter(uname)  
{   
var letters = /^[A-Za-z]+$/;  //check if input is alphabetical characters only
if(uname.value.match(letters))  //if they are, accept input
{  
return true;  
}  
else  
{  
	//if input is not just alphabetical characters, print an error message
	alert('First name must have alphabet characters only');  
	uname.focus();  
	return false;  
}  
}  



function aLetter(lname)  
{   
var letters = /^[A-Za-z]+$/;  
if(lname.value.match(letters))  
{  
return true;  
}  
else  
{  
	alert('Last name must have alphabet characters only');  
	lname.focus();  
	return false;  
}  
}  


function alphanumeric(uadd)  
{   
	//check that only numerical characters are entered
var letters = /^[0-9a-zA-Z ]+$/;  
if(uadd.value.match(letters))  
{  
return true;  
}  
else  
{  
	alert('User address must have alphanumeric characters only');  
	uadd.focus();  
	return false;  
}  
}  
function countryselect(ucountry)  
{  
	//drop down menu with option to select country. when a county is selected it will save the chosen option.
if(ucountry.value == "Default")  
{  
	alert('Select your country from the list');  
	ucountry.focus();  
	return false;  
}  
else  
{  
return true;  
}  
}  
function allnumeric(uzip)  
{   
	//make sure only numeric characters are entered.
var numbers = /^[0-9]+$/;  
if(uzip.value.match(numbers))  
{  
return true;  
}  
else  
{  
	alert('ZIP code must have numeric characters only');  
	uzip.focus();  
	return false;  
}  
}  
function ValidateEmail(uemail)  
{  
	//make sure the email has a valid format. 
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
if(uemail.value.match(mailformat))  
{  
return true;  
}  
else  
{  
	alert("You have entered an invalid email address!");  
	uemail.focus();  
	return false;  
}  
} function validsex(umsex,ufsex)  
{  
x=0;  
  
if(umsex.checked)   
{  
x++;  
} if(ufsex.checked)  
{  
x++;   
}  
if(x==0)  
{  
	alert('Select Male/Female');  
	umsex.focus();  
	return false;  
}  
else  
{
	// Form has been filled out correctly. Run this code on success.
	emptyBasket();
	return true;  
}  
}  
</script>

	<div id="container">
		<?php include("header.php"); ?>
	
			<div id="searchBar">
				&nbsp;
			</div>
			
			<h2>Checkout</h2>
			
			<script>
				// parameter == true, so basket tailored for checkout page.
				genBasket(true);
			</script>
			<div id="basket"></div>
			
			<div id ="checkoutbox">
				<h3>	Personal Details: </h3>
				
				<form name='registration' onSubmit="return formValidation();">
				
				<div class="checkoutdetails">  
					<ul>	
						<li><label for="username">First Name:</label></li> 
						<li><label for="lastname">Last Name:</label></li> 
						<li><label for="address">Address:</label></li>
						<li><label for="country">Country:</label></li>
						<li><label for="zip">ZIP Code:</label></li>  
						<li><label for="email">Email:</label></li>  	 
						<li><label id="gender">Gender:</label></li>
						<li>
							<input type="radio" name="msex" value="Male" /><span>Male</span> <br />
							<input type="radio" name="fsex" value="Female" /><span>Female</span>
						</li>  

						<li><input type="submit" id="myButton" name="submit" value="Confirm Purchase"/></li>  
					
					</ul>
				</div>
					
				<div class="checkoutdetails">
					
					<ul>	
						<li><input type="text" name="username" size="50" /></li>
						<li><input type="text" name="lastname" size="50" /></li>
						<li><input type="text" name="address" size="50" /></li> 
						<li>
							<select name="country">  
								
								<option selected="" value="Default">(Please select a country)</option>
							
								<option value="AF">Australia</option>  
								<option value="AL">Canada</option>  
								<option value="DZ">Ireland</option>  
								<option value="AS">Russia</option>  
								<option value="AD">USA</option>  
								
							</select>
						</li>  
						<li><input type="text" name="zip" /></li>
						<li><input type="text" name="email" size="50" /></li>  	 
						<li>&nbsp;</li>  
						<li>&nbsp;</li>  
						<li>&nbsp;</li>   

						 
					
					</ul>
					
				</div>
				
				</form> 
			</div>
				
			<!-- Generates footer using php. To edit footer, go to "footer.php". -->
			<?php include("footer.php"); ?>
	</div>
</body>
</html>