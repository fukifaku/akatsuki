<!DOCTYPE html>
<?php
$conn = @pg_connect("host=localhost port=5432 dbname=akatsuki user='postgres' password='f'");
$pass = @$_GET['pass'];
$id = @$_GET['id'];
?>
<html>
   <head>
      <title>Akatsuki</title>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="css/akatsuki.css">
      <link rel="stylesheet" type='text/css' href="css/reset.css">
      <link rel="stylesheet" type='text/css' href="css/style.css"> 
      <script src="js/modernizr.js"></script> <!-- Modernizr -->
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
                  <li id="them-nhiem-vu"><a href="#" >Thêm nhiệm vụ</a></li>
                  <li><a href="#">Lịch sử nhiệm vụ</a></li>

               </ul>
            </li>
            <li class ="active">
               <h2><span class="icon-tasks"></span>Ninja</h2>
               <ul>
                  <li id="xep-hang"><a href="#" >Bảng xếp hạng</a></li>
                  <li id="ho-so"><a href="#" >Hồ sơ Ninja</a></li>
                  <li><a href="#">Trạng thái</a></li>
                  <li><a href="#">Yêu thích</a></li>
               </ul>
            </li>
            <li>
               <h2><span class="icon-calendar"></span>xxx</h2>
               <ul>
                  <li><a href="#">Current Month</a></li>
                  <li><a href="#">Current Week</a></li>

               </ul>
            </li>
            <li>
               <h2><span class="icon-heart"></span>xxx</h2>
               <ul>
                  <li><a href="#">Global favs</a></li>
                  <li><a href="#">My favs</a></li>
               </ul>
            </li>
         </ul>
      </div>
      
      <script src="js/jquery-2.1.4.min.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>



                <table class ="description-table">
                   <tr>
                      <td>Vị trí</td>
                      <td>Kĩ năng</td>
                      <td>Số nhiệm vụ đã làm</td>
                      <td>Xác suất thành công</td>
                      <td>Giá trị</td>
                   </tr>
                   <tr>
                      <td><?php echo $ninja_sato[$j]; ?></td>
                      <td>
                          <?php
                          $n = 0;
                          while (@$jutsu_logo[$j][$n]) {
                              $img = @$jutsu_logo[$j][$n];
                              echo "<img src = $img height='40' width='40' class='img-circle'/>";
                              $n++;
                          }
                          ?> 
                      </td>
                      <td><?php $sum = $ninja_ninmu_fail[$j] + $ninja_ninmu_success[$j];
                      echo $sum;
                          ?></td>
                      <td><?php $avg = $ninja_ninmu_success / $sum;
                    echo $avg;
                     ?></td>
                      <td>Giá trị</td>
                   </tr>
                </table>




<table class ="description-table">
                   <tr>
                      <td>Vị trí</td>
                      <td>Kĩ năng</td>
                      <td>Số nhiệm vụ đã làm</td>
                      <td>Xác suất thành công</td>
                      <td>Giá trị</td>
                   </tr>
                   <?php
                   echo "<tr><td> $ninja_sato[$j] </td>";
                   $n = 0;
                   while (@$jutsu_logo[$j][$n]) {
                       $img = @$jutsu_logo[$j][$n];
                       echo "<td><img src = $img height='40' width='40' class='img-circle'/></td>";
                       $n++;
                   }
                   $sum = $ninja_ninmu_fail[$j] + $ninja_ninmu_success[$j];
                   echo "<td> $sum </td>";
                   $avg = $ninja_ninmu_success / $sum;
                   echo "<td>$avg</td>";
                   ?>
                   <td>Giá trị</td>
                   </tr>
                </table>