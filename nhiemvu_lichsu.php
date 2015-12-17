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
            <li class ="active">
               <h2><span class="icon-mission"></span>Nhiệm vụ</h2>
               <ul>
                  <li id="them-nhiem-vu"><a href="nhiemvu_them.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>" >Thêm nhiệm vụ</a></li>
                  <li id='lich-su-nhiem-vu' class ="active"><a href="nhiemvu_lichsu.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Lịch sử nhiệm vụ</a></li>
               </ul>
            </li>
            <li>
               <h2><span class="icon-tasks"></span>Ninja</h2>
               <ul>
                  <li id="xep-hang"><a href="ninja_xephang.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>" >Bảng xếp hạng</a></li>
                  <li id="ho-so"><a href="ninja_hoso.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>" >Hồ sơ Ninja</a></li>
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
      <div id ="bang-lich-su-nhiem-vu">
         <div id="head-row">
            <div class="xcol-take-1-3">Ngày</div>
            <div class="xcol-take-1-3">Làng</div>
            <div class="xcol-take-1-3">Tên NV</div>
            <div class="xcol-take-1-3">Giá</div>
            <div class="xcol-take-1-3">Kết Quả</div>
         </div>
         <div>
             <?php
             $res = pg_query($conn, "select ninmu_id, customer_ninmu_date from customer_ninmu natural join customer where customer_username='$id' "
                     . "order by customer_ninmu_date desc");
             while ($row = @pg_fetch_row($res)) {
                 ?>
                <div class = "team-row">
                   <div class = "team-name-row">
                       <?php
                       $resx = pg_query($conn, "select sato_logo, ninmu_name, ninmu_cost, ninmu_success from ninmu natural join ninmu_sato natural join sato"
                               . " where ninmu_id = $row[0] ");
                       $rowx = pg_fetch_row($resx);
                       $ninmu_date = date_create($row[1]);
                       $ninmu_date = date_format($ninmu_date, "d/m H:i");
                       if ($rowx[3] == 0) {
                           $ns = "Thất bại";
                       } else {
                           $ns = "Thành Công";
                       }
                       echo "<div class='xcol-take-1-3'>$ninmu_date </div>
                            <div class='xcol-take-1-3'><img src = $rowx[0] class = 'img-radius' height='45px' width ='45px'/></div>
                            <div class='xcol-take-1-3'>$rowx[1]</div>
                            <div class='xcol-take-1-3'>$rowx[2]</div>
                            <div class='xcol-take-1-3'>$ns</div>";
                       ?>
                   </div>
                   <div class="team-ninja-row">
                      <?php
                      $resy = pg_query($conn, "select ninja_name, ninja_avatar, ninja_cost from ninja natural join ninmu_ninja"
                              . " where ninmu_id = $row[0] ");
                      while (@$rowy = pg_fetch_row($resy)) {
                          echo "<div class='team-ninja-row-x'>
                                <div class='xcol-take-1-3'><img src = $rowy[1] class ='img-circle-border' height = '40px' width='40px'/></div>
                                <div class='xcol-take-1-3'>$rowy[0]</div>
                                <div class='xcol-take-1-3'>$rowy[2]</div>
                                </div>";
                      }
                      ?>
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


