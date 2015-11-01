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
                  <li id="them-nhiem-vu"><a href="nhiemvu_them.php?id=<?php echo $id?>&pass=<?php echo $pass?>" >Thêm nhiệm vụ</a></li>
                  <li id='lich-su-nhiem-vu'><a href="nhiemvu_lichsu.php?id=<?php echo $id?>&pass=<?php echo $pass?>">Lịch sử nhiệm vụ</a></li>
               </ul>
            </li>
            <li class ="active">
               <h2><span class="icon-tasks"></span>Ninja</h2>
               <ul>
                  <li id="xep-hang"><a href="ninja_xephang.php?id=<?php echo $id?>&pass=<?php echo $pass?>" >Bảng xếp hạng</a></li>
                  <li id="ho-so"><a href="ninja_hoso.php?id=<?php echo $id?>&pass=<?php echo $pass?>" >Hồ sơ Ninja</a></li>
                  <li id='trang-thai'><a href="ninja_trangthai.php?id=<?php echo $id?>&pass=<?php echo $pass?>">Trạng thái</a></li>
                  <li id='yeu-thich'><a href="ninja_yeuthich.php?id=<?php echo $id?>&pass=<?php echo $pass?>">Yêu thích</a></li>
               </ul>
            </li>
            <li>
               <h2><span class="icon-calendar"></span>Tài khoản</h2>
               <ul>
                  <li id='thong-tin'><a href="taikhoan_thongtin.php?id=<?php echo $id?>&pass=<?php echo $pass?>">Thông tin</a></li>
                  <li id='ngan-quy'><a href="taikhoan_nganquy.php?id=<?php echo $id?>&pass=<?php echo $pass?>">Ngân Quỹ</a></li>
                  <li id='dang-xuat'><a href='user_program.php'>Đăng xuất</a></li>
               </ul>
            </li>
            <li>
               <h2><span class="icon-heart"></span>Hướng dẫn</h2>
               <ul>
                  <li id='hd-nhiemvu'><a href="huongdan_nhiemvu.php?id=<?php echo $id?>&pass=<?php echo $pass?>">Nhiệm Vụ</a></li>
                  <li id='hd-ninja'><a href="huongdan_ninja.php?id=<?php echo $id?>&pass=<?php echo $pass?>">Ninja</a></li>
                  <li id='hd-taikhoan'><a href="huongdan_taikhoan?id=<?php echo $id?>&pass=<?php echo $pass?>">Tài khoản</a></li>
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
         $res = pg_query($conn, "Select ninja_name, ninja_avatar, ninja_point, ninja_ninmu_success, ninja_ninmu_fail, ninja_cost, jutsu_logo, sato_name from ninja
                                        join ninja_jutsu on ninja_jutsu.ninja_id = ninja.ninja_id
					join jutsu on jutsu.jutsu_id = ninja_jutsu.jutsu_id
                                        join sato_ninja on sato_ninja.ninja_id = ninja.ninja_id
                                        join sato on sato_ninja.sato_id = sato.sato_id");

         $i = -1;
         $ninja_name[-1] = 'xxx';
         while ($row = pg_fetch_row($res)) {
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

         function swap(&$a, &$b) {
             $temp = $a;
             $a = $b;
             $b = $temp;
         }

         for ($j = 0; $j < $i; $j++)
             for ($k = $j + 1; $k < $i + 1; $k++) {
                 if (intval($ninja_point[$j]) < intval($ninja_point[$k])) {
                     swap($ninja_point[$j], $ninja_point[$k]);
                     swap($ninja_name[$j], $ninja_name[$k]);
                     swap($ninja_avatar[$j], $ninja_avatar[$k]);
                     swap($ninja_ninmu_success[$j], $ninja_ninmu_success[$k]);
                     swap($ninja_ninmu_fail[$j], $ninja_ninmu_fail[$k]);
                     swap($ninja_cost[$j], $ninja_cost[$k]);
                     swap($jutsu_logo[$j], $jutsu_logo[$k]);
                     swap($ninja_sato[$j], $ninja_sato[$k]);
                 }
             }

         for ($j = 0; $j < $i + 1; $j++) {
             $count = $j + 1;
             echo "<div class ='ninja-row'>
                        <div class ='ninja-name-row'>
			<div class = 'col-take-1'>$count</div>
			<div class = 'col-take-1'><img src = $ninja_avatar[$j] height='40' width='40' class='img-circle'/></div> 
			<div class = 'col-take-3'>$ninja_name[$j]</div> 
			<div class = 'col-take-1'>$ninja_point[$j]</div>
                        </div>";
             ?>
             <div class="ninja-description">
                <table class ="description-table">
                   <tr>
                      <td class="col-vi-tri">Vị trí</td>
                      <td class="col-ki-nang">Kĩ năng</td>
                      <td class="col-so-nv">Số NV đã làm</td>
                      <td class="col-xs">XS thành công</td>
                      <td class="col-gt">Giá trị</td>
                   </tr>
                   <tr>
                      <td class="col-vi-tri"><?php echo "$ninja_sato[$j]" ?> </td>
                      <td class="col-ki-nang">
                          <?php
                          $n = 0;
                          while (@$jutsu_logo[$j][$n]) {
                              $img = @$jutsu_logo[$j][$n];
                              echo "<img src = $img height='40' width='40' class='img-circle'/>&nbsp;";
                              $n++;
                          }
                          ?>
                      </td>
                      <td class="col-so-nv">
                          <?php
                          $sum[$j] = $ninja_ninmu_fail[$j] + $ninja_ninmu_success[$j];
                          echo "$sum[$j]";
                          ?>
                      </td>
                      <td class="col-xs">
                          <?php
                          $avg[$j] = $ninja_ninmu_success[$j] * 100 / $sum[$j];
                          $avgx[$j] = number_format($avg[$j], 2);
                          echo "$avgx[$j] %";
                          ?>
                      </td>
                      <td class="col-gt">Giá trị</td></tr>

                   </tr>
                </table>
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
