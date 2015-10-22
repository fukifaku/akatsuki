<!DOCTYPE html>
<html>
<head>
	<title>Akatsuki</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="akatsuki.css">
</head>
<body>
	<ul class="nav nav-tabs">
		<li><a href="akatsuki.php" class = "ninja-font">AKATSUKI</a></li>
		<li><a href="menu_login.php" class = "ninja-font">log in</a></li>
		<li><a href="about-menu" class = "ninja-font">about</a></li>
	</ul>
	<?php
			$pass = $_GET['pass'];
			$id = $_GET['id'];
	echo
	"<div class = 'case-menu'>
			<ul class='nav nav-pills nav-stacked'>
				<li><a href='menu_nhiemvu.php?id=$id&pass=$pass' class = 'ninja-font'>mission</a></li>
				<li><a href='menu_xephang.php' class = 'ninja-font'>ranking</a></li>
				<li><a href='ninja_information.php'  class = 'ninja-font'>information</a></li>
				<li><a href='menu_help.php'  class = 'ninja-font'>help</a></li>
			</ul>
	</div>"
	?>
</body>
</html>