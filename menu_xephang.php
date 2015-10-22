<!DOCTYPE html>
<html>
<head>
	<title>Akatsuki</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="akatsuki.css">
</head>
<body class = 'body-ranking'>
	<ul class="nav nav-tabs">
		<li><a href="akatsuki.php" class = "ninja-font">AKATSUKI</a></li>
		<li><a href="menu-login.php" class = "ninja-font">log in</a></li>
		<li><a href="about-menu" class = "ninja-font">about</a></li>
	</ul>
	<div class = "case-menu">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="menu_nhiemvu2.php?web=list" class = "ninja-font">mission</a></li>
				<li class = "active"><a href="menu_xephang.php" class = "ninja-font">ranking</a></li>
				<li><a href="ninja_information.php"  class = "ninja-font">information</a></li>
				<li><a href="menu_help.php"  class = "ninja-font">help</a></li>
			</ul>
	</div>
	
	<div class = "row right-xephang">
	<div class = "col-md-6 col-md-offset-2">
	<table class="table table-hover">
	<thead>
	<tr>
		<th>rank</th>
		<th>avatar</th>
		<th>name</th>
		<th>point</th>
	</tr>
	</thead>
	<tbody>
	<?php
			
		$conn= pg_connect("host=localhost port=5432 dbname=akatsuki user=postgres password=f");
		$res= pg_query($conn, "Select * from \"ninja\"");
		$i=-1;
		$r=0;
		while($row = pg_fetch_row($res)){
			$xh[++$i][3] = $row[3];
			$xh[$i][1] = $row[1];
			$xh[$i][4] = $row[4];
		}
		for($j=0;$j<$i;$j++)
			for($k=$j+1;$k<$i+1;$k++){
				if(intval($xh[$j][3])<intval($xh[$k][3])){
					$temp = $xh[$j][4];
					$xh[$j][4]=$xh[$k][4];
					$xh[$k][4]=$temp;
					$temp = $xh[$j][3];
					$xh[$j][3]=$xh[$k][3];
					$xh[$k][3]=$temp;
					$temp = $xh[$j][1];
					$xh[$j][1]=$xh[$k][1];
					$xh[$k][1]=$temp;
				}
			}
			
		for($j=0;$j<$i+1;$j++){
			$strname = $xh[$j][1];
			$stravatar = "\"" . $xh[$j][4] . "\"";
			$strpoint = $xh[$j][3];
			$r++;
			echo "<tr onclick=\"document.location = 'ninja_information.php?ninja-name=$strname';\">
				<td>$r</td>
				<td><img src = $stravatar height=\"42\" width=\"42\" class=\"img-circle\"/></td> 
				<td>$strname</td> 
				<td>$strpoint</td>
				</tr>";
		}
	?>
	</tbody>
	</table>
	</div>
	</div>
</body>
</html>