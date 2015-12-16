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
      <!--<link rel="stylesheet" type="text/css" href="css/demo.css" />-->
      <link rel="stylesheet" type="text/css" href="css/set2.css" />
      <link rel="stylesheet" type="text/css" href="css/set1.css" />
      <link rel="stylesheet" type="text/css" href="css/akatsuki.css">
      <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>
      <script src="js/modernizr.js"></script> 


   </head>
   <body>
       <?php
       $res = @pg_query($conn, "Select customer_name, customer_avatar from customer where customer_username = '$id'");
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
                  <li id="xep-hang"  class ="active"><a href="ninja_xephang.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>" >Bảng xếp hạng</a></li>
                  <!--<li id="xep-hang"  class ="active"><a href="#">Bảng xếp hạng</a></li>-->
                  <li id="ho-so"><a href="ninja_hoso.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>" >Hồ sơ Ninja</a></li>
                  <li id='trang-thai'><a href="ninja_trangthai.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Trạng thái</a></li>
                  <li id='yeu-thich'><a href="ninja_yeuthich.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Yêu thích</a></li>
               </ul>
            </li>
            <li>
               <h2><span class="icon-calendar"></span>Tài khoản</h2>
               <ul>
                  <li id='thong-tin'><a href="taikhoan_thongtin.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Thông tin</a></li>
                  <!--<li id='thong-tin'><a href ="#">Thông tin</a></li>-->
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
      <div id ="bang-xep-hang">
         <div id="head-row">
            <div class="col-take-1">rank</div>
            <div class="col-take-1">avatar</div>
            <div class="col-take-3">name</div>
            <div class="col-take-1">point</div>
         </div>

         <?php
         $res = @pg_query($conn, "Select ninja_name, ninja_avatar, ninja_point, ninja_ninmu_success, ninja_ninmu_fail, ninja_cost, jutsu_logo, sato_logo from ninja
                                        natural join ninja_jutsu
					natural join jutsu
                                        natural join sato_ninja
                                        natural join sato
                                        order by ninja_point desc, ninja_name asc");

         $i = -1;
         $ninja_name[-1] = 'xxx';
         while ($row = @pg_fetch_row($res)) {
             if ($row[0] != $ninja_name[$i]) {
                 $i++;
                 $j = 0;
             }
             $ninja_name[$i] = $row[0];
             $ninja_avatar[$i] = $row[1];
             $ninja_point[$i] = $row[2];
             $ninja_ninmu_success[$i] = $row[3];
             $ninja_ninmu_fail[$i] = $row[4];
             $ninja_cost[$i] = $row[5];
             $jutsu_logo[$i][$j++] = $row[6];
             $ninja_sato[$i] = $row[7];
         }
         for ($j = 0; $j < $i + 1; $j++) {
             $count = $j + 1;
             echo "<div class ='ninja-row'>
                        <div class ='ninja-name-row'>
			<div class = 'col-take-1'>$count</div>
			<div class = 'col-take-1'><img src = $ninja_avatar[$j] height='40' width='40' class='img-circle-border'/></div> 
			<div class = 'col-take-3'>$ninja_name[$j]</div> 
			<div class = 'col-take-1'>$ninja_point[$j]</div>
                        </div>";
             ?>
             <div class="ninja-description">

                <div class="col-vi-tri" style="text-align: center;">
                   <img src=<?php echo "$ninja_sato[$j]" ?> height="45" width="45" class ="img-radius"/> 
                </div>
                <div class="col-ki-nang" style="text-align: center;">
                    <?php
                    $n = 0;
                    while (@$jutsu_logo[$j][$n]) {
                        $img = @$jutsu_logo[$j][$n];
                        echo "<img src = $img height='45' width='45' class='img-circle'/>&nbsp;";
                        $n++;
                    }
                    ?>
                </div>
                <div class="col-xs">
                    <?php
                    $sum[$j] = $ninja_ninmu_fail[$j] + $ninja_ninmu_success[$j];
                    $avg[$j] = $ninja_ninmu_success[$j] * 100 / $sum[$j];
                    $avgx[$j] = number_format($avg[$j], 0);
                    ?>
                   <div class="col-xs-x">
                      <span style="font-weight: bold;font-size:25px;">
                         <?php echo $sum[$j]; ?></span> nhiệm vụ &nbsp;
                      <span style="font-weight: bold;font-size:25px;">    
                         <?php echo " $avgx[$j]"; ?></span>% thành công
                   </div>
                </div>
                <div class="col-gt">
                   <div class="col-gt-x">
                      <span style="font-weight: bold;font-size:25px;"><?php echo " $ninja_cost[$j]$"; ?></span>
                   </div>
                </div>
             </div>
          </div>
          <?php
      }
      ?>
   </div>

   <script src="js/jquery-2.1.4.min.js"></script>
   <script src="js/main.js"></script>
   <script src="js/classie.js"></script>
   <script src="js/jquery.datetimepicker.full.js"></script>
</body>

</html>
