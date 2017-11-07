<!DOCTYPE html>
<html>
<head>
	<title>My PHP Project</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<!-- <link rel="PHP" type="PHP" href="index.php"> -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
	<header>
		<div id="header-img">
			<img src="img/header.png">
		</div>
		<nav id="menu">
			<ul>
				<li> <a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active': NULL ?>" href="index.php" id="home">Home</a></li>
				<li><a class="<?php echo($current_page =='about.php' || $current_page =='')?'active': NULL?>"
				href="about.php" id="about">About Us</a></li>
				<li><a class="<?php echo($current_page =='browse.php' || $current_page =='')?'active': NULL?>"
				href="browse.php" id="browse">Browse Books</a></li>
				<li><a class="<?php echo($current_page =='books.php' || $current_page =='')?'active': NULL?>"
				href="books.php" id="books">My Books</a></li>
				<li><a class="<?php echo($current_page =='contact.php' || $current_page =='')?'active': NULL?>" href="contact.php" id="contact">Contact</a></li>
				<li><a class="<?php echo($current_page =='upload.php' || $current_page =='')?'active': NULL?>" href="upload.php" id="upload">Upload</a></li>
			</ul>
		</nav>
	</header>