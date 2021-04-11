
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <style>
            .login {
                margin:40px;
                width: 250px;
            } 
            .error {
                margin:40px;
                color: red;
            }
            .logout {
                margin:40px;
                color: blue;
            }
        </style>
    </head>
    <body>
        <?php
            require_once './helper/Helper.php';
            $helper = new Helper();
        
            if (isset($_GET['error'])){
                echo '<p class="error">Username or password invalid. Please in again!.</p>';
            }
            if (isset($_GET['logout'])){
                echo '<p class="logout">Session Closed OK!.</p>';
            }
        ?>
        <div class="login">
            <h1>Login</h1>
            <form action="<?php echo $helper->urlController('controllerFrontal', null, null) ?>" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <input type="submit" name="login" value="Send" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>
