<header>

	<link rel="icon" type="image/png" href="images/favicon.ico">
	
	<a href="index.php"><img id="logo" src="images/logo2.jpeg" width="200" height="200" alt="Logo" style="padding-bottom:10px"/></a>
	<img src="images/banner3.png" alt ="banner" height="200" width="600" style="padding-bottom:10px"/>
	<a href="basket.php"><button id="myButton" style="float:right"><p style="top: 0px">Basket</p> <img src="http://www.veryicon.com/icon/png/System/Pretty%20Office%206/shopping%20basket.png" height="justify" width="32"/></button></a>
	<!-- Navigation -->
	<div class="menu-wrap">
    <nav class="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li>
                <a href="#">Playstation 4<span class="arrow">&#9660;</span></a>
 
                <ul class="sub-menu">
                    <li><a href="result2.php?search= &sorterPlatform=PS4&sorterGenreHead=Shooter">Shooters</a></li>
                    <li style="padding-right:100%"><a href="result2.php?sorterPlatform=PS4&sorterGenreHead=Adventure">Adventure</a></li>
                    <li><a href="result2.php?sorterPlatform=PS4&sorterGenreHead=Action">Action</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Xbox One<span class="arrow">&#9660;</span></a>
 
                <ul class="sub-menu">
                    <li><a href="result2.php?sorterPlatform=Xbox One&sorterGenreHead=Shooter">Shooters</a></li>
                    <li style="padding-right:100%"><a href="result2.php?sorterPlatform=Xbox One&sorterGenreHead=Horror">Horror</a></li>
                    <li><a href="result2.php?sorterPlatform=Xbox One&sorterGenreHead=Adventure">Adventure</a></li>
                </ul>
            </li>
			<li>
                <a href="#">Playstation 3<span class="arrow">&#9660;</span></a>
 
                <ul class="sub-menu">
                    <li><a href="result2.php?sorterPlatform=PS3&sorterGenreHead=Shooter">Shooters</a></li>
                    <li style="padding-right:100%"><a href="result2.php?sorterPlatform=PS3&sorterGenreHead=Action">Action</a></li>
                    <li><a href="result2.php?sorterPlatform=PS3&sorterGenreHead=Sport">Sports</a></li>
                </ul>
            </li>
			<li>
                <a href="#">Xbox 360<span class="arrow">&#9660;</span></a>
 
                <ul class="sub-menu">
                    <li><a href="result2.php?sorterPlatform=Xbox 360&sorterGenreHead=Shooter">Shooters</a></li>
                    <li style="padding-right:100%"><a href="result2.php?sorterPlatform=Xbox 360&sorterGenreHead=Action">Action</a></li>
                    <li><a href="result2.php?sorterPlatform=Xbox 360&sorterGenreHead=Horror">Horror</a></li>
                </ul>
            </li>
			
			<li>
                <a href="#">Wii<span class="arrow">&#9660;</span></a>
 
                <ul class="sub-menu">
                    <li><a href="result2.php?sorterPlatform=Wii U&sorterGenreHead=Platform">Misc</a></li>
					</ul>
                    
            </li>
			<li>
			<?php
			//this stores the value of what was inputted into the search
			$key= isset($_GET['search']) ? $_GET['search']: ''; ?>
			<form id="horbar" action="result2.php" method="get">
				<input type="text" name="search" class="search-field" placeholder="Search..."/>
				<div class="submit-container">
					<input type="submit" value="" class="submit" />
				</div>
			</form>
			</li>
        </ul>
    </nav>
</div>
	
</header>