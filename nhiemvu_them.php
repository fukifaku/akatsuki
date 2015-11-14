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

      <div id ="bang-them-nhiem-vu">
          <?php
          if (@isset($_POST['submit-button'])) {
              $ninmu_ten = $_POST['ten'];
              $ninmu_mota = $_POST['mota'];
              $ninmu_lang = $_POST['radio'];
              $ninmu_skill = $_POST['skill'];
              $ninmu_starttime = $_POST['ninmu-time-start'];
              $ninmu_endtime = $_POST['ninmu-time-end'];
              echo "ten nhiem vu: $ninmu_ten</br>mo ta nhiem vu: $ninmu_mota</br>lang: $ninmu_lang</br>skill: $ninmu_skill[0], $ninmu_skill[1]</br>thoi gian ket thuc:$ninmu_endtime</br>thoi gian bat dau: $ninmu_starttime";
              $end = date_create($ninmu_endtime);
              $start = date_create($ninmu_starttime);
              $time2 = date_diff($start,$end);
              $s=$time2->format("day %d, hour %h, minutes %i");
              $end2 = $start;
              date_add($end2, $time2);
              $end3 = date_format($end2, "Y-m-d H:i:m");
              echo "</br>thesecond: $s, ketthuc: $end3;</div>";
          } else {
              ?>
             <form class="form-them-nhiem-vu" method="post">
                <div id="form-nhiem-vu-title">
                   <h2>them nv</h2>
                </div>
                <div id="form-nhiem-vu-ten" title="Tên Nhiệm Vụ">
                   <span class="input input--isao">
                      <input class="input__field input__field--isao" type="text" id="nhiem-vu-ten" name="ten" />
                      <label class="input__label input__label--isao" for="nhiem-vu-ten" data-content="Tên Nhiệm Vụ">
                         <span class="input__label-content input__label-content--isao">Tên Nhiệm Vụ</span>
                      </label>
                   </span>
                </div>
                <div id="form-nhiem-vu-mo-ta">
                   <label class="title">Mô tả nhiệm vụ</label>
                   <textarea style="overflow: hidden" data-autoresize rows="2" name="mota"  id="nhiem-vu-mo-ta">s</textarea>
                </div>
                <div id="form-nhiem-vu-skill"><label class="title">chon skill</label>
                    <?php
                    $res = pg_query($conn, "Select jutsu_logo, jutsu_id from jutsu");
                    while ($row = @pg_fetch_row($res)) {
                        echo "<label><input class = 'skill-chon' type='checkbox' name='skill[]' value='$row[1]' /><img src='$row[0]' height='40' width='40' class='img-circle'></label>";
                    }
                    ?>
                </div>
                <div id="form-nhiem-vu-time">
                   <label class="title">thoi gian bat dau</label>
                   <input type="text" id="datetimepicker_dark" name="ninmu-time-start"/>
                </div>
                <div id="form-nhiem-vu-time">
                   <label class="title">thoi gian ket thuc</label>
                   <input type="text" id="datetimepicker_dark" name="ninmu-time-end"/>
                </div>
                <div id="form-nhiem-vu-lang"> <label class="title"><?php
                
//                date_default_timezone_set('Asia/Saigon');
//                $d1 = strtotime("26-10-2015 16:28");
//                $today = date('Y-m-d H:i:s');
//                $today_x = strtotime($today);
//                $diff = abs($today_x - $d1);
//                $diff1 = floor($diff/(60*60*24));
//                $diff2 = ($diff/(60*60))%24;
//                $diff3 = ($diff/60)%(24*60);
//                echo $diff3;
//                //echo $diff2;
//                //$d = $d1 + $d2;
//               // echo $today;
//                $d = $today - $d1;
//                //$d -= strtotime("01-01-1970 08:00:00");
//                //echo date("Y-m-d H:i:s",$d);
//                //  echo date("jS F, Y H:i", strtotime("11.12.10:15:08")); 
//               // $start_date = date('Y-m-d H:i:s');
//                // echo $start_date;
////                $dateStr = '2008-09-11 00:00:00';
////                $timezone = 'Asia/Saigon';
////                $dtUtcDate = strtotime($dateStr);
////                echo $dtUtcDate;
                
                ?></label>
                   <label><input class = "lang-chon" type="radio" name="radio" value="la" /><img src="fb1.jpg" height="40" width="40" class="img-circle"></label>
                   <label><input class = "lang-chon" type="radio" name="radio" value="da" /><img src="fb1.jpg" height="40" width="40" class="img-circle"></label>
                   <label><input class = "lang-chon" type="radio" name="radio" value="suong" /><img src="fb1.jpg" height="40" width="40" class="img-circle"></label>
                   <label><input class = "lang-chon" type="radio" name="radio" value="may" /><img src="fb1.jpg" height="40" width="40" class="img-circle"></label>
                   <label><input class = "lang-chon" type="radio" name="radio" value="cat" /><img src="fb1.jpg" height="40" width="40" class="img-circle"></label>
                </div>
                <div class="submit"><input type="submit" value="submit" name="submit-button"/></div>
             </form>
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