<html>
   <body>
      <div>
       <?php

        
          function hello(){
              echo "Hello";
          }
     ?>

<input type="button" name="Release" onclick="document.write('<?php hello() ?>');" value="Click to Release">
</div>
   </body>
</html>