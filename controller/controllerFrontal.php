<?php

/**
 *
 * @author Roberto
 */

session_start();

require_once './UserController.php';
require_once './TaskController.php';
require_once '../helper/FileTask.php';

$controller_tasks = new TaskController();
$controller_user = new UserController();

if (isset($_POST['login'])) {
    $user_valid = $controller_user->getUser($_POST['username'], $_POST['password']);
    if ($user_valid) {
        $tasks_user = $controller_tasks->getAllTasksByUser($user_valid['id']); 
        $_SESSION['user'] = $user_valid;
        $_SESSION['user']['tasks'] = $tasks_user;
        header('Location:http://localhost/notebook/index.php');
    } else { 
        header('Location:http://localhost/notebook/login.php?error');       
    }
}

if (isset($_GET['logout'])) {
    $_SESSION = array();
    setcookie(session_name(), '',time(), '/');
    session_destroy();
    header('Location:http://localhost/notebook/login.php?logout'); 
    exit();    
}

if (isset($_GET['add'])) {
   header('Location:http://localhost/notebook/formtask-add.php?add');;    
}

if (isset($_POST['task'])) {
    $name = $_POST['name'];
    $completed = (empty($_POST['completed'])) ? 0 : 1;
    $insert_task = $controller_tasks->insertTask($name, $completed, $_SESSION['user']['id']);
    updateTaskSession($controller_tasks);
    header('Location:http://localhost/notebook/index.php');  
}
  
if (isset($_GET['delete'])) {
    header('Location:http://localhost/notebook/formtask-delete.php?delete='. $_GET['delete']);    
}

if (isset($_POST['deltask'])) {
   $delete_task = $controller_tasks->deleteTask($_POST['id']);
   updateTaskSession($controller_tasks);
   header('Location:http://localhost/notebook/index.php');    
}

if (isset($_GET['update'])) {
   header('Location:http://localhost/notebook/formtask-update.php?update='. $_GET['update']);    
}

if (isset($_POST['updtask'])) {  
    $id =  $_POST['id'];
    $name = $_POST['name'];
    $completed = (empty($_POST['completed'])) ? 0 : 1;
    echo $id . $name . $completed;
    $update_task = $controller_tasks->updateTask($name, $completed, $id);
    updateTaskSession($controller_tasks);
    header('Location:http://localhost/notebook/index.php');       
}

if (isset($_GET['fileTask'])) {
   header('Location:http://localhost/notebook/formtask-download.php');    
}

if (isset($_POST['donwloadTask'])) {
    $fdownload = new FileTask();
    $fdownload->createFile("tasks_user_" . $_SESSION['user']['username'] . ".txt", $_SESSION['user']['tasks']);
}
    


////////////////////////////////////////////////////////////////////////////////


// See if delete task session instead delete tasks and query sql 
function updateTaskSession($controller_tasks){
    unset($_SESSION['user']['tasks']);
    $tasks_user = $controller_tasks->getAllTasksByUser($_SESSION['user']['id']); 
    $_SESSION['user']['tasks'] = $tasks_user;
}


// Not used

function getTasks($id) {
    $controller_tasks = new TaskController();
    return $controller_tasks->getAllTasksByUser($id);     
}

function getUser($username, $password) {
    $controller_user = new UserController();
    return $controller_user->getUser($username, $password);   
}

function updateTaskSession2($id){
    foreach ($_SESSION['user']['tasks'] as $key) {
        if ($key['id'] == $id) {
            //var_dump($key);
            unset($key);
        }
    }
}


?>


