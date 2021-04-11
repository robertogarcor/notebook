<?php
    session_start();

    if(!isset($_SESSION['user'])) {
        header('Location: http://localhost/notebook/login.php');
        exit();
    } 

    $alltasks = $_SESSION['user']['tasks'];
    //var_dump($_SESSION['user']['tasks']);

    require_once './helper/Helper.php';
    $helper = new Helper();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sumary Tasks</title>
        <link rel="stylesheet" text="text/css" href="./static/css/main.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <style>
            .sumary-tasks {
                margin:40px;  
            }
            .table {
                min-width: 800px;    
            }
        </style>
</head>
<body>
    <div class='sumary-tasks'>
        <p><a href="index.php">Home</a> | Welcome! user <?php echo $_SESSION['user']['username'];?> | <a href="<?php echo $helper->urlController('controllerFrontal', 'logout', 'logout') ?>"> Logout </a></p>
        <h1>Sumary Tasks</h1>
        <section>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Completed</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>     
                    <?php
                        foreach ($alltasks as $t) {?>
                            <tr>
                                <td scope="row">
                                    <?php print $t['id'];?>
                                </td>
                                <td>    
                                    <input type="checkbox" disabled="true" <?php $t['completed'] === "1" ? print "checked=checked>" : print ">"; ?>
                                </td>
                                <td>
                                    <?php print $t['name']?>
                                </td>
                                <td>  
                                    <a class="btn btn-info btn-xs" href="<?php echo $helper->urlController('controllerFrontal', 'delete', $t['id']) ?>"> Delete </a><span> | </span>
                                    <a class="btn btn-info btn-xs" href="<?php echo $helper->urlController('controllerFrontal', 'update', $t['id']) ?>"> Update </a>
                                </td>
                            </tr>
                        <?php    
                        }
                        ?>  
                </tbody>
            </table>                
            <br>
            <a href="<?php echo $helper->urlController('controllerFrontal', 'add', null)?>" class="btn btn-success">Add Task</a>
            <a href="<?php echo $helper->urlController('controllerFrontal', 'fileTask', null)?>" class="btn btn-primary">Donwload Task <a/>
        </section>
    </div>
</body>

</html>

