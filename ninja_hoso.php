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
                  <li id="them-nhiem-vu"><a href="nhiemvu_them.php" >Thêm nhiệm vụ</a></li>
                  <li id='lich-su-nhiem-vu'><a href="nhiemvu_lichsu.php">Lịch sử nhiệm vụ</a></li>
               </ul>
            </li>
            <li class ="active">
               <h2><span class="icon-tasks"></span>Ninja</h2>
               <ul>
                  <li id="xep-hang"><a href="ninja_xephang.php?id=test1&pass=1" >Bảng xếp hạng</a></li>
                  <li id="ho-so" class="active"><a href="ninja_hoso.php" >Hồ sơ Ninja</a></li>
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
              $a = @$_POST['search'];
              echo "$a</div>";
          } 
         ?>
      </div>

      <script src="js/jquery-2.1.4.min.js"></script>
      <script src="js/main.js"></script>
      <script src="js/classie.js"></script>


   </body>

</html>