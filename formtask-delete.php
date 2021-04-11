
<?php
    session_start();

    if(!isset($_SESSION['user'])) {
        header('Location: http://localhost/notebook/login.php');
        exit();
    }
    
    function getTask() {
        if (isset($_GET['delete'])) {
            foreach ($_SESSION['user']['tasks'] as $key){
                if ($key['id'] == $_GET['delete']){
                    //var_dump($key);
                    return $key;
                } 
            }   
        }
    }
    
    require_once './helper/Helper.php';
    $helper = new Helper();
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Delete Task</title>
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
            <?php if (isset($_GET['delete'])) { $task = getTask(); } ?>
            <h1>Delete Task</h1>
            <p>Sure you want to delete this task?</p>
            <form action="<?php echo $helper->urlController('controllerFrontal', null, null) ?>" method="POST">
            <div class="form-group id">
                <label for="name">Id</label>
                <input type="text" name="id" class="form-control" id="id" readonly="true" value="<?php echo $task['id'];?>">
            </div>
            <div class="form-group">
                <label for="name">Name Task</label>
                <input type="text" name="name" class="form-control" id="name" readonly="true placeholder="Enter name task" value="<?php echo $task['name'];?>">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="completed" class="form-check-input" id="completed" disabled="true" <?php $task['completed'] === "1" ? print "checked=checked>" : print ">"; ?>
                <label class="form-check-label" for="completed"><?php $task['completed'] === "1" ? print "Completed!" : print "Not Completed!" ?></label>
            </div>
            <input type="submit" name="deltask" value="Send" class="btn btn-danger">
            <a href="/notebook/index.php" class="btn btn-info">Cancel</a>
        </div>
    </body>
</html>
