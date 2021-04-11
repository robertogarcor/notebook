
<?php
    session_start();

    if(!isset($_SESSION['user'])) {
        header('Location: http://localhost/notebook/login.php');
        exit();
    }
    
    require_once './helper/Helper.php';
    $helper = new Helper();
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Donwload Task</title>
        <link rel="stylesheet" text="text/css" href="./static/css/main.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <style>
            .task-form {
                margin:40px;
                width: 400px;
            }
            .id {
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="task-form">
            <p><a href="index.php">Home</a> | user <?php echo $_SESSION['user']['username'];?> | <a href="<?php echo $helper->urlController('controllerFrontal', 'logout', 'logout') ?>"> Logout </a></p>
            <h1>Download File Task</h1>
            <p>Sure you want to download file task?</p>
            <form action="<?php echo $helper->urlController('controllerFrontal', null, null) ?>" method="POST">
            <input type="submit" name="donwloadTask" value="Send" class="btn btn-danger">
            <a href="/notebook/index.php" class="btn btn-info">Cancel</a>
        </div>
    </body>
</html>
