   <html>
      <body>
    <?php
    $x = 'abcd';
    $k = strpos($x, 'a');
    if($k===0) {
        echo "x1";
    }
    $z = strpos($x,'e');
    if($z===0) {
        echo "x2";
    }
    echo "k=$k, z=$z";
    ?>
   </body>
</html>