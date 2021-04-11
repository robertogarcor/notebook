<?php

/**
 * Description of ControllerTask
 *
 * @author Roberto
 */

require_once '../model/Task.php';
require_once '../dao/TaskDAO.php';

class TaskController{

    private $tasks; /* @var $tasks Task */

    public function __construct(){
        $this->tasks = new Task(new TaskDAO);   
    }

    public function getAllTasks(){
        return $this->tasks->getAllTasks();
    }
    
    public function getAllTasksByUser($id) {
        return $this->tasks->getAllTasksByUser($id);
    }
    
    public function deleteTask($id) {
        $this->tasks->deleteTask($id);
        
    }
    
    public function insertTask($name, $completed, $user_id) {
        $this->tasks->insertTask($name, $completed, $user_id);
    }
    
    public function updateTask($name, $completed, $id) {
        $this->tasks->updateTask($name, $completed, $id);
    }
   
    
    





}






?>