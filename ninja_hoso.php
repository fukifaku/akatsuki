<!DOCTYPE html>
<?php
$conn = @pg_connect("host=localhost port=5432 dbname=akatsuki user='postgres' password='f'");
$pass = @$_GET['pass'];
$id = @$_GET['id'];
?>
<html>
   <head>
      <title>Akatsuki</title>
      <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css">-->
      <link rel="stylesheet" type='text/css' href="css/reset.css">
      <link rel="stylesheet" type='text/css' href="css/style.css"> 
      <link rel="stylesheet" type="text/css" href="css/normalize.css" />
      <link rel="stylesheet" type="text/css" href="css/demo.css" />
      <link rel="stylesheet" type="text/css" href="css/set2.css" />
      <link rel="stylesheet" type="text/css" href="css/akatsuki.css">

      <script src="js/modernizr.js"></script> 


   </head>
   <body>
       <?php
       $res = pg_query($conn, "Select customer_name, customer_avatar from customer where customer_username = '$id'");
       $row = @pg_fetch_row($res);
       $customer_name = $row[0];
       $customer_avatar = $row[1];
       ?>
      <header role="banner">
         <div id="cd-logo"><a href="#"><img src="img/logo_akatsuki.png" alt="Logo"></a></div>

         <nav class="main-nav">
            <ul>
               <li><a class="cd-contact" href="#0">Liên hệ</a></li>
               <li><a class="cd-signup" href="#0"><img src = <?php echo $customer_avatar ?> height='18' width='18' class='img-circle'/>  <?php echo $customer_name ?> </a></li>
            </ul>
         </nav>
      </header>
      <div id="accordian">
         <ul>
            <li>
               <h2><span class="icon-mission"></span>Nhiệm vụ</h2>
               <ul>
                  <li id="them-nhiem-vu"><a href="nhiemvu_them.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>" >Thêm nhiệm vụ</a></li>
                  <li id='lich-su-nhiem-vu'><a href="nhiemvu_lichsu.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Lịch sử nhiệm vụ</a></li>
               </ul>
            </li>
            <li class ="active">
               <h2><span class="icon-tasks"></span>Ninja</h2>
               <ul>
                  <li id="xep-hang"><a href="ninja_xephang.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>" >Bảng xếp hạng</a></li>
                  <li id="ho-so" class ="active"><a href="ninja_hoso.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>" >Hồ sơ Ninja</a></li>
                  <li id='trang-thai'><a href="ninja_trangthai.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Trạng thái</a></li>
                  <li id='yeu-thich'><a href="ninja_yeuthich.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Yêu thích</a></li>
               </ul>
            </li>
            <li>
               <h2><span class="icon-calendar"></span>Tài khoản</h2>
               <ul>
                  <li id='thong-tin'><a href="taikhoan_thongtin.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Thông tin</a></li>
                  <li id='ngan-quy'><a href="taikhoan_nganquy.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Ngân Quỹ</a></li>
                  <li id='dang-xuat'><a href='user_program.php'>Đăng xuất</a></li>
               </ul>
            </li>
            <li>
               <h2><span class="icon-heart"></span>Hướng dẫn</h2>
               <ul>
                  <li id='hd-nhiemvu'><a href="huongdan_nhiemvu.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Nhiệm Vụ</a></li>
                  <li id='hd-ninja'><a href="huongdan_ninja.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Ninja</a></li>
                  <li id='hd-taikhoan'><a href="huongdan_taikhoan.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Tài khoản</a></li>
               </ul>
            </li>
         </ul>
      </div>
      <?php
      $pass = @$_GET['pass'];
      $id = @$_GET['id'];
      $ninja_id = @$_GET['ninja'];
      if (!isset($_GET['ninja'])) {
          ?>
          <div id="bang-ho-so">

             <form class="form-ho-so" method="post">
                <section class="content">
                   <span class="input input--makiko">
                      <input class="input__field input__field--makiko" type="text" id="input-16" name="search" />
                      <label class="input__label input__label--makiko" for="input-16">
                         <span class="input__label-content input__label-content--makiko">Search</span>
                      </label>
                      <input type="submit" style="position: absolute; left: -9999px" name="submit-button"/>
                   </span>
                </section>
             </form>
             <?php
             if (@$_POST['submit-button']) {
                 ?>
                 <div id="hoso-head-row">
                    <div class="col-take-0-8">Làng</div>
                    <div class="col-take-0-8">Avatar</div>
                    <div class="col-take-1-6">Tên</div>
                    <div class="col-take-2">Thông Tin</div>
                    <div class="col-take-2">Kĩ Năng</div>
                    <div class="col-take-0-7">Điểm</div>
                 </div>
                 <?php
                 $count_all = 0;
                 $a = @$_POST['search'];
                 $res = pg_query($conn, "select ninja_id, ninja_name from ninja");
                 $count = 0;
                 $ninja_id_temp[-1] = 1000;
                 while ($row = pg_fetch_row($res)) {
                     if ($ninja_id_temp[$count - 1] != $row[0]) {
                         if (stripos($row[1], $a) || stripos($row[1], $a) === 0) {
                             $ninja_id_temp[$count++] = $row[0];
                             $result_all[$count_all++] = $row[0];
                         }
                     }
                 }
                 for ($k = 0; $k < $count; $k ++) {
                     $ninja_id_tmp = $ninja_id_temp[$k];
                     $res = pg_query($conn, "select distinct ninja_id, ninja_avatar, ninja_name, ninja_intro, ninja_point, sato_logo, jutsu_logo from ninja
                                        join ninja_jutsu using (ninja_id)
                                        join jutsu using (jutsu_id)
                                        join sato_ninja using (ninja_id)
                                        join sato using(sato_id)
                                        where ninja_id = $ninja_id_tmp
                                        ");
                     $i = 0;
                     while ($row = pg_fetch_row($res)) {
                         $ninja_name = $row[2];
                         $ninja_avatar = $row[1];
                         $ninja_intro = $row[3];
                         $intro_print = substr($ninja_intro, 0, 45);
                         $ninja_point = $row[4];
                         $jutsu_logo[$i++] = $row[6];
                         $sato_logo = $row[5];
                     }

                     echo "<a href='ninja_hoso.php?id=$id&pass=$pass&ninja=$ninja_id_tmp'><div class ='ninja-row-2'>
                        <div class = 'col-take-0-8'><img src = $sato_logo height='40' width='40' class='img-radius'/></div> 
			<div class = 'col-take-0-8'><img src = $ninja_avatar height='40' width='40' class='img-circle'/></div>
			<div class = 'col-take-1-6'><b>$ninja_name</b></div> 
                        <div class = 'col-take-2'>$intro_print ...</div>";
                     echo "<div class = 'col-take-2'>";
                     for ($j = 0; $j < $i; $j++) {
                         $img = @$jutsu_logo[$j];
                         echo "<img src = $img height='40' width='40' class='img-circle'/>&nbsp;";
                     }
                     echo "</div><div class = 'col-take-0-7'>$ninja_point</div></div></a>";
                 }
                 $res = pg_query($conn, "select ninja_id, sato_name from ninja
                                        join sato_ninja using (ninja_id)
                                        join sato using(sato_id)
                                        ");
                 $count = 0;
                 $ninja_id_temp[-1] = 1000;
                 $kt = 0;
                 while ($row = pg_fetch_row($res)) {
                     if ($ninja_id_temp[$count - 1] != $row[0]) {
                         for ($u = 0; $u < $count_all; $u++) {
                             if ($result_all[$u] == $row[0])
                                 $kt = 1;
                         } if ($kt == 0) {
                             if (stripos($row[1], $a) || stripos($row[1], $a) === 0) {
                                 $ninja_id_temp[$count++] = $row[0];
                                 $result_all[$count_all++] = $row[0];
                             }
                         }
                     }
                 }
                 for ($k = 0; $k < $count; $k ++) {
                     $ninja_id_tmp = $ninja_id_temp[$k];
                     $res = pg_query($conn, "select distinct ninja_id, ninja_avatar, ninja_name, ninja_intro, ninja_point, sato_logo, jutsu_logo from ninja
                                        join ninja_jutsu using (ninja_id)
                                        join jutsu using (jutsu_id)
                                        join sato_ninja using (ninja_id)
                                        join sato using(sato_id)
                                        where ninja_id = $ninja_id_tmp
                                        ");
                     $i = 0;
                     while ($row = pg_fetch_row($res)) {
                         $ninja_name = $row[2];
                         $ninja_avatar = $row[1];
                         $ninja_intro = $row[3];
                         $intro_print = substr($ninja_intro, 0, 40);
                         $ninja_point = $row[4];
                         $jutsu_logo[$i++] = $row[6];
                         $sato_logo = $row[5];
                     }

                     echo "<a href='ninja_hoso.php?id=$id&pass=$pass&ninja=$ninja_id_tmp'><div class ='ninja-row-2'>
                        <div class = 'col-take-0-8'><img src = $sato_logo height='40' width='40' class='img-radius'/></div> 
			<div class = 'col-take-0-8'><img src = $ninja_avatar height='40' width='40' class='img-circle'/></div>
			<div class = 'col-take-1-6'>$ninja_name</div> 
                        <div class = 'col-take-2'>$intro_print ...</div>";
                     echo "<div class = 'col-take-2'>";
                     for ($j = 0; $j < $i; $j++) {
                         $img = @$jutsu_logo[$j];
                         echo "<img src = $img height='40' width='40' class='img-circle'/>&nbsp;";
                     }
                     echo "</div><div class = 'col-take-0-7'>$ninja_point</div></div></a>";
                 }

                 $res = pg_query($conn, "select ninja_id, jutsu_name from ninja
                                        join ninja_jutsu using (ninja_id)
                                        join jutsu using(jutsu_id)
                                        ");
                 $count = 0;
                 $ninja_id_temp[-1] = 1000;
                 $kt = 0;
                 while ($row = pg_fetch_row($res)) {
                     if ($ninja_id_temp[$count - 1] != $row[0]) {
                         for ($u = 0; $u < $count_all; $u++) {
                             if ($result_all[$u] == $row[0])
                                 $kt = 1;
                         } if ($kt == 0) {
                             if (stripos($row[1], $a) || stripos($row[1], $a) === 0) {
                                 $ninja_id_temp[$count++] = $row[0];
                                 $result_all[$count_all++] = $row[0];
                             }
                         }
                     }
                 }
                 for ($k = 0; $k < $count; $k ++) {
                     $ninja_id_tmp = $ninja_id_temp[$k];
                     $res = pg_query($conn, "select distinct ninja_id, ninja_avatar, ninja_name, ninja_intro, ninja_point, sato_logo, jutsu_logo from ninja
                                        join ninja_jutsu using (ninja_id)
                                        join jutsu using (jutsu_id)
                                        join sato_ninja using (ninja_id)
                                        join sato using(sato_id)
                                        where ninja_id = $ninja_id_tmp
                                        ");
                     $i = 0;
                     while ($row = pg_fetch_row($res)) {
                         $ninja_name = $row[2];
                         $ninja_avatar = $row[1];
                         $ninja_intro = $row[3];
                         $intro_print = substr($ninja_intro, 0, 40);
                         $ninja_point = $row[4];
                         $jutsu_logo[$i++] = $row[6];
                         $sato_logo = $row[5];
                     }

                     echo "<a href='ninja_hoso.php?id=$id&pass=$pass&ninja=$ninja_id_tmp'><div class ='ninja-row-2'>
                        <div class = 'col-take-0-8'><img src = $sato_logo height='40' width='40' class='img-radius'/></div> 
			<div class = 'col-take-0-8'><img src = $ninja_avatar height='40' width='40' class='img-circle'/></div>
			<div class = 'col-take-1-6'>$ninja_name</div> 
                        <div class = 'col-take-2'>$intro_print ...</div>";
                     echo "<div class = 'col-take-2'>";
                     for ($j = 0; $j < $i; $j++) {
                         $img = @$jutsu_logo[$j];
                         echo "<img src = $img height='40' width='40' class='img-circle'/>&nbsp;";
                     }
                     echo "</div><div class = 'col-take-0-7'>$ninja_point</div></div></a>";
                 }

                 $res = pg_query($conn, "select ninja_id, ninja_intro from ninja");
                 $count = 0;
                 $ninja_id_temp[-1] = 1000;
                 $kt = 0;
                 while ($row = pg_fetch_row($res)) {
                     if ($ninja_id_temp[$count - 1] != $row[0]) {
                         for ($u = 0; $u < $count_all; $u++) {
                             if ($result_all[$u] == $row[0])
                                 $kt = 1;
                         } if ($kt == 0) {
                             if (stripos($row[1], $a) || stripos($row[1], $a) === 0) {
                                 $ninja_id_temp[$count++] = $row[0];
                                 $result_all[$count_all++] = $row[0];
                             }
                         }
                     }
                 }
                 for ($k = 0; $k < $count; $k ++) {
                     $ninja_id_tmp = $ninja_id_temp[$k];
                     $res = pg_query($conn, "select distinct ninja_id, ninja_avatar, ninja_name, ninja_intro, ninja_point, sato_logo, jutsu_logo from ninja
                                        join ninja_jutsu using (ninja_id)
                                        join jutsu using (jutsu_id)
                                        join sato_ninja using (ninja_id)
                                        join sato using(sato_id)
                                        where ninja_id = $ninja_id_tmp
                                        ");
                     $i = 0;
                     while ($row = pg_fetch_row($res)) {
                         $ninja_name = $row[2];
                         $ninja_avatar = $row[1];
                         $ninja_intro = $row[3];
                         $intro_print1 = substr($ninja_intro, stripos($row[3], $a) - 10, 10);
                         $intro_print2 = substr($ninja_intro, stripos($row[3], $a), strlen($a));
                         $intro_print3 = substr($ninja_intro, stripos($row[3], $a) + strlen($a), 35);
                         $ninja_point = $row[4];
                         $jutsu_logo[$i++] = $row[6];
                         $sato_logo = $row[5];
                     }

                     echo "<a href='ninja_hoso.php?id=$id&pass=$pass&ninja=$ninja_id_tmp'><div class ='ninja-row-2'>
                        <div class = 'col-take-0-8'><img src = $sato_logo height='40' width='40' class='img-radius'/></div> 
			<div class = 'col-take-0-8'><img src = $ninja_avatar height='40' width='40' class='img-circle'/></div>
			<div class = 'col-take-1-6'>$ninja_name</div> 
                        <div class = 'col-take-2'>...$intro_print1<b>$intro_print2</b>$intro_print3 ...</div>";
                     echo "<div class = 'col-take-2'>";
                     for ($j = 0; $j < $i; $j++) {
                         $img = @$jutsu_logo[$j];
                         echo "<img src = $img height='40' width='40' class='img-circle'/>&nbsp;";
                     }
                     echo "</div><div class = 'col-take-0-7'>$ninja_point</div></div></a>";
                 }
             }
             ?>
          </div>
          <?php
      } else {
          $res = pg_query($conn, "Select ninja_name, ninja_avatar, ninja_point, ninja_intro, 
                                        ninja_ninmu_success, ninja_ninmu_fail, 
                                        ninja_cost, jutsu_logo, sato_name, ninja_background from ninja
                                        natural join ninja_jutsu
					natural join jutsu
                                        natural join sato_ninja
                                        natural join sato
                                        where ninja_id='$ninja_id'");
          $row = pg_fetch_row($res);
          $name = $row[0];
          $avatar = $row[1];
          $point = $row[2];
          $info = $row[3];
          $ninmu_success = $row[4];
          $ninmu_fail = $row[5];
          $cost = $row[6];
          $sato = $row[8];
          $jutsu[0]=$row[7];
          $bg = $row[9];
          $i = 1;
          $sum = $ninmu_fail + $ninmu_success;
          $avg = $ninmu_success * 100 / $sum;
          $avgx = number_format($avg, 2);

          while ($row = @pg_fetch_row($res)) {
              $jutsu[$i++] = $row[7];
          }
          ?>
          <div id="bang-ninja">
             <div id="bang-ninja-background">
                 <img class='bg'src=<?php echo $bg; ?> height="350" width="800"/>
             </div>
             <div id="bang-ninja-avatar">
                <img class='av' src=<?php echo $avatar; ?> height="200" width="200" class="img-radius"/>
                <span style="font-weight: bold;font-size:20px;"><?php echo $name; ?></span><br/>
                <span style="font-weight: bold;font-size:20px;"><?php echo $sato; ?></span><br/>
             </div>
             <div id="bang-ninja-thong-tin">
                <span style="font-weight: bold;font-size:30px;"><?php echo $point; ?></span> điểm&nbsp;&nbsp;&nbsp;&nbsp;
                <span style="font-weight: bold;font-size:30px;"><?php echo " $cost$"; ?><br/></span>
                <span style="font-weight: bold;font-size:30px;">
                   <?php echo $sum; ?></span> nhiệm vụ &nbsp;&nbsp;&nbsp;&nbsp;
                <span style="font-weight: bold;font-size:30px;">    
                   <?php echo " $avgx "; ?></span>thành công
                <br/>
                <?php
                for ($j = 0; $j < $i; $j++) {
                    echo "<img src=$jutsu[$j] height='50' width='50' class='img-circle'/>&nbsp;&nbsp;";
                }
                ?>
                <br/>
                <span style="font-weight: bold;font-size:25px;">Thông tin</span><br/>
                <p><?php echo $info; ?></p>
             </div>
          </div>
          <?php
      }
      ?>

      <script src="js/jquery-2.1.4.min.js"></script>
      <script src="js/main.js"></script>
      <script src="js/classie.js"></script>


   </body>

</html>