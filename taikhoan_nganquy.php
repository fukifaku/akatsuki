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
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
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
            <li>
               <h2><span class="icon-tasks"></span>Ninja</h2>
               <ul>
                  <li id="xep-hang"><a href="ninja_xephang.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>" >Bảng xếp hạng</a></li>
                  <li id="ho-so"><a href="ninja_hoso.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>" >Hồ sơ Ninja</a></li>
                  <li id='trang-thai'><a href="ninja_trangthai.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Trạng thái</a></li>
                  <li id='yeu-thich'><a href="ninja_yeuthich.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Yêu thích</a></li>
               </ul>
            </li>
            <li class ="active">
               <h2><span class="icon-calendar"></span>Tài khoản</h2>
               <ul>
                  <li id='thong-tin'><a href="taikhoan_thongtin.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Thông tin</a></li>
                  <li id='ngan-quy'  class ="active"><a href="taikhoan_nganquy.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Ngân Quỹ</a></li>
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
      <div id = "bang-ngan-quy">

         <?php
         $res = @pg_query($conn, "select customer_money from customer where customer_id = "
                         . "(select customer_id from customer where customer_username = '$id')");

         $row = @pg_fetch_row($res);
         ?>
         <div id="ngan-quy-x">
            <div id="ngan-quy-xy1">
                <?php
                echo "Ngân Quỹ:&nbsp;&nbsp;&nbsp;<span style ='font-family:calibri;font-size:30pt;font-weight:bold'>$row[0]$</span>";
                ?>
            </div>
            <div id="ngan-quy-xy2">
               <a class ="btn btn-big" href ="#modal-one"><img src = "img/deposit.png" height="50px" width="50px"></a>
            </div>  
         </div>
         <div id ="ngan-quy-head-row">
            <div class = "col-take-3">Thời gian</div>
            <div class = "col-take-1">Giao Dịch</div>
         </div>

         <?php
         $res = @pg_query($conn, "select money_time, money_amount from customer_money where customer_id = "
                         . "(select customer_id from customer where customer_username = '$id')");
         while (@$row = @pg_fetch_row($res)) {
             echo "<div id ='ngan-quy-content-row'><div class = 'col-take-3'>$row[0]</div><div class = 'col-take-1'>$row[1]$</div></div>";
         }
         ?>
         <a href="#" class="modal" id="modal-one" aria-hidden="true"></a>
         <div class="modal-dialog">
            <form class ="nap-the" method="post">
               <span class="input input--kohana">
                  <input class="input__field input__field--kohana" type="text" id="input-29" name="the"/>
                  <label class="input__label input__label--kohana" for="input-29">
                     <i class="fa fa-fw fa-pencil icon icon--kohana"></i>
                     <span class="input__label-content input__label-content--kohana">Thẻ</span>
                  </label>
               </span>
               <div class="submit-nap-the">
                  <input id = "submit-nap-the-x" type="submit" value="Nạp" name="submit-button"/>
               </div>
            </form>
            <?php
            if (@isset($_POST['submit-button'])) {
                $the = $_POST['the'];
                $res = @pg_query($conn, "select card_value from card where card_id ='$the'");
                $row = @pg_fetch_row($res);
                if (!$row[0]) {
                    echo "wrong card";
                } else {
                    $res = @pg_query($conn, "select customer_id from customer where customer_username = '$id'");
                    $row2 = @pg_fetch_row($res);
                    $today = date('Y-m-d H:i:s');
                    $res = pg_query($conn, "insert into customer_money values('$row2[0]','$today', '$row[0]')");
                    $res = pg_query($conn, "delete from card where card_id = '$the' ");
                    //  header("Location: taikhoan_nganquy.php?id=$id&pass=$pass");
                }
            }
            ?>

         </div>
      </div>


      <script src="js/jquery-2.1.4.min.js"></script>
      <script src="js/main.js"></script>
      <script src="js/classie.js"></script>
      <script src="js/jquery.datetimepicker.full.js"></script>
   </body>

</html>


