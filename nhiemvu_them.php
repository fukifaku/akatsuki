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
            <div id="form-nhiem-vu-difficulty2">
               <select id="example-movie2" name="ratio">
                  <option value="20">Tỉ Lệ Thành Công > 20%</option>
                  <option value="40">Tỉ Lệ Thành Công > 40%</option>
                  <option value="60" selected="selected">Tỉ Lệ Thành Công > 60%</option>
                  <option value="80">Tỉ Lệ Thành Công > 80%</option>
                  <option value="100">Tỉ Lệ Thành Công = 100%</option>
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
             $ninmu_ratio = $_POST['ratio'];
             //echo "ten nhiem vu: $ninmu_ten</br>mo ta nhiem vu: $ninmu_mota</br>lang: $ninmu_lang</br>skill: $ninmu_skill[0], $ninmu_skill[1]</br>thoi gian ket thuc:$ninmu_endtime</br>thoi gian bat dau: $ninmu_starttime";
             $end = date_create($ninmu_endtime);
             $start = date_create($ninmu_starttime);
             $time2 = date_diff($start, $end);
             date_default_timezone_set('Asia/Saigon');
             $today = date('Y-m-d H:i:s');
             $todayx = date_create($today);
             $s = $time2->format("day %d, hour %h, minutes %i");
             if ($end < $start) {
                 echo "<span style='color:white;font-weight: bold;font-size:25px;'>thời gian kết thúc nhỏ hơn thời gian bắt đầu!</span>";
             } else if ($start < $todayx){
                 echo "<span style='color:white;font-weight: bold;font-size:25px;'>thời gian bắt đầu nhỏ hơn hiện tại!</span>";
             } else {
             //echo "$s, $s2";
             //$end2 = $start;
             //date_add($end2, $time2);
             //    $end3 = date_format($end2, "Y-m-d H:i:m");
             //echo "</br>thesecond: $s, ketthuc: $end3;</div>";
//              $res = pg_query($conn, "insert into ninmu(ninmu_name, ninmu_teampoint, ninmu_time_start, ninmu_time_end, ninmu_description)"
//                      . "values('$ninmu_ten', $ninmu_point, '$ninmu_starttime', '$ninmu_endtime', '$ninmu_mota')");
//              
             $count = 0;
             $count_skill = 0;
             date_default_timezone_set('Asia/Saigon');
             $today = date('Y-m-d H:i:s');
             while (@$ninmu_skill[$count_skill]) {
                 // echo "$ninmu_skill[$count_skill]: ";
                 $res = pg_query($conn, "Select ninja_id, ninja_cost, sato_id, ninja_point, ninja_ninmu_success, ninja_ninmu_fail "
                         . "from ninja natural join ninja_jutsu natural join sato_ninja "
                         . "where jutsu_id = $ninmu_skill[$count_skill] order by ninja_cost asc");
                 $i = 0;
                 $k = 0;
                 $numNinja[$count_skill] = 0;
                 while ($row = @pg_fetch_row($res)) {
                     //echo "$row[0], $row[1]  ";

                     $check_available = 1;
                     $res2 = pg_query($conn, "select ninja_start, ninja_end from ninja_schedule where ninja_id = $row[0]");
                     while ($row2 = @pg_fetch_row($res2)) {
                         $nsch_start = date_create($row2[0]);
                         $nsch_end = date_create($row2[1]);
                         if ($nsch_start <= $start && $nsch_end <= $ninmu_starttime) {
                             //    echo "bi trung $k ninja $row[0]<br/>";
                             $check_available = 0;
                             break;
                         }
                         if ($nsch_start <= $ninmu_endtime && $nsch_end <= $ninmu_endtime) {
                             $check_available = 0;
                             break;
                         }
                     }

                     if ($check_available == 1) {
                         // echo "van check $k ninja $row[0]";
                         $result_ninja[$count_skill][$i] = $row[0];
                         $result_ninja_cost[$count_skill][$i] = $row[1];
                         $result_ninja_sato[$count_skill][$i] = $row[2];
                         $result_ninja_point[$count_skill][$i] = $row[3];
                         $sum = $row[4] + $row[5];
                         $avg = $row[4] * 100 / $sum;
                         $result_ninja_ratio[$count_skill][$i] = number_format($avg, 0);
                         $numNinja[$count_skill] ++;
                         $i++;
                     }
                     $k++;
                 }
                 $count_skill++;
                 //echo "</br>";
             }
             if (!@$numNinja[0] || !@$numNinja[1] || !@$numNinja[2] || !@$numNinja[3] || !@$numNinja[4] || !@$numNinja[5] || !@$numNinja[6]) {
                 echo "<span style='color:white;font-weight: bold;font-size:25px;'>Không có đội thỏa mãn!</span>";
             } else {

                 function return_team($array, $n) {
                     $array_return[20];
                     $nx = 0;
                     for ($i = 1; $i < $n; $i++) {
                         for ($j = 0; $j < $i; $j++) {
                             if ($array[$i] == $array[$j]) {
                                 $array[$i] = -1;
                             }
                         }
                     }
                     for ($i = 0; $i < $n; $i++) {
                         if ($array[$i] != -1) {
                             $array_return[$nx] = $array[$i];
                             $nx++;
                         }
                     }
                     return $array_return;
                 }

                 function return_team_with_cost($array, $n, $array_cost) {
                     $array_return;
                     $nx = 0;
                     for ($i = 1; $i < $n; $i++) {
                         for ($j = 0; $j < $i; $j++) {
                             if ($array[$i] == $array[$j]) {
                                 $array[$i] = -1;
                             }
                         }
                     }
                     for ($i = 0; $i < $n; $i++) {
                         if ($array[$i] != -1) {
                             $array_return[$nx] = $array[$i];
                             $array_return[$nx + 10] = $array_cost[$i];
                             $nx++;
                         }
                     }
                     return $array_return;
                 }

                 function return_team_with_ratio($array, $n, $array_sato, $point, $array_ratio) {
                     $array_return;
                     $nx = 0;
                     for ($i = 1; $i < $n; $i++) {
                         for ($j = 0; $j < $i; $j++) {
                             if ($array[$i] == $array[$j]) {
                                 $array[$i] = -1;
                             }
                         }
                     }
                     $i = 0;
                     $sum = 0;
                     while (@$array_ratio[$i]) {
                         $sum += $array_ratio[$i];
                         $i++;
                     }
                     $ratiox = $sum / $i;
                     $ratio = number_format($ratiox, 0);
                     //echo "$ratio ";
                     for ($i = 0; $i < $n; $i++) {
                         if ($array[$i] != -1) {
                             $array_return[$nx] = $array[$i];
                             if (!$array_sato[$i]) {
                                 $ratio -= 5;
                             }

                             $nx++;
                         }
                     }
                     $ratio += $point / 2;
                     $array_return[10] = $ratio;
                     return $array_return;
                 }

                 $count_ninja = 0;
                 $count_team = 0;
                 $team_money;
                 $team_money_value = 10000;
                 $team_money_value_ratio;
                 $team_ratio;
                 $team_ratio_value = -1;
                 $team_ratio_value_cost;
                 $team_random;
                 $team_random_value_cost;
                 $team_random_value_ratio;
                 $count_ninja0 = $count_ninja1 = $count_ninja2 = $count_ninja3 = $count_ninja4 = $count_ninja5 = $count_ninja6 = 0;
                 for ($i = 0; $i < $count_skill; $i++) {
                     $random[$i] = rand(0, $numNinja[$i] - 1);
                 }
                 while (@$result_ninja[0][$count_ninja0]) {
                     if ($count_skill == 1) {
                         $array[0] = $result_ninja[0][$count_ninja0];
                         if ($result_ninja_sato[0][$count_ninja0] != $ninmu_lang)
                             $array_sato[0] = 0;
                         else
                             $array_sato[0] = 1;
                         $array_ratio[0] = $result_ninja_ratio[0][$count_ninja0];
                         $point = $result_ninja_point[0][$count_ninja0] - $ninmu_point;
                         $value = $result_ninja_cost[0][$count_ninja0];
                         $arrayy = return_team_with_ratio($array, $count_skill, $array_sato, $point, $array_ratio);
                         if ($random[0] == $count_ninja0) {
                             $team_random = $arrayy;
                             $team_random_value_cost = $value;
                             $team_random_value_ratio = $arrayy[10];
                         }
                         if ($arrayy[10] > $ninmu_ratio) {
                             if ($team_money_value > $value) {
                                 $team_money = $array;
                                 $team_money_value = $value;
                                 $team_money_value_ratio = $arrayy[10];
                             }
                             if ($arrayy[10] > $team_ratio_value) {
                                 $team_ratio = $arrayy;
                                 $team_ratio_value = $arrayy[10];
                                 $team_ratio_value_cost = $value;
                             }
                         }
                         $count_ninja0++;
                     } else {
                         $count_ninja1 = 0;
                         while (@$result_ninja[1][$count_ninja1]) {
                             if ($count_skill == 2) {
                                 $array[0] = $result_ninja[0][$count_ninja0];
                                 $array_cost[0] = $result_ninja_cost[0][$count_ninja0];
                                 $array[1] = $result_ninja[1][$count_ninja1];
                                 $array_cost[1] = $result_ninja_cost[1][$count_ninja1];
                                 $arrayx = return_team_with_cost($array, 2, $array_cost);
                                 if ($result_ninja_sato[0][$count_ninja0] != $ninmu_lang)
                                     $array_sato[0] = 0;
                                 else
                                     $array_sato[0] = 1;
                                 if ($result_ninja_sato[1][$count_ninja1] != $ninmu_lang)
                                     $array_sato[1] = 0;
                                 else
                                     $array_sato[1] = 1;
                                 $array_ratio[0] = $result_ninja_ratio[0][$count_ninja0];
                                 $array_ratio[1] = $result_ninja_ratio[1][$count_ninja1];
                                 $point = $result_ninja_point[0][$count_ninja0] + $result_ninja_point[1][$count_ninja1] - $ninmu_point;
                                 $arrayy = return_team_with_ratio($array, $count_skill, $array_sato, $point, $array_ratio);
                                 $i = 10;
                                 $value = 0;
                                 while (@$arrayx[$i]) {
                                     $value += $arrayx[$i];
                                     $i++;
                                 }
                                 if ($random[0] == $count_ninja0 && $random[1] == $count_ninja1) {
                                     $team_random = $arrayy;
                                     $team_random_value_cost = $value;
                                     $team_random_value_ratio = $arrayy[10];
                                 }
                                 if ($arrayy[10] > $ninmu_ratio) {
                                     if ($team_money_value > $value) {
                                         $team_money = $arrayx;
                                         $team_money_value = $value;
                                         $team_money_value_ratio = $arrayy[10];
                                     }
                                     if ($arrayy[10] > $team_ratio_value) {
                                         $team_ratio = $arrayy;
                                         $team_ratio_value = $arrayy[10];
                                         $team_ratio_value_cost = $value;
                                     }
                                 }
                                 $count_ninja1++;
                             } else {
                                 $count_ninja2 = 0;
                                 while (@$result_ninja[2][$count_ninja2]) {
                                     if ($count_skill == 3) {
                                         $array[0] = $result_ninja[0][$count_ninja0];
                                         $array_cost[0] = $result_ninja_cost[0][$count_ninja0];
                                         $array[1] = $result_ninja[1][$count_ninja1];
                                         $array_cost[1] = $result_ninja_cost[1][$count_ninja1];
                                         $array[2] = $result_ninja[2][$count_ninja2];
                                         $array_cost[2] = $result_ninja_cost[2][$count_ninja2];
                                         if ($result_ninja_sato[0][$count_ninja0] != $ninmu_lang)
                                             $array_sato[0] = 0;
                                         else
                                             $array_sato[0] = 1;
                                         if ($result_ninja_sato[1][$count_ninja1] != $ninmu_lang)
                                             $array_sato[1] = 0;
                                         else
                                             $array_sato[1] = 1;
                                         if ($result_ninja_sato[2][$count_ninja2] != $ninmu_lang)
                                             $array_sato[2] = 0;
                                         else
                                             $array_sato[2] = 1;
                                         $array_ratio[0] = $result_ninja_ratio[0][$count_ninja0];
                                         $array_ratio[1] = $result_ninja_ratio[1][$count_ninja1];
                                         $array_ratio[2] = $result_ninja_ratio[2][$count_ninja2];
                                         $point = $result_ninja_point[0][$count_ninja0] + $result_ninja_point[1][$count_ninja1] + $result_ninja_point[2][$count_ninja2] - $ninmu_point;
                                         $arrayy = return_team_with_ratio($array, $count_skill, $array_sato, $point, $array_ratio);
                                         $arrayx = return_team_with_cost($array, 3, $array_cost);
                                         $i = 10;
                                         $value = 0;
                                         while (@$arrayx[$i]) {
                                             $value += $arrayx[$i];
                                             $i++;
                                         }
                                         if ($random[0] == $count_ninja0 && $random[1] == $count_ninja1 && $random[2] == $count_ninja2) {
                                             $team_random = $arrayy;
                                             $team_random_value_cost = $value;
                                             $team_random_value_ratio = $arrayy[10];
                                         }
                                         if ($arrayy[10] > $team_ratio) {
                                             if ($team_money_value > $value) {
                                                 $team_money = $arrayx;
                                                 $team_money_value = $value;
                                                 $team_money_value_ratio = $arrayy[10];
                                             }
                                             if ($arrayy[10] > $team_ratio_value) {
                                                 $team_ratio = $arrayy;
                                                 $team_ratio_value = $arrayy[10];
                                                 $team_ratio_value_cost = $value;
                                             }
                                         }
                                         $count_ninja2++;
                                     } else {
                                         $count_ninja3 = 0;
                                         while (@$result_ninja[3][$count_ninja3]) {
                                             if ($count_skill == 4) {
                                                 $array[0] = $result_ninja[0][$count_ninja0];
                                                 $array_cost[0] = $result_ninja_cost[0][$count_ninja0];
                                                 $array[1] = $result_ninja[1][$count_ninja1];
                                                 $array_cost[1] = $result_ninja_cost[1][$count_ninja1];
                                                 $array[2] = $result_ninja[2][$count_ninja2];
                                                 $array_cost[2] = $result_ninja_cost[2][$count_ninja2];
                                                 $array[3] = $result_ninja[3][$count_ninja3];
                                                 $array_cost[3] = $result_ninja_cost[3][$count_ninja3];
                                                 if ($result_ninja_sato[0][$count_ninja0] != $ninmu_lang)
                                                     $array_sato[0] = 0;
                                                 else
                                                     $array_sato[0] = 1;
                                                 if ($result_ninja_sato[1][$count_ninja1] != $ninmu_lang)
                                                     $array_sato[1] = 0;
                                                 else
                                                     $array_sato[1] = 1;
                                                 if ($result_ninja_sato[2][$count_ninja2] != $ninmu_lang)
                                                     $array_sato[2] = 0;
                                                 else
                                                     $array_sato[2] = 1;
                                                 if ($result_ninja_sato[3][$count_ninja3] != $ninmu_lang)
                                                     $array_sato[3] = 0;
                                                 else
                                                     $array_sato[3] = 1;
                                                 $array_ratio[0] = $result_ninja_ratio[0][$count_ninja0];
                                                 $array_ratio[1] = $result_ninja_ratio[1][$count_ninja1];
                                                 $array_ratio[2] = $result_ninja_ratio[2][$count_ninja2];
                                                 $array_ratio[3] = $result_ninja_ratio[3][$count_ninja3];
                                                 $point = $result_ninja_point[0][$count_ninja0] + $result_ninja_point[1][$count_ninja1] +
                                                         $result_ninja_point[2][$count_ninja2] + $result_ninja_point[3][$count_ninja3] - $ninmu_point;
                                                 $arrayy = return_team_with_ratio($array, $count_skill, $array_sato, $point, $array_ratio);
                                                 $arrayx = return_team_with_cost($array, $count_skill, $array_cost);
                                                 $i = 10;
                                                 $value = 0;
                                                 while (@$arrayx[$i]) {
                                                     $value += $arrayx[$i];
                                                     $i++;
                                                 }
                                                 if ($random[0] == $count_ninja0 && $random[1] == $count_ninja1 && $random[2] == $count_ninja2 && $random[3] == $count_ninja3) {
                                                     $team_random = $arrayy;
                                                     $team_random_value_cost = $value;
                                                     $team_random_value_ratio = $arrayy[10];
                                                 }
                                                 if ($arrayy[10] > $ninmu_ratio) {
                                                     if ($team_money_value > $value) {
                                                         $team_money = $arrayx;
                                                         $team_money_value = $value;
                                                         $team_money_value_ratio = $arrayy[10];
                                                     }
                                                     if ($arrayy[10] > $team_ratio_value) {
                                                         $team_ratio = $arrayy;
                                                         $team_ratio_value = $arrayy[10];
                                                         $team_ratio_value_cost = $value;
                                                     }
                                                 }
                                                 $count_ninja3++;
                                             } else {
                                                 $count_ninja4 = 0;
                                                 while (@$result_ninja[4][$count_ninja4]) {
                                                     if ($count_skill == 5) {
                                                         $array[0] = $result_ninja[0][$count_ninja0];
                                                         $array_cost[0] = $result_ninja_cost[0][$count_ninja0];
                                                         $array[1] = $result_ninja[1][$count_ninja1];
                                                         $array_cost[1] = $result_ninja_cost[1][$count_ninja1];
                                                         $array[2] = $result_ninja[2][$count_ninja2];
                                                         $array_cost[2] = $result_ninja_cost[2][$count_ninja2];
                                                         $array[3] = $result_ninja[3][$count_ninja3];
                                                         $array_cost[3] = $result_ninja_cost[3][$count_ninja3];
                                                         $array[4] = $result_ninja[4][$count_ninja4];
                                                         $array_cost[4] = $result_ninja_cost[4][$count_ninja4];

                                                         if ($result_ninja_sato[0][$count_ninja0] != $ninmu_lang)
                                                             $array_sato[0] = 0;
                                                         else
                                                             $array_sato[0] = 1;
                                                         if ($result_ninja_sato[1][$count_ninja1] != $ninmu_lang)
                                                             $array_sato[1] = 0;
                                                         else
                                                             $array_sato[1] = 1;
                                                         if ($result_ninja_sato[2][$count_ninja2] != $ninmu_lang)
                                                             $array_sato[2] = 0;
                                                         else
                                                             $array_sato[2] = 1;
                                                         if ($result_ninja_sato[3][$count_ninja3] != $ninmu_lang)
                                                             $array_sato[3] = 0;
                                                         else
                                                             $array_sato[3] = 1;
                                                         if ($result_ninja_sato[4][$count_ninja4] != $ninmu_lang)
                                                             $array_sato[4] = 0;
                                                         else
                                                             $array_sato[4] = 1;
                                                         $array_ratio[0] = $result_ninja_ratio[0][$count_ninja0];
                                                         $array_ratio[1] = $result_ninja_ratio[1][$count_ninja1];
                                                         $array_ratio[2] = $result_ninja_ratio[2][$count_ninja2];
                                                         $array_ratio[3] = $result_ninja_ratio[3][$count_ninja3];
                                                         $array_ratio[4] = $result_ninja_ratio[4][$count_ninja4];
                                                         $point = $result_ninja_point[0][$count_ninja0] + $result_ninja_point[1][$count_ninja1] +
                                                                 $result_ninja_point[2][$count_ninja2] + $result_ninja_point [3][$count_ninja3] + $result_ninja_point[4][$count_ninja4] - $ninmu_point;
                                                         $arrayy = return_team_with_ratio($array, $count_skill, $array_sato, $point, $array_ratio);
                                                         $arrayx = return_team_with_cost($array, $count_skill, $array_cost);
                                                         $i = 10;
                                                         $value = 0;
                                                         while (@$arrayx[$i]) {
                                                             $value += $arrayx[$i];
                                                             $i++;
                                                         }
                                                         if ($random[0] == $count_ninja0 && $random[1] == $count_ninja1 && $random[2] == $count_ninja2 && $random[3] == $count_ninja3 && $random[4] == $count_ninja4) {
                                                             $team_random = $arrayy;
                                                             $team_random_value_cost = $value;
                                                             $team_random_value_ratio = $arrayy[10];
                                                         }
                                                         if ($arrayy[10] > $ninmu_ratio) {
                                                             if ($team_money_value > $value) {
                                                                 $team_money = $arrayx;
                                                                 $team_money_value = $value;
                                                                 $team_money_value_ratio = $arrayy[10];
                                                             }
                                                             if ($arrayy[10] > $team_ratio_value) {
                                                                 $team_ratio = $arrayy;
                                                                 $team_ratio_value = $arrayy[10];
                                                                 $team_ratio_value_cost = $value;
                                                             }
                                                         }
                                                         $count_ninja4++;
                                                     } else {
                                                         $count_ninja5 = 0;
                                                         while (@$result_ninja[5][$count_ninja5]) {
                                                             if ($count_skill == 6) {
                                                                 $array[0] = $result_ninja[0][$count_ninja0];
                                                                 $array_cost[0] = $result_ninja_cost[0][$count_ninja0];
                                                                 $array[1] = $result_ninja[1][$count_ninja1];
                                                                 $array_cost[1] = $result_ninja_cost[1][$count_ninja1];
                                                                 $array[2] = $result_ninja[2][$count_ninja2];
                                                                 $array_cost[2] = $result_ninja_cost[2][$count_ninja2];
                                                                 $array[3] = $result_ninja[3][$count_ninja3];
                                                                 $array_cost[3] = $result_ninja_cost[3][$count_ninja3];
                                                                 $array[4] = $result_ninja[4][$count_ninja4];
                                                                 $array_cost[4] = $result_ninja_cost[4][$count_ninja4];
                                                                 $array[5] = $result_ninja[5][$count_ninja5];
                                                                 $array_cost[5] = $result_ninja_cost[5][$count_ninja5];

                                                                 if ($result_ninja_sato[0][$count_ninja0] != $ninmu_lang)
                                                                     $array_sato[0] = 0;
                                                                 else
                                                                     $array_sato[0] = 1;
                                                                 if ($result_ninja_sato[1][$count_ninja1] != $ninmu_lang)
                                                                     $array_sato[1] = 0;
                                                                 else
                                                                     $array_sato[1] = 1;
                                                                 if ($result_ninja_sato[2][$count_ninja2] != $ninmu_lang)
                                                                     $array_sato[2] = 0;
                                                                 else
                                                                     $array_sato[2] = 1;
                                                                 if ($result_ninja_sato[3][$count_ninja3] != $ninmu_lang)
                                                                     $array_sato[3] = 0;
                                                                 else
                                                                     $array_sato[3] = 1;
                                                                 if ($result_ninja_sato[4][$count_ninja4] != $ninmu_lang)
                                                                     $array_sato[4] = 0;
                                                                 else
                                                                     $array_sato[4] = 1;
                                                                 if ($result_ninja_sato[5][$count_ninja5] != $ninmu_lang)
                                                                     $array_sato[5] = 0;
                                                                 else
                                                                     $array_sato[5] = 1;
                                                                 $array_ratio[0] = $result_ninja_ratio[0][$count_ninja0];
                                                                 $array_ratio[1] = $result_ninja_ratio[1][$count_ninja1];
                                                                 $array_ratio[2] = $result_ninja_ratio[2][$count_ninja2];
                                                                 $array_ratio[3] = $result_ninja_ratio[3][$count_ninja3];
                                                                 $array_ratio[4] = $result_ninja_ratio[4][$count_ninja4];
                                                                 $array_ratio[5] = $result_ninja_ratio[5][$count_ninja5];
                                                                 $point = $result_ninja_point[0][$count_ninja0] + $result_ninja_point[1][$count_ninja1] +
                                                                         $result_ninja_point[2][$count_ninja2] + $result_ninja_point[3][$count_ninja3] +
                                                                         $result_ninja_point[4][$count_ninja4] + $result_ninja_point[5][$count_ninja5] - $ninmu_point;
                                                                 $arrayy = return_team_with_ratio($array, $count_skill, $array_sato, $point, $array_ratio);
                                                                 $arrayx = return_team_with_cost($array, $count_skill, $array_cost);
                                                                 $i = 10;
                                                                 $value = 0;
                                                                 while (@$arrayx[$i]) {
                                                                     $value += $arrayx[$i];
                                                                     $i++;
                                                                 }
                                                                 if ($random[0] == $count_ninja0 && $random[1] == $count_ninja1 && $random[2] == $count_ninja2 && $random[3] == $count_ninja3 && $random[4] == $count_ninja4 && $random[5] == $count_ninja5) {
                                                                     $team_random = $arrayy;
                                                                     $team_random_value_cost = $value;
                                                                     $team_random_value_ratio = $arrayy[10];
                                                                 }
                                                                 if ($arrayy[10] > $ninmu_ratio) {
                                                                     if ($team_money_value > $value) {
                                                                         $team_money = $arrayx;
                                                                         $team_money_value = $value;
                                                                         $team_money_value_ratio = $arrayy[10];
                                                                     }
                                                                     if ($arrayy[10] > $team_ratio_value) {
                                                                         $team_ratio = $arrayy;
                                                                         $team_ratio_value = $arrayy[10];
                                                                         $team_ratio_value_cost = $value;
                                                                     }
                                                                 }
                                                                 $count_ninja5++;
                                                             } else {
                                                                 $count_ninja6 = 0;
                                                                 while (@$result_ninja[6][$count_ninja6]) {
                                                                     $array[0] = $result_ninja[0][$count_ninja0];
                                                                     $array_cost[0] = $result_ninja_cost[0][$count_ninja0];
                                                                     $array[1] = $result_ninja[1][$count_ninja1];
                                                                     $array_cost[1] = $result_ninja_cost[1][$count_ninja1];
                                                                     $array[2] = $result_ninja[2][$count_ninja2];
                                                                     $array_cost[2] = $result_ninja_cost[2][$count_ninja2];
                                                                     $array[3] = $result_ninja[3][$count_ninja3];
                                                                     $array_cost[3] = $result_ninja_cost[3][$count_ninja3];
                                                                     $array[4] = $result_ninja[4][$count_ninja4];
                                                                     $array_cost[4] = $result_ninja_cost[4][$count_ninja4];
                                                                     $array[5] = $result_ninja[5][$count_ninja5];
                                                                     $array_cost[5] = $result_ninja_cost[5][$count_ninja5];
                                                                     $array[6] = $result_ninja[6][$count_ninja6];
                                                                     $array_cost[6] = $result_ninja_cost[6][$count_ninja6];

                                                                     if ($result_ninja_sato[0][$count_ninja0] != $ninmu_lang)
                                                                         $array_sato[0] = 0;
                                                                     else
                                                                         $array_sato[0] = 1;
                                                                     if ($result_ninja_sato[1][$count_ninja1] != $ninmu_lang)
                                                                         $array_sato[1] = 0;
                                                                     else
                                                                         $array_sato[1] = 1;
                                                                     if ($result_ninja_sato[2][$count_ninja2] != $ninmu_lang)
                                                                         $array_sato[2] = 0;
                                                                     else
                                                                         $array_sato[2] = 1;
                                                                     if ($result_ninja_sato[3][$count_ninja3] != $ninmu_lang)
                                                                         $array_sato[3] = 0;
                                                                     else
                                                                         $array_sato[3] = 1;
                                                                     if ($result_ninja_sato[4][$count_ninja4] != $ninmu_lang)
                                                                         $array_sato[4] = 0;
                                                                     else
                                                                         $array_sato[4] = 1;
                                                                     if ($result_ninja_sato[5][$count_ninja5] != $ninmu_lang)
                                                                         $array_sato[5] = 0;
                                                                     else
                                                                         $array_sato[5] = 1;
                                                                     if ($result_ninja_sato[6][$count_ninja6] != $ninmu_lang)
                                                                         $array_sato[6] = 0;
                                                                     else
                                                                         $array_sato[6] = 1;
                                                                     $array_ratio[0] = $result_ninja_ratio[0][$count_ninja0];
                                                                     $array_ratio[1] = $result_ninja_ratio[1][$count_ninja1];
                                                                     $array_ratio[2] = $result_ninja_ratio[2][$count_ninja2];
                                                                     $array_ratio[3] = $result_ninja_ratio[3][$count_ninja3];
                                                                     $array_ratio[4] = $result_ninja_ratio[4][$count_ninja4];
                                                                     $array_ratio[5] = $result_ninja_ratio[5][$count_ninja5];
                                                                     $array_ratio[6] = $result_ninja_ratio[6][$count_ninja6];
                                                                     $point = $result_ninja_point[0][$count_ninja0] + $result_ninja_point[1][$count_ninja1] +
                                                                             $result_ninja_point[2][$count_ninja2] + $result_ninja_point[3][$count_ninja3] +
                                                                             $result_ninja_point[4][$count_ninja4] + $result_ninja_point[5][$count_ninja5] +
                                                                             $result_ninja_point[6][$count_ninja6] - $ninmu_point;
                                                                     $arrayy = return_team_with_ratio($array, $count_skill, $array_sato, $point, $array_ratio);
                                                                     $arrayx = return_team_with_cost($array, $count_skill, $array_cost);
                                                                     $i = 10;
                                                                     $value = 0;
                                                                     while (@$arrayx[$i]) {
                                                                         $value += $arrayx[$i];
                                                                         $i++;
                                                                     }
                                                                     if ($random[0] == $count_ninja0 && $random[1] == $count_ninja1 && $random[2] == $count_ninja2 && $random[3] == $count_ninja3 && $random[4] == $count_ninja4 && $random[5] == $count_ninja5 && $random[6] == $count_ninja6) {
                                                                         $team_random = $arrayy;
                                                                         $team_random_value_cost = $value;
                                                                         $team_random_value_ratio = $arrayy[10];
                                                                     }
                                                                     if ($arrayy[10] > $ninmu_ratio) {
                                                                         if ($team_money_value > $value) {
                                                                             $team_money = $arrayx;
                                                                             $team_money_value = $value;
                                                                             $team_money_value_ratio = $arrayy[10];
                                                                         }
                                                                         if ($arrayy[10] > $team_ratio_value) {
                                                                             $team_ratio = $arrayy;
                                                                             $team_ratio_value = $arrayy[10];
                                                                             $team_ratio_value_cost = $value;
                                                                         }
                                                                     }
                                                                     $count_ninja6++;
                                                                 }
                                                                 $count_ninja5 ++;
                                                             }
                                                         }
                                                         $count_ninja4++;
                                                     }
                                                 }
                                                 $count_ninja3++;
                                             }
                                         }
                                         $count_ninja2++;
                                     }
                                 }
                                 $count_ninja1++;
                             }
                         }
                         $count_ninja0++;
                     }
                 }
             
             $kt = 0;
             ?>

             <div id ="team-result">
                <div class ="team-random-father">
                   <div id = "team-random">
                      <span style ='font-size:14pt;'>Ngẫu Nhiên<br/></span>
                      <span id ="money" style ='font-size:18pt;'><?php echo "$team_random_value_cost$"; ?></span><br/>
                      <span style ='font-weight: bold;font-size:18pt;'><?php echo "$team_random_value_ratio"; ?></span>% thành công<br/>
                   </div>
                </div>
                <div class="team-money-father">
                   <div id="team-money">
                      <span style ='font-size:14pt;'>Rẻ Nhất<br/></span>
                      <span id ="money" style ='font-size:18pt;'><?php echo "$team_money_value$"; ?></span><br/>
                      <span style ='font-weight: bold;font-size:18pt;'><?php echo "$team_money_value_ratio"; ?></span>% thành công<br/>
                   </div>
                </div>
                <div class ="team-ratio-father">
                   <div id="team-ratio">
                      <span style ='font-size:14pt;'>Tỷ Lệ Thành Công<br/>Cao Nhất<br/></span>
                      <span id ="money" style ='font-size:18pt;'><?php echo "$team_ratio_value_cost$"; ?></span><br/>
                      <span style ='font-weight: bold;font-size:18pt;'><?php echo "$team_ratio_value"; ?></span>% thành công<br/>
                   </div>
                </div>
             </div>
             <?php }
             ?>
             <div id ="team-ninja-random">
                 <?php
                 $i = 0;
                 while (@$team_random[$i]) {
                     $res = pg_query($conn, "select ninja_avatar, ninja_name, ninja_cost, ninja_ninmu_success, ninja_ninmu_fail
                                                from ninja where ninja_id = '$team_random[$i]'");
                     $row = pg_fetch_row($res);
                     $sum = $row[3] + $row[4];
                     $avgx = $row[3] * 100 / $sum;
                     $avg = number_format($avgx, 0);
                     ?>
                    <div id="team-ninja-row">
                       <div class = 'col-take-1x'><img src = <?php echo $row[0]; ?> height='40' width='40' class='img-circle-border'/></div> 
                       <div class = 'col-take-2x'><span style="font-weight: bold;font-size:14px;"><?php echo "$row[1]"; ?></span></div> 
                       <div class = 'col-take-1x'><span id="money"style="font-weight: bold;font-size:20px;"><?php echo " $row[2]$"; ?></span></div>
                       <div class = 'col-take-3x'><span style="font-weight: bold;font-size:20px;">
                             <?php echo $sum; ?></span> nhiệm vụ &nbsp;&nbsp;
                          <span style="font-weight: bold;font-size:20px;">    
                    <?php echo " $avg"; ?></span>% thành công</div>
                    </div>
                    <?php
                    $i++;
                }
                ?>
                <input type="button" id="submit-team-random" name="Release_random" onclick="document.write('<?php submit_team_random($team_random) ?>');" value="Chọn Đội này"/>

             </div>
             <div id="team-ninja-ratio">
                 <?php
                 $i = 0;
                 while (@$team_ratio[$i]) {
                     $res = pg_query($conn, "select ninja_avatar, ninja_name, ninja_cost, ninja_ninmu_success, ninja_ninmu_fail
                                                from ninja where ninja_id = '$team_ratio[$i]'");
                     $row = pg_fetch_row($res);
                     $sum = $row[3] + $row[4];
                     $avgx = $row[3] * 100 / $sum;
                     $avg = number_format($avgx, 0);
                     ?>
                    <div id="team-ninja-row">
                       <div class = 'col-take-1x'><img src = <?php echo $row[0]; ?> height='40' width='40' class='img-circle-border'/></div> 
                       <div class = 'col-take-2x'><span style="font-weight: bold;font-size:14px;"><?php echo "$row[1]"; ?></span></div> 
                       <div class = 'col-take-1x'><span id="money"style="font-weight: bold;font-size:20px;"><?php echo " $row[2]$"; ?></span></div>
                       <div class = 'col-take-3x'><span style="font-weight: bold;font-size:20px;">
                             <?php echo $sum; ?></span> nhiệm vụ &nbsp;&nbsp;
                          <span style="font-weight: bold;font-size:20px;">    
                    <?php echo " $avg"; ?></span>% thành công</div>
                    </div>
                    <?php
                    $i++;
                }
                ?>
                <input type="button" id="submit-team-ratio" name="Release_ratio" onclick="document.write('<?php submit_team_ratio($team_ratio) ?>');" value="Chọn Đội này"/>
             </div>
             <div id="team-ninja-money">
                 <?php
                 $i = 0;
                 while (@$team_money[$i]) {
                     $res = pg_query($conn, "select ninja_avatar, ninja_name, ninja_cost, ninja_ninmu_success, ninja_ninmu_fail
                                                from ninja where ninja_id = '$team_money[$i]'");
                     $row = pg_fetch_row($res);
                     $sum = $row[3] + $row[4];
                     $avgx = $row[3] * 100 / $sum;
                     $avg = number_format($avgx, 0);
                     ?>
                    <div id="team-ninja-row">
                       <div class = 'col-take-1x'><img src = <?php echo $row[0]; ?> height='40' width='40' class='img-circle-border'/></div> 
                       <div class = 'col-take-2x'><span style="font-weight: bold;font-size:14px;"><?php echo "$row[1]"; ?></span></div> 
                       <div class = 'col-take-1x'><span id="money"style="font-weight: bold;font-size:20px;"><?php echo " $row[2]$"; ?></span></div>
                       <div class = 'col-take-3x'><span style="font-weight: bold;font-size:20px;">
                             <?php echo $sum; ?></span> nhiệm vụ &nbsp;&nbsp;
                          <span style="font-weight: bold;font-size:20px;">    
                    <?php echo " $avg"; ?></span>% thành công</div>
                    </div>
                    <?php
                    $i++;
                }
                ?>
                <input id="submit-team-money" type="button" name="Release_money" onclick="document.write('<?php submit_team_money() ?>');" value="Chọn Đội Money"/>
             </div>
             <?php
         }
         }

         function submit_team_random($team_random) {
             global $kt;
             if (!$kt) {
                 global $id, $conn, $team_random_value_cost,
                 $team_random_value_ratio, $ninmu_endtime,
                 $ninmu_lang, $ninmu_mota, $ninmu_point,
                 $ninmu_skill, $ninmu_starttime, $ninmu_ten;
                 $res = pg_query($conn, "select customer_id, customer_money from customer where customer_username='$id'");
                 $row = pg_fetch_row($res);
                 $cusid = $row[0];
                 $cusmoney = $row[1];
                 if ($cusmoney < $team_random_value_cost) {
                     echo "không đủ tiền vui lòng nạp thêm!";
                 } else {
                     $res = pg_query($conn, "select count(ninmu_id) from ninmu");
                     $row = pg_fetch_row($res);
                     $ninmu_count = $row[0] + 1;
                     $rand = rand(0, 100);
                     if ($rand <= $team_random_value_ratio)
                         $ninmu_succ = 1;
                     else
                         $ninmu_succ = 0;
                     $res = pg_query($conn, "insert into ninmu values($ninmu_count,'$ninmu_ten', '$ninmu_mota','$ninmu_starttime','$ninmu_endtime', $team_random_value_cost, $team_random_value_ratio, 0, $ninmu_succ, $ninmu_point)");
                     $res = pg_query($conn, "insert into ninmu_sato values($ninmu_count, $ninmu_lang)");
                     $i = 0;
                     while (@$ninmu_skill[$i]) {
                         $nskill = $ninmu_skill[$i];
                         pg_query("insert into ninmu_jutsu values($ninmu_count, $nskill)");
                         $i++;
                     }
                     $i = 0;
                     while (@$team_random[$i]) {
                         $trandom = $team_random[$i];
                         pg_query("insert into ninmu_ninja values($ninmu_count, $trandom)");
                         $i++;
                     }
                     date_default_timezone_set('Asia/Saigon');
                     $today = date('Y-m-d H:i:s');
                     pg_query($conn, "insert into customer_ninmu values($cusid, $ninmu_count, '$today')");
                 }
                 $kt = 1;
             }
         }
         ?>
         <?php

         function submit_team_ratio($team_ratio) {
             global $kt;
             if (!$kt) {
                 echo "fuck ratio";
                 global $id, $conn, $team_ratio_value_cost, $team_ratio_value, $ninmu_endtime,
                 $ninmu_lang, $ninmu_mota, $ninmu_point, $ninmu_skill, $ninmu_starttime, $ninmu_ten;
                 $res = pg_query($conn, "select customer_id, customer_money from customer where customer_username='$id'");
                 $row = pg_fetch_row($res);
                 $cusid = $row[0];
                 $cusmoney = $row[1];
                 if ($cusmoney < $team_ratio_value_cost) {
                     echo "không đủ tiền vui lòng nạp thêm!";
                 } else {
                     echo "done ratio";
                     $res = pg_query($conn, "select count(ninmu_id) from ninmu");
                     $row = pg_fetch_row($res);
                     $ninmu_count = $row[0] + 1;
                     $rand = rand(0, 100);
                     if ($rand <= $team_ratio_value)
                         $ninmu_succ = 1;
                     else
                         $ninmu_succ = 0;
                     $ninmu_ten = $ninmu_ten . ' du ma no';
                     $res = pg_query($conn, "insert into ninmu values($ninmu_count,'$ninmu_ten', '$ninmu_mota','$ninmu_starttime','$ninmu_endtime', $team_ratio_value_cost, $team_ratio_value, 0, $ninmu_succ, $ninmu_point)");
                     $res = pg_query($conn, "insert into ninmu_sato values($ninmu_count, $ninmu_lang)");
                     $i = 0;
                     while (@$ninmu_skill[$i]) {
                         $nskill = $ninmu_skill[$i];
                         pg_query("insert into ninmu_jutsu values($ninmu_count, $nskill)");
                         $i++;
                     }
                     $i = 0;
                     while (@$team_ratio[$i]) {
                         $trandom = $team_ratio[$i];
                         pg_query("insert into ninmu_ninja values($ninmu_count, $trandom)");
                         $i++;
                     }
                     date_default_timezone_set('Asia/Saigon');
                     $today = date('Y-m-d H:i:s');
                     pg_query($conn, "insert into customer_ninmu values($cusid, $ninmu_count, '$today')");
                 }
                 $kt = 1;
             }
         }

         function submit_team_money() {
             global $kt;
             if (!$kt) {
                 echo "fuckmoney";
                 global $id, $conn, $team_money, $team_money_value, $team_money_value_ratio, $ninmu_endtime, $ninmu_lang, $ninmu_mota, $ninmu_point, $ninmu_skill, $ninmu_starttime, $ninmu_ten;
                 $res = pg_query($conn, "select customer_id, customer_money from customer where customer_username='$id'");
                 $row = pg_fetch_row($res);
                 $cusid = $row[0];
                 $cusmoney = $row[1];
                 if ($cusmoney < $team_money_value) {
                     echo "không đủ tiền vui lòng nạp thêm!";
                 } else {
                     echo "done";
                     $res = pg_query($conn, "select count(ninmu_id) from ninmu");
                     $row = pg_fetch_row($res);
                     $ninmu_count = $row[0] + 1;
                     $rand = rand(0, 100);
                     if ($rand <= $team_random_value_ratio)
                         $ninmu_succ = 1;
                     else
                         $ninmu_succ = 0;
                     //   echo $ninmu_count;
                     // echo "<br/>$ninmu_ten, $ninmu_point,$ninmu_starttime,$ninmu_endtime, $ninmu_mota, $team_random_value_cost, $team_random_value_ratio, $ninmu_succ, sfsdfsdfsdf";
                     //  echo "$ninmu_count,$ninmu_ten, $ninmu_mota,$ninmu_starttime,$ninmu_endtime, $team_random_value_cost, $team_random_value_ratio, 0, $ninmu_succ, $ninmu_point";
                     //$res=pg_query($conn,"insert into ninmu values($ninmu_count, '$ninmu_ten')");
                     $res = pg_query($conn, "insert into ninmu values($ninmu_count,'$ninmu_ten', '$ninmu_mota','$ninmu_starttime','$ninmu_endtime', $team_money_value, $team_money_value_ratio, 0, $ninmu_succ, $ninmu_point)");
                     $res = pg_query($conn, "insert into ninmu_sato values($ninmu_count, $ninmu_lang)");
                     $i = 0;
                     while (@$ninmu_skill[$i]) {
                         $nskill = $ninmu_skill[$i];
                         pg_query("insert into ninmu_jutsu values($ninmu_count, $nskill)");
                         $i++;
                     }
                     $i = 0;
                     while (@$team_money[$i]) {
                         $trandom = $team_money[$i];
                         pg_query("insert into ninmu_ninja values($ninmu_count, $trandom)");
                         $i++;
                     }
                     date_default_timezone_set('Asia/Saigon');
                     $today = date('Y-m-d H:i:s');
                     pg_query($conn, "insert into customer_ninmu values($cusid, $ninmu_count, '$today')");
                 }
                 $kt = 1;
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