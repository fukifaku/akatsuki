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
      <link rel="stylesheet" type="text/css" href="akatsuki.css">
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
                  <li id="them-nhiem-vu"><a href="nhiemvu_them.php" >Thêm nhiệm vụ</a></li>
                  <li id='lich-su-nhiem-vu'><a href="nhiemvu_lichsu.php">Lịch sử nhiệm vụ</a></li>
               </ul>
            </li>
            <li class ="active">
               <h2><span class="icon-tasks"></span>Ninja</h2>
               <ul>
                  <li id="xep-hang"><a href="ninja_xephang.php?id=test1&pass=1" >Bảng xếp hạng</a></li>
                  <li id="ho-so"><a href="ninja_hoso.php" >Hồ sơ Ninja</a></li>
                  <li id='trang-thai'><a href="ninja_trangthai.php">Trạng thái</a></li>
                  <li id='yeu-thich'><a href="ninja_yeuthich.php">Yêu thích</a></li>
               </ul>
            </li>
            <li>
               <h2><span class="icon-calendar"></span>Tài khoản</h2>
               <ul>
                  <li id='thong-tin'><a href="#">Thông tin</a></li>
                  <li id='ngan-quy'><a href="#">Ngân Quỹ</a></li>
                  <li id='dang-xuat'><a href='#'>Đăng xuất</a></li>
               </ul>
            </li>
            <li>
               <h2><span class="icon-heart"></span>Hướng dẫn</h2>
               <ul>
                  <li id='hd-nhiemvu'><a href="#">Nhiệm Vụ</a></li>
                  <li id='hd-ninja'><a href="#">Ninja</a></li>
                  <li id='hd-taikhoan'><a href="#">Tài khoản</a></li>
               </ul>
            </li>
         </ul>
      </div>

      <div id ="bang-them-nhiem-vu">
          <?php
          if (@$_POST['submit-button']) {
              $a = @$_POST['ten'];
              $b = @$_POST['mota'];
              $c = @$_POST['radio'];
              $d = @$_POST['skill'];
              $e = @$_POST['ninmu-time'];
              echo "$a</div>";
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
                   <textarea style="overflow: hidden" data-autoresize rows="2" name="mota" form="form-them-nhiem-vu" id="nhiem-vu-mo-ta">s</textarea>
                </div>
                <div id="form-nhiem-vu-skill"><label class="title">chon skill</label>
                    <?php
                    $res = pg_query($conn, "Select jutsu_logo, jutsu_id from jutsu");
                    while ($row = @pg_fetch_row($res)) {
                        echo "<label><input class = 'skill-chon' type='checkbox' name='skill' value='$row[1]' /><img src='$row[0]' height='40' width='40' class='img-circle'></label>";
                    }
                    ?>
                </div>
                <div id="form-nhiem-vu-time">
                   <label class="title"></label>
                   <input type="text" id="datetimepicker_dark" name="nimmu-time"/>
                </div>
                <div id="form-nhiem-vu-lang"> <label class="title">chon lang</label>
                   <label><input class = "lang-chon" type="radio" name="radio" value="la" /><img src="fb1.jpg" height="40" width="40" class="img-circle"></label>
                   <label><input class = "lang-chon" type="radio" name="radio" value="da" /><img src="fb1.jpg" height="40" width="40" class="img-circle"></label>
                   <label><input class = "lang-chon" type="radio" name="radio" value="suong" /><img src="fb1.jpg" height="40" width="40" class="img-circle"></label>
                   <label><input class = "lang-chon" type="radio" name="radio" value="may" /><img src="fb1.jpg" height="40" width="40" class="img-circle"></label>
                   <label><input class = "lang-chon" type="radio" name="radio" value="cat" /><img src="fb1.jpg" height="40" width="40" class="img-circle"></label>
                </div>
                <div class="submit"><input type="submit" value="submit" name="submit-button"/></div></form>
             <?php
         }
         ?>

      </div>

   <div id="bang-ho-so">
      xxx
   </div>

   <script src="js/jquery-2.1.4.min.js"></script>
   <script src="js/main.js"></script>
   <script src="js/classie.js"></script>
   <script src="js/jquery.datetimepicker.full.js"></script>
</body>

</html>