
<?php
    session_start();

    if(!isset($_SESSION['user'])) {
        header('Location: http://localhost/notebook/login.php');
        exit();
    }
    require_once './helper/Helper.php';
    $helper = new Helper();
    
    function getTask() {
        if (isset($_GET['update'])) {
            foreach ($_SESSION['user']['tasks'] as $key){
                if ($key['id'] == $_GET['update']){
                    //var_dump($key);
                    return $key;
                } 
            }   
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Add Task</title>
        <link rel="stylesheet" text="text/css" href="./static/css/main.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <style>
            .task-form {
                margin:40px;
                width: 300px;
            } 
        </style>
    </head>
    <body>
        <div class="task-form">
            <p><a href="index.php">Home</a> | user <?php echo $_SESSION['user']['username'];?> | <a href="<?php echo $helper->urlController('controllerFrontal', 'logout', 'logout') ?>"> Logout </a></p>  
            <h1>Add Task</h1>
            <form action="<?php echo $helper->urlController('controllerFrontal', null, null) ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name Task</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name task">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="completed" class="form-check-input" id="completed">
                    <label class="form-check-label" for="completed">Check me out if completed!</label>
                </div>
                <input type="submit" name="task" value="Send" class="btn btn-primary">
                <a href="/notebook/index.php" class="btn btn-info">Cancel</a>
            </form>
        </div>
    </body>
</html>
