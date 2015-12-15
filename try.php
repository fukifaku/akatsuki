<html>
   <body>
       <?php

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

       $array[0] = 1;
       $array[1] = 2;
       $array[2] = 3;
       $array[3] = 2;
       $array_cost[0] = 50;
       $array_cost[1] = 100;
       $array_cost[2] = 200;
       $array_cost[3] = 100;
       $arrayx = return_team_with_cost($array, 4, $array_cost);
       $i = 10;
       $value = 0;
       while (@$arrayx[$i]) {
           $value += $arrayx[$i];
           $i++;
       }
       echo $value;
       ?>
   </body>
</html>