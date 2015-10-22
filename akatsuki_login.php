<!DOCTYPE html>
<html>
    <head>
        <title>Akatsuki</title>
        <link rel="stylesheet" type="text/css" href="akatsuki.css">
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
    </head>
    <body>

        <ul class="nav nav-tabs">
            <li><a href="#" class = "ninja-font">AKATSUKI</a></li>
            <li><a href="menu_about.php" class = "ninja-font">about</a></li>
        </ul>
        <?php
        if (isset($_POST['pass']) && isset($_POST['id'])) {
            $pass = $_POST['pass'];
            $id = $_POST['id'];
            if ($id == 'admin' && $pass == '1') {
                header("Location: admin_program.php");
            }
            $conn = @pg_connect("host=localhost port=5432 dbname=akatsuki user='postgres' password='f'");
            $res = pg_query($conn, "Select * from customer where customer_username = '$id' and customer_pass = '$pass'");
            //$row = @pg_fetch_row($res);
            if ($res) {
                header("Location: user_program.php?id=$id&pass=$pass");
            } else {
                echo "<h4 id = \"wrong_pass\" color: while>username or password wrong!</h4>";
            }
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap">
                        <p class="form-title">Sign In</p>
                        <form class="login" action="#"  method="post">
                            <input type="text" placeholder="Username" name = "id" />
                            <input type="password" placeholder="Password" name = "pass"/>
                            <input type="submit" value="Sign In" class="btn btn-success btn-sm" />
                        </form>
                        <p style = "color: white"></br>Don't have account? <a href = "create_account.php" >Click here</a> to create </br>a new one.</p>
                    </div>
                    
                </div>
                <div class="icon-close">
                    <img src="http://s3.amazonaws.com/codecademy-content/courses/ltp2/img/uber/close.png">
                    </div>
            </div>

        </div>	
<!--        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
            <script src="blur.js"></script>
        <script src="index.js"></script>
        
    </body>
</html>
