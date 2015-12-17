<html>
   <body>
      <div>
       <?php

            $a = 'aaa';
          function hello(){
              global $a;
              echo "$a";
              echo "Hello";
          }
          function hellox(){
              global $a;
              echo "$a x";
              echo "Hellox";
          }
     ?>

<input type="button" name="Release" onclick="document.write('<?php hello() ?>');" value="Click to Release">
<input type="button" name="Release" onclick="document.write('<?php hellox() ?>');" value="Click to Release">
</div>
   </body>
</html>