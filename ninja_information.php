<!DOCTYPE html>
<html>
<head>
	<title>Akatsuki</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="akatsuki.css">
</head>
	<?php
		if(isset($_GET['ninja-name'])) 
		{
		$selected_ninja = $_GET['ninja-name'];
		$conn= pg_connect("host=localhost port=5432 dbname=akatsuki user=postgres password=f");
		$res= pg_query($conn, "Select * from ninja
								join ninja_jutsu on ninja_jutsu.ninja_id = ninja.ninja_id
								join jutsu on jutsu.jutsu_id = ninja_jutsu.jutsu_id
								where ninja_name = '$selected_ninja'");
		//echo 'ten ninja      ' . '  default team  ' . '  intro  '. '  point  '.'  avatar</br>  ';
		$i=0;
			while($row = pg_fetch_row($res)){
				$jutsu_avatar[$i++] = $row[12];
				$ninja_name=$row[1];
				$ninja_infor=$row[2];
				$ninja_point=$row[3];
				$ninja_background=$row[5];
				$ninja_avatar=$row[4];
			}
	?>
	<style type="text/css">
		body {background-image: url(<?php echo "\"$ninja_background\""?>); }
	</style>
	<body>
	<ul class="nav nav-tabs">
		<li><a href="akatsuki.php" class = "ninja-font">AKATSUKI</a></li>
		<li><a href="menu-login.php" class = "ninja-font">log in</a></li>
		<li><a href="about-menu" class = "ninja-font">about</a></li>
	</ul>
	<div class = "case-menu">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="menu_nhiemvu2.php?web=list" class = "ninja-font">mission</a></li>
				<li><a href="menu_xephang.php" class = "ninja-font">ranking</a></li>
				<li class = "active"><a href="ninja_information.php"  class = "ninja-font">information</a></li>
				<li><a href="menu_help.php"  class = "ninja-font">help</a></li>
			</ul>
	</div>
	<div class = "right">
	</br>
	<?php
			
			echo "<table>
					<tr>
					<td>
						<img src = \"$ninja_avatar\" height = \"120\" weight=\"120\" class=\"img-circle\"/>
					</td>
					<td>
						<h3 class = 'ninja-font'>&nbsp&nbsp&nbsp&nbsp$ninja_name</h3>
						<p class = 'ninja-font'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp+ $ninja_point +</p>
					</td>
					
					</tr>
				</table>";  
				echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
				for($j=0;$j<$i;$j++){
					echo "<img src = '$jutsu_avatar[$j]' height = '60' weight='60' class='img-circle'/>     ";
				}
				echo "</br></br><span style ='font-family:calibri;font-size:14pt'>$ninja_infor</span>";
		}	
		else {
			?>
			<body>
				<ul class="nav nav-tabs">
				<li><a href="akatsuki.php" class = "ninja-font">AKATSUKI</a></li>
				<li><a href="menu-login.php" class = "ninja-font">log in</a></li>
				<li><a href="about-menu" class = "ninja-font">about</a></li>
				</ul>
			<div class = "case-menu">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="menu_nhiemvu.php" class = "ninja-font">mission</a></li>
				<li><a href="menu_xephang.php" class = "ninja-font">ranking</a></li>
				<li><a href="ninja_information.php"  class = "ninja-font">information</a></li>
				<li><a href="menu_help.php"  class = "ninja-font">help</a></li>
			</ul>
			</div>
			<div class="container right-xephang">
				<div class="row col-md-6 col-md-offset-2">
					<div id="custom-search-input">
						<div class="input-group">
							<input type="text" class="  search-query form-control" placeholder="  Search with even any pieces of Ninja name ... " />
								<span class="input-group-btn">
								<button class="btn btn-danger" type="button">
                                <span class=" glyphicon glyphicon-search"></span>
                                </button>
                                </span>
                        </div>
                    </div>
				</div>
			</div>
			</body>
			<?php
		}
	?>
	
	</div>
</body>

</html>