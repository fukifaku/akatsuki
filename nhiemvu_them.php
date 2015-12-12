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
      <link rel="stylesheet" href="css/bars-movie.css">
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
                  <li id="them-nhiem-vu" class ="active"><a href="nhiemvu_them.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>" >Thêm nhiệm vụ</a></li>
                  <li id='lich-su-nhiem-vu'><a href="nhiemvu_lichsu.php?id=<?php echo $id ?>&pass=<?php echo $pass ?>">Lịch sử nhiệm vụ</a></li>
               </ul>
            </li>
            <li >
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

      <div id ="bang-them-nhiem-vu">
          <?php
//          if (@isset($_POST['submit-button'])) {
//              $ninmu_ten = $_POST['ten'];
//              $ninmu_mota = $_POST['mota'];
//              $ninmu_lang = $_POST['radio'];
//              $ninmu_skill = $_POST['skill'];
//              $ninmu_point = $_POST['difficulty'];
//              $ninmu_starttime = $_POST['ninmu-time-start'];
//              $ninmu_endtime = $_POST['ninmu-time-end'];
//              //echo "ten nhiem vu: $ninmu_ten</br>mo ta nhiem vu: $ninmu_mota</br>lang: $ninmu_lang</br>skill: $ninmu_skill[0], $ninmu_skill[1]</br>thoi gian ket thuc:$ninmu_endtime</br>thoi gian bat dau: $ninmu_starttime";
//              $end = date_create($ninmu_endtime);
//              $start = date_create($ninmu_starttime);
//              $time2 = date_diff($start, $end);
//              $s = $time2->format("day %d, hour %h, minutes %i");
//              $end2 = $start;
//              date_add($end2, $time2);
//              $end3 = date_format($end2, "Y-m-d H:i:m");
//              //echo "</br>thesecond: $s, ketthuc: $end3;</div>";
////              $res = pg_query($conn, "insert into ninmu(ninmu_name, ninmu_teampoint, ninmu_time_start, ninmu_time_end, ninmu_description)"
////                      . "values('$ninmu_ten', $ninmu_point, '$ninmu_starttime', '$ninmu_endtime', '$ninmu_mota')");
////              
//              $count = 0;
//              $count_skill = 0;
//              while (@$ninmu_skill[$count_skill]) {
//                  echo "$ninmu_skill[$count_skill]: ";
//                  $res = pg_query($conn, "Select ninja_id from ninja natural join ninja_jutsu where jutsu_id = $ninmu_skill[$count_skill] order by ninja_cost asc");
//                  $i = 0;
//                  while ($row = @pg_fetch_row($res)) {
//                      echo "$row[0] ";
//                      $result_ninja[$count_skill][$i] = $row[0];
//                      $i++;
//                  }
//                  $count_skill++;
//                  echo "</br>";
//              }
//              $count_ninja = 0;
//              $count_team = 0;
//              $count_skill = 1;
//              $count_ninja0 = $count_ninja1 = $count_ninja2 = $count_ninja3 = $count_ninja4 = $count_ninja5 = $count_ninja6 = 0;
////              while (@$result_ninja[0][$count_ninja]) {
////                  $string = $result_ninja[0][$count_ninja];
////                  echo "$string ";
////                  while(@$result_ninja[$count_skill])
////                      $n = 0;
////                      while ($result_ninja[$i][$n]) {
////                          $result_team[$count_team][0] = $result_ninja[0][$count_ninja];
////                          $result_team[$count_team][$i] = $result_ninja[$i][$n];
////                          $n++;
////                      }
////                  }
////                  $count_ninja++;
////              }
//              while (@$result_ninja[0][$count_ninja0]) {
//                  if (!@$result_team[$count_team - 1][0] && @$result_team[$count_team - 2][0]) {
//                      $count_team--;
//                  }
//                  $result_team[$count_team][0] = $result_ninja[0][$count_ninja0];
//                  $count_ninja1 = 0;
//                  if (!@$result_ninja[1][$count_ninja1]) {
//                      
//                  } else {
//                      while (@$result_ninja[1][$count_ninja1]) {
//                          $string = @$result_ninja[1][$count_ninja1];
//                          //echo "$count_ninja1 this $string team $count_team<br/>";
//                          if (!@$result_team[$count_team - 1][0] && @$result_team[$count_team - 2][0]) {
//                              $count_team--;
//                          }
//                          $string1 = $result_team[$count_team][0] = $result_ninja[0][$count_ninja0];
//                          $string2 = $result_team[$count_team][1] = $result_ninja[1][$count_ninja1];
//                          // echo "fuck $string1 $string2 </br>";
//                          $count_ninja2 = 0;
//                          if (!@$result_ninja[2][$count_ninja2]) {
//                              
//                          } else {
//                              while (@$result_ninja[2][$count_ninja2]) {
//                                  if (!@$result_team[$count_team - 1][0] && @$result_team[$count_team - 2][0]) {
//                                      $count_team--;
//                                  }
//                                  $string1 = $result_team[$count_team][0] = $result_ninja[0][$count_ninja0];
//                                  $string2 = $result_team[$count_team][1] = $result_ninja[1][$count_ninja1];
//                                  $string3 = $result_team[$count_team][2] = $result_ninja[2][$count_ninja2];
//                               //   echo "team $count_team<br/>";
//                                  // echo "$count_team: $string1 $string2 $string3</br>";
//                                  $count_ninja3 = 0;
//                                  if (!@$result_ninja[3][$count_ninja3]) {
//                                      
//                                  } else {
//                                      while (@$result_ninja[3][$count_ninja3]) {
//
//                                          $result_team[$count_team][3] = $result_ninja[3][$count_ninja3];
//                                          $count_ninja4 = 0;
//                                          if (!@$result_ninja[4][$count_ninja4]) {
//                                              
//                                          } else {
//                                              while (@$result_ninja[4][$count_ninja4]) {
//
//                                                  $result_team[$count_team][4] = $result_ninja[4][$count_ninja4];
//                                                  $count_ninja5 = 0;
//                                                  if (!@$result_ninja[5][$count_ninja5]) {
//                                                      
//                                                  } else {
//                                                      while (@$result_ninja[5][$count_ninja5]) {
//
//                                                          $result_team[$count_team][5] = $result_ninja[5][$count_ninja5];
//                                                          $count_ninja6 = 0;
//                                                          if (!@$result_ninja[6][$count_ninja6]) {
//                                                              
//                                                          } else {
//                                                              while (@$result_ninja[6][$count_ninja6]) {
//
//                                                                  $result_team[$count_team][6] = $result_ninja[6][$count_ninja6];
//                                                                  $count_team++;
//                                                                  $count_ninja6++;
//                                                              }
//                                                          } $count_team++;
//                                                          $count_ninja5++;
//                                                      }
//                                                  } $count_team++;
//                                                  $count_ninja4++;
//                                              }
//                                          } $count_team++;
//                                          $count_ninja3++;
//                                      }
//                                  }
//                                  $count_team++;
//                                  $count_ninja2++;
//                              }
//                          }
//                          $count_team++;
//                          $count_ninja1++;
//                      }
//                  }
//                  $count_team++;
//                  $count_ninja0++;
//              }
//              //echo "countteam $count_team<br/>";
//              //  $string = $result_team[6][0];
//              //echo "<br/>xxx: $string";
//              $count_result1 = 0;
////              while (@$result_team[$count_result1][0]) {
////                  $count_result2 = 0;
////                  echo "<br/>$count_result1: ";
////                  while (@$result_team[$count_result1][$count_result2]) {
////                      $string = $result_team[$count_result1][$count_result2];
////                      echo "$string ";
////                      $count_result2++;
////                  }
////                  $count_result1++;
////              }
//              for ($i = 0; $i < $count_team; $i++) {
//                  $count_result2 = 0;
//                  $x = 0;
//                  if (@$result_team[$i][0]) {
//                      while (@$result_team[$i][$count_result2]) {
//                          $result_teamx[$count_result1][$x] = $result_team[$i][$count_result2];
//                          $count_result2++;
//                          $x++;
//                      }
//                      $count_result1++;
//                  }
//              }
//              $count1 = 0;
//              $count2 = 0;
//              while (@$result_teamx[$count1][0]) {
//                  $count2 = 0;
//                  echo "$count1: ";
//                  while (@$result_teamx[$count1][$count2]) {
//                      $string = $result_teamx[$count1][$count2];
//                      echo "$string ";
//                      $count2++;
//                  }
//                  $count1++;
//                  echo "<br/>";
//              }
//          } else {
          ?>
         <form class="form-them-nhiem-vu" method="post">
            <div id="form-nhiem-vu-title" style="text-align: center;">
               <span style ='color:white;font-family:Verdana;font-size:14pt;'>Thêm Nhiệm Vụ<br/><br/></span>
            </div>
            <div id="form-nhiem-vu-ten" title="Tên Nhiệm Vụ">
               <span class="input input--kuro">
                  <input class="input__field input__field--kuro" type="text" id="input-7" name="ten"/>
                  <label class="input__label input__label--kuro" for="input-7">
                     <span class="input__label-content input__label-content--kuro">Nhiệm Vụ</span>
                  </label>
               </span>
            </div>
            <div id="form-nhiem-vu-difficulty">
               <select id="example-movie" name="difficulty">
                  <option value="50">Siêu Dễ</option>
                  <option value="100">Dễ</option>
                  <option value="150" selected="selected">Trung Bình</option>
                  <option value="200">Khó</option>
                  <option value="250">Siêu Khó</option>
               </select>
            </div>            
            <div id="form-nhiem-vu-skill">
                <?php
                $res = @pg_query($conn, "Select jutsu_logo, jutsu_id from jutsu");
                while ($row = @pg_fetch_row($res)) {
                    echo "<label><input class = 'skill-chon' type='checkbox' name='skill[]' value='$row[1]' /><img src='$row[0]' height='55' width='55' class='img-circle'>&nbsp;&nbsp;</label>";
                }
                ?>
            </div>
            <div id="form-nhiem-vu-lang">
               <label><input class = "lang-chon" type="radio" name="radio" value="1" /><img src="logo/logo_la.png" height="55" width="55" class="img-radius"></label>
               <label><input class = "lang-chon" type="radio" name="radio" value="2" /><img src="logo/logo_cat.png" height="55" width="55" class="img-radius"></label>
               <label><input class = "lang-chon" type="radio" name="radio" value="3" /><img src="logo/logo_suong.png" height="55" width="55" class="img-radius"></label>
               <label><input class = "lang-chon" type="radio" name="radio" value="4" /><img src="logo/logo_da.png" height="55" width="55" class="img-radius"></label>
               <label><input class = "lang-chon" type="radio" name="radio" value="5" /><img src="logo/logo_may.png" height="55" width="55" class="img-radius"></label>
            </div>
            <div id="form-nhiem-vu-time" style="text-align: center;">
               <span style ='color:white;font-family:Verdana;font-size:14pt;'>Thời gian<br/><br/></span>
               <input type="text" id="datetimepicker_dark" name="ninmu-time-start"/>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input type="text" id="datetimepicker_dark2" name="ninmu-time-end"/>
            </div>
            <?php
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
                  ?>
            <div id="form-nhiem-vu-mo-ta" style="text-align: center;">
               <span style ='color:white;font-family:Verdana;font-size:14pt;'>Mô tả Nhiệm Vụ<br/><br/></span>
               <textarea style="overflow: hidden" data-autoresize rows="4" cols="40" name="mota" id="nhiem-vu-mo-ta" placeholder="  Mô tả gì đó..."></textarea>
            </div>
            <div id="submit-nhiem-vu" style="text-align: center;">
               <input id ="submit-nhiem-vu-x" type="submit" value="Thêm Nhiệm Vụ" name="submit-button"/>
            </div>
         </form>
         <?php
         //   }
         if (@isset($_POST['submit-button'])) {
             $ninmu_ten = $_POST['ten'];
             $ninmu_mota = $_POST['mota'];
             $ninmu_lang = $_POST['radio'];
             $ninmu_skill = $_POST['skill'];
             $ninmu_point = $_POST['difficulty'];
             $ninmu_starttime = $_POST['ninmu-time-start'];
             $ninmu_endtime = $_POST['ninmu-time-end'];
             //echo "ten nhiem vu: $ninmu_ten</br>mo ta nhiem vu: $ninmu_mota</br>lang: $ninmu_lang</br>skill: $ninmu_skill[0], $ninmu_skill[1]</br>thoi gian ket thuc:$ninmu_endtime</br>thoi gian bat dau: $ninmu_starttime";
             $end = date_create($ninmu_endtime);
             $start = date_create($ninmu_starttime);
             $time2 = date_diff($start, $end);
             $s = $time2->format("day %d, hour %h, minutes %i");
             if($end < $start) {
                 echo "thời gian kết thúc nhỏ hơn thời gian bắt đầu!<br/>";
             } else {
//              $res = pg_query($conn, "insert into ninmu(ninmu_name, ninmu_teampoint, ninmu_time_start, ninmu_time_end, ninmu_description)"
//                      . "values('$ninmu_ten', $ninmu_point, '$ninmu_starttime', '$ninmu_endtime', '$ninmu_mota')");
                 
             }
             //echo "$s, $s2";
             $end2 = $start;
             date_add($end2, $time2);
         //    $end3 = date_format($end2, "Y-m-d H:i:m");
             //echo "</br>thesecond: $s, ketthuc: $end3;</div>";
//              $res = pg_query($conn, "insert into ninmu(ninmu_name, ninmu_teampoint, ninmu_time_start, ninmu_time_end, ninmu_description)"
//                      . "values('$ninmu_ten', $ninmu_point, '$ninmu_starttime', '$ninmu_endtime', '$ninmu_mota')");
//              
             $count = 0;
             $count_skill = 0;
             while (@$ninmu_skill[$count_skill]) {
                 echo "$ninmu_skill[$count_skill]: ";
                 $res = pg_query($conn, "Select ninja_id from ninja natural join ninja_jutsu where jutsu_id = $ninmu_skill[$count_skill] order by ninja_cost asc");
                 $i = 0;
                 while ($row = @pg_fetch_row($res)) {
                     echo "$row[0] ";
                     $result_ninja[$count_skill][$i] = $row[0];
                     $i++;
                 }
                 $count_skill++;
                 echo "</br>";
             }
             $count_ninja = 0;
             $count_team = 0;
             $count_skill = 1;
             $count_ninja0 = $count_ninja1 = $count_ninja2 = $count_ninja3 = $count_ninja4 = $count_ninja5 = $count_ninja6 = 0;
//              while (@$result_ninja[0][$count_ninja]) {
//                  $string = $result_ninja[0][$count_ninja];
//                  echo "$string ";
//                  while(@$result_ninja[$count_skill])
//                      $n = 0;
//                      while ($result_ninja[$i][$n]) {
//                          $result_team[$count_team][0] = $result_ninja[0][$count_ninja];
//                          $result_team[$count_team][$i] = $result_ninja[$i][$n];
//                          $n++;
//                      }
//                  }
//                  $count_ninja++;
//              }
             while (@$result_ninja[0][$count_ninja0]) {
                 if (!@$result_team[$count_team - 1][0] && @$result_team[$count_team - 2][0]) {
                     $count_team--;
                 }
                 $result_team[$count_team][0] = $result_ninja[0][$count_ninja0];
                 $count_ninja1 = 0;
                 if (!@$result_ninja[1][$count_ninja1]) {
                     
                 } else {
                     while (@$result_ninja[1][$count_ninja1]) {
                         $string = @$result_ninja[1][$count_ninja1];
                         if (!@$result_team[$count_team - 1][0] && @$result_team[$count_team - 2][0]) {
                             $count_team--;
                         }
                         $result_team[$count_team][0] = $result_ninja[0][$count_ninja0];
                         $result_team[$count_team][1] = $result_ninja[1][$count_ninja1];
                         $count_ninja2 = 0;
                         if (!@$result_ninja[2][$count_ninja2]) {
                             
                         } else {
                             while (@$result_ninja[2][$count_ninja2]) {
                                 if (!@$result_team[$count_team - 1][0] && @$result_team[$count_team - 2][0]) {
                                     $count_team--;
                                 }
                                 $result_team[$count_team][0] = $result_ninja[0][$count_ninja0];
                                 $result_team[$count_team][1] = $result_ninja[1][$count_ninja1];
                                 $result_team[$count_team][2] = $result_ninja[2][$count_ninja2];
                                 $count_ninja3 = 0;
                                 if (!@$result_ninja[3][$count_ninja3]) {
                                     
                                 } else {
                                     while (@$result_ninja[3][$count_ninja3]) {
                                         if (!@$result_team[$count_team - 1][0] && @$result_team[$count_team - 2][0]) {
                                             $count_team--;
                                         }
                                         $result_team[$count_team][0] = $result_ninja[0][$count_ninja0];
                                         $result_team[$count_team][1] = $result_ninja[1][$count_ninja1];
                                         $result_team[$count_team][2] = $result_ninja[2][$count_ninja2];
                                         $result_team[$count_team][3] = $result_ninja[3][$count_ninja3];
                                         $count_ninja4 = 0;
                                         if (!@$result_ninja[4][$count_ninja4]) {
                                             
                                         } else {
                                             while (@$result_ninja[4][$count_ninja4]) {
                                                 if (!@$result_team[$count_team - 1][0] && @$result_team[$count_team - 2][0]) {
                                                     $count_team--;
                                                 }

                                                 $result_team[$count_team][0] = $result_ninja[0][$count_ninja0];
                                                 $result_team[$count_team][1] = $result_ninja[1][$count_ninja1];
                                                 $result_team[$count_team][2] = $result_ninja[2][$count_ninja2];
                                                 $result_team[$count_team][3] = $result_ninja[3][$count_ninja3];
                                                 $result_team[$count_team][4] = $result_ninja[4][$count_ninja4];
                                                 $count_ninja5 = 0;
                                                 if (!@$result_ninja[5][$count_ninja5]) {
                                                     
                                                 } else {
                                                     while (@$result_ninja[5][$count_ninja5]) {
                                                         if (!@$result_team[$count_team - 1][0] && @$result_team[$count_team - 2][0]) {
                                                             $count_team--;
                                                         }
                                                         $result_team[$count_team][0] = $result_ninja[0][$count_ninja0];
                                                         $result_team[$count_team][1] = $result_ninja[1][$count_ninja1];
                                                         $result_team[$count_team][2] = $result_ninja[2][$count_ninja2];
                                                         $result_team[$count_team][3] = $result_ninja[3][$count_ninja3];
                                                         $result_team[$count_team][4] = $result_ninja[4][$count_ninja4];
                                                         $result_team[$count_team][5] = $result_ninja[5][$count_ninja5];
                                                         $count_ninja6 = 0;
                                                         if (!@$result_ninja[6][$count_ninja6]) {
                                                             
                                                         } else {
                                                             while (@$result_ninja[6][$count_ninja6]) {
                                                                 if (!@$result_team[$count_team - 1][0] && @$result_team[$count_team - 2][0]) {
                                                                     $count_team--;
                                                                 }

                                                                 $result_team[$count_team][0] = $result_ninja[0][$count_ninja0];
                                                                 $result_team[$count_team][1] = $result_ninja[1][$count_ninja1];
                                                                 $result_team[$count_team][2] = $result_ninja[2][$count_ninja2];
                                                                 $result_team[$count_team][3] = $result_ninja[3][$count_ninja3];
                                                                 $result_team[$count_team][4] = $result_ninja[4][$count_ninja4];
                                                                 $result_team[$count_team][5] = $result_ninja[5][$count_ninja5];
                                                                 $result_team[$count_team][6] = $result_ninja[6][$count_ninja6];
                                                                 $count_team++;
                                                                 $count_ninja6++;
                                                             }
                                                         } $count_team++;
                                                         $count_ninja5++;
                                                     }
                                                 } $count_team++;
                                                 $count_ninja4++;
                                             }
                                         } $count_team++;
                                         $count_ninja3++;
                                     }
                                 }
                                 $count_team++;
                                 $count_ninja2++;
                             }
                         }
                         $count_team++;
                         $count_ninja1++;
                     }
                 }
                 $count_team++;
                 $count_ninja0++;
             }
             $count_result1 = 0;
             echo "team: $count_team<br/>";
             for ($i = 0; $i < $count_team; $i++) {
                 $count_result2 = 0;
                 $x = 0;
                 if (@$result_team[$i][0]) {
                     while (@$result_team[$i][$count_result2]) {
                         $result_teamx[$count_result1][$x] = $result_team[$i][$count_result2];
                         $count_result2++;
                         $x++;
                     }
                     $count_result1++;
                 }
             }
             $count1 = 0;
             $count2 = 0;
             while (@$result_teamx[$count1][0]) {
                 $count2 = 0;
                 echo "$count1: ";
                 while (@$result_teamx[$count1][$count2]) {
                     $string = $result_teamx[$count1][$count2];
                     echo "$string ";
                     $count2++;
                 }
                 $count1++;
                 echo "<br/>";
             }
         }
         ?>

      </div>
      <script src="js/jquery-2.1.4.min.js"></script>
      <script src="js/main.js"></script>
      <script src="js/classie.js"></script>
      <script src="js/jquery.datetimepicker.full.js"></script>
      <script src="js/jquery.barrating.js"></script>
      <script src="js/examples.js"></script>
   </body>

</html>