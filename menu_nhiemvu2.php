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
      <?php
      if (isset($_GET['web'])) {
          $receive = $_GET['web'];
          switch ($receive) {
              case "list":
                  ?>
                  <div class = 'row right-nhiemvu'>
                     <div class = 'col-md-8 col-md-offset-2'>
                        <ul class='nav nav-tabs'>
                           <li class='active'><a href='menu_nhiemvu2.php?web=list' class = 'ninja-font'>list </a></li>
                           <li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
                           <li><a href='menu_nhiemvu2.php?web=in_progress' class = 'ninja-font'>in progress </a></li>
                           <li><a href='menu_nhiemvu2.php?web=finished' class = 'ninja-font'>finished</a></li>
                           <li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
                           <li><a href='menu_nhiemvu2.php?web=create_mission' class = 'ninja-font'>+ create mission</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class = 'row right-xephang'>
                     <div class = 'col-md-8 col-md-offset-2'>
                        <table class='table table-hover'>
                           <thead>
                              <tr>
                                 <th class= 'ninja-font'>stt</th>
                                 <th class = 'ninja-font'>name</th>
                                 <th class='ninja-font'>number</th>
                                 <th class='ninja-font'>point</th>
                                 <th class='ninja-font'>skill</th>
                                 <th class='ninja-font'>time</th>
                              </tr>
                           </thead>
                           <tbody>
                               <?php
                               $conn = pg_connect("host=localhost port=5432 dbname=akatsuki user=postgres password=f");
                               $res = pg_query($conn, "Select * from ninmu
														join ninmu_jutsu on ninmu_jutsu.ninmu_id = ninmu.ninmu_id
														join jutsu on jutsu.jutsu_id = ninmu_jutsu.jutsu_id");
                               $i = -1;
                               $ninmu_id[$i] = 5;
                               while ($row = pg_fetch_row($res)) {
                                   if ($row[0] != $ninmu_id[$i]) {
                                       $i++;
                                       $j = 0;
                                   }
                                   $ninmu_id[$i] = $row[0];
                                   $ninmu_name[$i] = $row[1];
                                   $ninmu_number[$i] = $row[2];
                                   $ninmu_point[$i] = $row[3];
                                   $ninmu_skill[$i][$j++] = $row[9];
                                   $ninmu_time[$i] = $row[4];
                               }

                               for ($x = 0; $x < $i + 1; $x++) {
                                   ?>
                                  <tr>
                                     <td>
                <?php echo "$ninmu_id[$x]" ?>
                                     </td>
                                     <td>
                <?php echo "$ninmu_name[$x]" ?>
                                     </td>
                                     <td>
                <?php echo "$ninmu_number[$x]" ?>
                                     </td>
                                     <td>
                <?php echo "$ninmu_point[$x]" ?>
                                     </td>
                                     <td>
                                         <?php
                                         $y = 0;
                                         $skill_avatar = $ninmu_skill[$x][0];
                                         while ($skill_avatar) {
                                             echo "<img src = '$skill_avatar' height=\"42\" width=\"42\" class=\"img-circle\"/>";
                                             $y++;
                                             $skill_avatar = @$ninmu_skill[$x][$y];
                                         }
                                         ?>
                                     </td>
                                     <td>
                                         <?php echo "$ninmu_time[$x]" ?>
                                     </td>
                                  </tr>
                                  <?php
                                  ;
                              }
                              ?>
                           </tbody>
                        </table>
                     </div>

                  </div>
            <?php
            break;
        case "in_progress":
            echo "	<div class = 'row right-nhiemvu'>
							<div class = 'col-md-8 col-md-offset-2'>
								<ul class='nav nav-tabs'>
									<li><a href='menu_nhiemvu2.php?web=list' class = 'ninja-font'>list </a></li>
									<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
									<li class='active'><a href='menu_nhiemvu2.php?web=in_progress' class = 'ninja-font'>in progress </a></li>
									<li><a href='menu_nhiemvu2.php?web=finished' class = 'ninja-font'>finished</a></li>
									<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
									<li><a href='menu_nhiemvu2.php?web=create_mission' class = 'ninja-font'>+ create mission</a></li>
								</ul>
							</div>
						</div>
						<div class = 'row rightx'>
							<div class = 'col-md-6 col-md-offset-2'>
								inprogress
							</div>
						</div>";
            break;
        case "finished":
            echo "	<div class = 'row right-nhiemvu'>
							<div class = 'col-md-8 col-md-offset-2'>
								<ul class='nav nav-tabs'>
									<li><a href='menu_nhiemvu2.php?web=list' class = 'ninja-font'>list </a></li>
									<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
									<li><a href='menu_nhiemvu2.php?web=in_progress' class = 'ninja-font'>in progress </a></li>
									<li class='active'><a href='menu_nhiemvu2.php?web=finished' class = 'ninja-font'>finished</a></li>
									<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
									<li><a href='menu_nhiemvu2.php?web=create_mission' class = 'ninja-font'>+ create mission</a></li>
								</ul>
							</div>
						</div>
						<div class = 'row rightx'>
						<div class = 'col-md-6 col-md-offset-2'>
							finished
						</div>
					</div>";
            break;
        case "create_mission":
            echo "	<div class = 'row right-nhiemvu'>
							<div class = 'col-md-8 col-md-offset-2'>
								<ul class='nav nav-tabs'>
									<li><a href='menu_nhiemvu2.php?web=list' class = 'ninja-font'>list </a></li>
									<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
									<li><a href='menu_nhiemvu2.php?web=in_progress' class = 'ninja-font'>in progress </a></li>
									<li><a href='menu_nhiemvu2.php?web=finished' class = 'ninja-font'>finished</a></li>
									<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
									<li class='active'><a href='menu_nhiemvu2.php?web=create_mission' class = 'ninja-font'>+ create mission</a></li>
								</ul>
							</div>
						</div>
						<div class = 'row rightx'>
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