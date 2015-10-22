<!doctype html>
<?php
$conn = @pg_connect("host=localhost port=5432 dbname=akatsuki user='postgres' password='f'");
?>
<html lang="en" class="no-js">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" type='text/css' href="css/reset.css"> 
      <link rel="stylesheet" type='text/css' href="css/style.css"> 
      <script src="js/modernizr.js"></script> 

      <title>Akatsuki</title>
   </head>
   <body>
      <header role="banner">
         <div id="cd-logo"><a href="#"><img src="img/logo_akatsuki.png" alt="Logo"></a></div>

         <nav class="main-nav">
            <ul>
               <li><a class="cd-contact" href="#0">Liên hệ</a></li>
               <li><a class="cd-signup" href="#0">Đăng nhập</a></li>
            </ul>
         </nav>
      </header>
      <?php
      $a = @isset($_POST['id']);
      $b = @isset($_POST['pass']);
      $c = @isset($_POST['email']);
      $d = @isset($_POST['contact']);
      $id = @$_POST['id'];
      $pass = @$_POST['pass'];
      $email = @$_POST['email'];
      $contact = @$_POST['contact'];
      if ($a) {
          if ($b) {
              if ($c) {
                  //them tai khoan
                  $res = pg_query($conn, "insert into customer(customer_username, customer_pass, customer_name, customer_avatar, customer_money, customer_email) 
                                            values ('$id','$pass','Khách','avatar_customer/avatar_default.png', '0', '$email')");
              } else {
                  //dang nhap
                  $res = pg_query($conn, "Select * from customer where customer_username = '$id' and customer_pass = '$pass'");
                  header("Location: user_program.php?id=$id&pass=$pass");
              }
          } else {
              //bao cao
              $res = pg_query($conn, "insert into report(report_name, report_contain) 
                                            values ('$id','$contact');");
          }
      } else {
          //lay lai mat khau
          $res = pg_query($conn, "Select customer_pass, customer_username, customer_name from customer where customer_email = '$email'");
          $row = @pg_fetch_row($res);
          $msg = "Xin chào $row[2]!\nMật khẩu tài khoản $row[1] của bạn là $row[0]";
          mail('$email', "Khôi phục mật khẩu Akatsuki", $msg);
      }
      ?>
      <div class="cd-user-modal"> 
         <div class="cd-user-modal-container"> 
            <ul class="cd-switcher">
               <li><a href="#0">Đăng nhập</a></li>
               <li><a href="#0">Đăng kí</a></li>
               <li><a href="#0">Liên hệ</a></li>
            </ul>

            <div id="cd-login"> 
               <form class="cd-form" action="#"  method="post">
                  <p class="fieldset">
                     <label class="image-replace cd-username" for="signin-username">Username</label>
                     <input class="full-width has-padding has-border" id="signin-username" name = "id" type="text" placeholder="Tài khoản"/>
                     <span class="cd-error-message">Tài khoản không tồn tại</span>
                  </p>

                  <p class="fieldset">
                     <label class="image-replace cd-password" for="signin-password">Password</label>
                     <input class="full-width has-padding has-border" id="signin-password" name = "pass" type="password"  placeholder="Mật khẩu"/>
                     <span class="cd-error-message">Mật khẩu sai!</span>
                  </p>

                  <p class="fieldset">
                     <input class="full-width" type="submit" value="Đăng nhập"/>
                  </p>
               </form>

               <p class="cd-form-bottom-message"><a href="#0">Quên mật khẩu?</a></p>
               <!-- <a href="#0" class="cd-close-form">Close</a> -->
            </div> <!-- cd-login -->

            <div id="cd-signup"> <!-- sign up form -->
               <form class="cd-form" action="#"  method="post">
                  <p class="fieldset">
                     <label class="image-replace cd-username" for="signup-username">Username</label>
                     <input class="full-width has-padding has-border" id="signup-username" type="text" name ="id" placeholder="Tài khoản">
                     <span class="cd-error-message">Tài khoản đã tồn tại</span>
                  </p>

                  <p class="fieldset">
                     <label class="image-replace cd-password" for="signup-password">Password</label>
                     <input class="full-width has-padding has-border" id="signup-password" type="password" name="pass" placeholder="Mật khẩu">
                     <span class="cd-error-message">Error message here!</span>
                  </p>

                  <p class="fieldset">
                     <label class="image-replace cd-email" for="signup-email">Email</label>
                     <input class="full-width has-padding has-border" id="signup-email" type="email" name = "email" placeholder="Email để khôi phục mật khẩu">
                     <span class="cd-error-message">Email không đúng!</span>
                  </p>

                  <p class="fieldset">
                     <input class="full-width has-padding" type="submit" value="Tạo tài khoản"/>
                  </p>
               </form>

               <!-- <a href="#0" class="cd-close-form">Close</a> -->
            </div> <!-- cd-signup -->
            <div id="cd-contact">
               <form class="cd-form" action="#"  method="post">
                  <p class="fieldset contact-field">
                     <label class="image-replace cd-username" for="contact-name">Username</label>
                     <input class="full-width has-padding has-border" id="contact-name" type="text" name="id" placeholder="Tên của bạn">
                     <span class="cd-error-message">Hãy nhập tên của bạn</span>
                  </p>

                  <p class="fieldset">
                     <label class="image-replace cd-email" for="contact-contain">Password</label>
                     <input class="full-width double-height has-padding has-border" id="contact-contain" type="text" name ="contact" placeholder="Liên hệ hoặc Báo cáo...">
                     <span class="cd-error-message">Hãy nhập nội dung!</span>
                  </p>

                  <p class="fieldset">
                     <input class="full-width" type="submit" value="Gửi"/>
                  </p>
               </form>
            </div>

            <div id="cd-reset-password"> 
               <p class="cd-form-message">Quên mật khẩu? Hãy nhập email để khôi phục mật khẩu.</p>

               <form class="cd-form" action="#"  method="post">
                  <p class="fieldset">
                     <label class="image-replace cd-email" for="reset-email">E-mail</label>
                     <input class="full-width has-padding has-border" id="reset-email" name = "email" type="email" placeholder="E-mail">
                     <span class="cd-error-message">Error message here!</span>
                  </p>

                  <p class="fieldset">
                     <input class="full-width has-padding" type="submit" value="Khôi phục mật khẩu"/>
                  </p>
               </form>

               <p class="cd-form-bottom-message"><a href="#0">Quay lại Đăng nhập</a></p>
            </div> 
            <a href="#0" class="cd-close-form">Close</a>

         </div> 
      </div> 

      <script src="js/jquery-2.1.4.min.js"></script>
      <script src="js/main.js"></script> 
   </body>
</html>