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
		<li><a href="menu-login.php" class = "ninja-font">log in</a></li>
		<li><a href="about-menu" class = "ninja-font">about</a></li>
	</ul>
	<div class = "case-menu">
			<ul class="nav nav-pills nav-stacked">
				<li class = "active"><a href="menu_nhiemvu.php" class = "ninja-font">mission</a></li>
				<li><a href="menu_xephang.php" class = "ninja-font">ranking</a></li>
				<li><a href="ninja_information.php"  class = "ninja-font">information</a></li>
				<li><a href="menu_help.php"  class = "ninja-font">help</a></li>
			</ul>
	</div>
	<div class = "row right-nhiemvu">
		<div class = "col-md-8 col-md-offset-2">
			<ul class="nav nav-tabs">
				<li><a href='menu_nhiemvu2.php?web=list' class = "ninja-font">list </a></li>
				<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
				<li><a href='menu_nhiemvu2.php?web=in_progress' class = "ninja-font">in progress </a></li>
				<li><a href='menu_nhiemvu2.php?web=finished' class = "ninja-font">finished</a></li>
				<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
				<li><a href='menu_nhiemvu2.php?web=create_mission' class = "ninja-font">+ create mission</a></li>
			</ul>
		</div>
	</div>
	<?php
		if(isset($_GET['web'])) {
		$receive = $_GET['web'];
		switch($receive){
			case "list":
				echo "	<div class = 'row right-nhiemvu'>
						<div class = 'col-md-6 col-md-offset-2'>
							list
						</div>
					</div>";
				break;
			case "in_progress":
				echo "	<div class = 'row right-nhiemvu'>
						<div class = 'col-md-6 col-md-offset-2'>
							inprogress
						</div>
						</div>";
				break;
			case "finished":
				echo "	<div class = 'row right-nhiemvu'>
						<div class = 'col-md-6 col-md-offset-2'>
							finished
						</div>
					</div>";
				break;
			case "create_mission":
				echo "	<div class = 'row right-nhiemvu'>
						<div class = 'col-md-6 col-md-offset-2'>
							create mission
						</div>
					</div>";
				break;
		}
		}
	?>
</body>
</html>